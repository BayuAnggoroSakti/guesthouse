<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Booking extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->library('template_backend');
		$this->lang->load('auth');
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
			redirect('admin/login', 'refresh');
		}
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function order_book()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['title'] = 'Booking - Order List';
		$this->data['desc'] = 'Booking - Order List';
		$this->data['keyword'] = 'Booking - Order List';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$query_order = $this->db->query("SELECT TBL.*, KAMAR FROM 
		(SELECT b.*, TO_CHAR(CHECKIN, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT,TO_CHAR(DATETIME_INSERT, 'YYYY-MM-DD HH24:MI:SS') AS STR_DATETIME_INSERT 
		FROM GH.BOOKING b 
		) TBL 
		INNER JOIN (SELECT COUNT(*) KAMAR, ID_BOOKING FROM GH.BOOKING_ROOM GROUP BY ID_BOOKING ) BR ON BR.ID_BOOKING  = TBL.ID_BOOKING
		ORDER BY DATETIME_INSERT DESC")->result();
		$this->data['order'] = $query_order;
		$this->template_backend->display('admin/booking/v_order',$this->data);
	}

	function uuid()
	{
		return vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
	}

	public function order_book_detail_addroom()
	{
		if ($this->input->method() === 'post') {
			$id_booking = $this->input->post('id_booking');
			$id_room_type = $this->input->post('id_room_type');
			$checkin_date = $this->input->post('checkin_date');
			$checkin_time = $this->input->post('checkin_time');
			$checkout_date = $this->input->post('checkout_date');
			$checkout_time = $this->input->post('checkout_time');
			$checkin_actual = $checkin_date.' '.$checkin_time.':00';
			$checkout_actual = $checkout_date.' '.$checkout_time.':00';
			$user = $this->ion_auth->user()->row();
			$date = date('Y-m-d H:i:s');
			$data_insert = array(
				'ID_BOOKING_ROOM' => $this->uuid(),
				'ID_BOOKING' => $id_booking,
				'ID_ROOM_TYPE' => $id_room_type,
				'ID_USER_INSERT' => $user->ID,
			);
			$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKIN_ACTUAL',"to_date('$checkin_actual','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKOUT_ACTUAL',"to_date('$checkout_actual','YYYY-MM-DD HH24:MI:SS')",false);
			$insert = $this->db->insert('GH.BOOKING_ROOM',$data_insert);
			if ($insert) {
				$this->update_total_booking($id_booking);
				$this->save_log_booking($id_booking,"Berhasil menambahkan room");
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan room</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menambahkan room</div>');
					$this->save_log_booking($id_booking,"Gagal menambahkan room");
			}

		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function order_book_detail_addbed()
	{
		if ($this->input->method() === 'post') {
			$id_booking_room = $this->input->post('id_booking_room');
			$id_booking = $this->input->post('id_booking');
			$type_bed = $this->input->post('type_bed');
			$bed_count = $this->input->post('bed_count');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$user = $this->ion_auth->user()->row();
			$date = date('Y-m-d H:i:s');
			$detail_type_bed = $this->db->query("SELECT * FROM GH.BED_TYPE where BED_NAME = '".$type_bed."'")->row();
			
			$date1=date_create($start);
			$date2=date_create($end);
			$diff=date_diff($date1,$date2);
			$diff->format("%a");
			$price = $bed_count * $detail_type_bed->RATE*$diff->format("%a");
			$data_insert = array(
				'ID_BOOKING_ROOM_ADD_BED' => $this->uuid(),
				'ID_BOOKING_ROOM' => $id_booking_room,
				'TYPE_BED' => $type_bed,
				'BED_COUNT' => $bed_count,
				'USER_ID_CREATE' => $user->ID,
				'PRICE' => $price,
			);
			$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('DATE_START',"to_date('$start','YYYY-MM-DD')",false);
			$this->db->set('DATE_END',"to_date('$end','YYYY-MM-DD')",false);
			$insert = $this->db->insert('GH.BOOKING_ROOM_ADD_BED',$data_insert);
			if ($insert) {
				$this->update_total_booking($id_booking);
				$this->save_log_booking($id_booking,"Berhasil menambahkan bed");
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan bed</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
				$this->save_log_booking($id_booking,"Gagal menambahkan bed");
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menambahkan bed</div>');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function order_book_detail_editbed()
	{
		if ($this->input->method() === 'post') {
			$id_booking_room_add_bed = $this->input->post('id_booking_room_add_bed');
			$id_booking = $this->input->post('id_booking');
			$id_booking_room = $this->input->post('id_booking_room');
			$type_bed = $this->input->post('type_bed');
			$bed_count = $this->input->post('bed_count');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$user = $this->ion_auth->user()->row();
			$date = date('Y-m-d H:i:s');
			$detail_type_bed = $this->db->query("SELECT * FROM GH.BED_TYPE where BED_NAME = '".$type_bed."'")->row();
			
			$date1=date_create($start);
			$date2=date_create($end);
			$diff=date_diff($date1,$date2);
			$diff->format("%a");
			$price = $bed_count * $detail_type_bed->RATE*$diff->format("%a");
			$data_update = array(
				'ID_BOOKING_ROOM' => $id_booking_room,
				'TYPE_BED' => $type_bed,
				'BED_COUNT' => $bed_count,
				'USER_ID_CREATE' => $user->ID,
				'PRICE' => $price,
			);
			$this->db->set('DATETIME_UPDATE',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('DATE_START',"to_date('$start','YYYY-MM-DD')",false);
			$this->db->set('DATE_END',"to_date('$end','YYYY-MM-DD')",false);
			$this->db->where('ID_BOOKING_ROOM_ADD_BED',$id_booking_room_add_bed);
			$update = $this->db->update('GH.BOOKING_ROOM_ADD_BED',$data_update);
			if ($update) {
				$this->update_total_booking($id_booking);
				$this->save_log_booking($id_booking,"Berhasil mengubah bed");
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah bed</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
				$this->save_log_booking($id_booking,"Gagal mengubah bed");
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengubah bed</div>');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	function update_total_booking($id_booking)
	{
		$query_booking_room = $this->db->query("SELECT SUM(PRICE) PRICE FROM GH.BOOKING_ROOM WHERE ID_BOOKING = '".$id_booking."'")->row();
		$query_booking_room_adbed = $this->db->query("SELECT SUM(BRAB.PRICE) PRICE FROM GH.BOOKING_ROOM_ADD_BED BRAB
			LEFT JOIN GH.BOOKING_ROOM BR ON BR.ID_BOOKING_ROOM  = BRAB.ID_BOOKING_ROOM 
 			WHERE ID_BOOKING = '".$id_booking."'")->result();
		if (count($query_booking_room_adbed) == 0) {
			$count_addbed = 0;
		} else {
			$count_addbed = $query_booking_room_adbed[0]->PRICE;
		}
		$total = $count_addbed + $query_booking_room->PRICE;
		$data_update = array("TOTAL_PRICE"=> $total);
		$this->db->where("ID_BOOKING",$id_booking);
		$this->db->update("GH.BOOKING",$data_update);
		return true;
	}
	public function order_book_detail_editroom()
	{
		if ($this->input->method() === 'post') {
			$id_booking = $this->input->post('id_booking');
			$id_booking_room = $this->input->post('id_booking_room');
			$checkin_date = $this->input->post('checkin_date');
			$checkin_time = $this->input->post('checkin_time');
			$checkout_date = $this->input->post('checkout_date');
			$checkout_time = $this->input->post('checkout_time');
			$checkin_actual = $checkin_date.' '.$checkin_time.':00';
			$checkout_actual = $checkout_date.' '.$checkout_time.':00';
			$date = date('Y-m-d H:i:s');
			$detail_booking = $this->db->query("SELECT * FROM GH.BOOKING_ROOM WHERE ID_BOOKING_ROOM = '".$id_booking_room."'")->row();
			if ($detail_booking->ID_ROOM !="") {
				$date1=date_create($checkin_date);
				$date2=date_create($checkout_date);
				$diff=date_diff($date1,$date2);
				$detail_room =  $this->db->query("SELECT * FROM GH.ROOM where ID_ROOM ='".$detail_booking->ID_ROOM."' ")->row();
				$total_price = $diff->format("%a") * $detail_room->RATE;
				$this->db->set('PRICE',$total_price,false);
				$this->db->set('TOTAL_PERSON',$detail_room->PERSON,false);
			}
			
			
			$this->db->set('DATETIME_UPDATE',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKIN_ACTUAL',"to_date('$checkin_actual','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKOUT_ACTUAL',"to_date('$checkout_actual','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->where('ID_BOOKING_ROOM',$id_booking_room);
			$update = $this->db->update('GH.BOOKING_ROOM');
			if ($update) {
				$this->update_total_booking($id_booking);
				$this->save_log_booking($id_booking,"Berhasil mengubah checkin");
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah checkin/out</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
				$this->save_log_booking($id_booking,"Gagal mengubah checkin");
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengubah checkin/out</div>');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function order_book_detail($id = NULL)
	{
		if ($this->uri->segment(4)=="") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">ID Booking tidak tersedia</div>');
			redirect("admin/booking/order_book");
		} else {
			 $check_id = $this->db->query("SELECT * FROM GH.BOOKING where ID_BOOKING = '".$id."'")->result();
			if (count($check_id) == 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">ID Booking '.$id.' tidak tersedia</div>');
				redirect("admin/booking/order_book");
			} else {
				$this->data['message'] = $this->session->flashdata('message');
				$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
				$this->data['title'] = 'Booking - Order Detail';
				$this->data['desc'] = 'Booking - Order Detail';
				$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
				$this->data['keyword'] = 'Booking - Order Detail';
				$this->data['booking'] = $this->db->query("
					SELECT b.*, u.FIRST_NAME || ' ' || u.LAST_NAME || ' - ' ||u.COMPANY AS USER_CREATED,  TO_CHAR(CHECKIN, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT,TO_CHAR(DATETIME_INSERT, 'YYYY-MM-DD HH24:MI:SS') AS STR_DATETIME_INSERT 
					FROM GH.BOOKING b 
					LEFT JOIN GH.USERS u on b.USER_ID_CREATE = u.ID
					WHERE ID_BOOKING = '".$id."'
					")->row();
				$this->data['booking_room'] = $this->db->query("
					SELECT BR.*, ROOM_CATEGORY, ROOM_NAME, ROOM_NO,
					TO_CHAR(CHECKIN_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT
					FROM GH.BOOKING B 
					RIGHT JOIN GH.BOOKING_ROOM BR ON BR.ID_BOOKING = B.ID_BOOKING 
					LEFT JOIN GH.ROOM_TYPE RT ON RT.ID_ROOM_TYPE = BR.ID_ROOM_TYPE 
					LEFT JOIN GH.ROOM IR ON IR.ID_ROOM = BR.ID_ROOM 
					WHERE B.ID_BOOKING = '".$id."'")->result();
				$this->data['room_type'] = $this->db->query("SELECT * FROM GH.ROOM_TYPE")->result();
				$this->data['bed_type'] = $this->db->query("SELECT * FROM GH.BED_TYPE")->result();
				$this->data['adding_bed'] = $this->db->query("SELECT BRB.*, R.ROOM_NO,TO_CHAR(DATE_START, 'YYYY-MM-DD') AS STR_CHECKIN,TO_CHAR(DATE_END, 'YYYY-MM-DD') AS STR_CHECKOUT FROM GH.BOOKING_ROOM_ADD_BED BRB LEFT JOIN GH.BOOKING_ROOM BR ON BRB.ID_BOOKING_ROOM = BR.ID_BOOKING_ROOM LEFT JOIN GH.ROOM R ON R.ID_ROOM = BR.ID_ROOM WHERE ID_BOOKING = '".$id."'")->result();
				$this->data['log_booking'] = $this->db->query("SELECT LB.*,USERNAME, FIRST_NAME, LAST_NAME,TO_CHAR(LB.DATETIME_INSERT, 'YYYY-MM-DD HH24:MI:SS') AS STR_DATETIME_INSERT FROM GH.LOG_BOOKING LB LEFT JOIN GH.USERS U ON U.ID = LB.ID_USER where ID_BOOKING = '".$id."' order by LB.DATETIME_INSERT DESC")->result();
				$this->template_backend->display('admin/booking/v_order_detail',$this->data);
			}
		}	  
	}

	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}

	public function order_book_detail_ajax()
	{
		$id_booking_room = $this->input->post('id_room_detail');
		$data_booking_room = $this->db->query("SELECT BR.*,TO_CHAR(CHECKIN_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT FROM GH.BOOKING_ROOM BR WHERE ID_BOOKING_ROOM='".$id_booking_room."'")->row();
		$data = $this->db->query("
			SELECT R.*, BR.ID_BOOKING_ROOM FROM GH.ROOM_TYPE RT
			INNER JOIN GH.ROOM R ON R.ID_ROOM_TYPE = RT.ID_ROOM_TYPE  
			LEFT JOIN GH.BOOKING_ROOM BR ON BR.ID_ROOM = R.ID_ROOM 
			AND (BR.CHECKIN_ACTUAL BETWEEN TO_DATE('".$data_booking_room->STR_CHECKIN."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$data_booking_room->STR_CHECKOUT."','YYYY-MM-DD HH24:MI:SS')
			OR BR.CHECKOUT_ACTUAL BETWEEN TO_DATE('".$data_booking_room->STR_CHECKIN."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$data_booking_room->STR_CHECKOUT."','YYYY-MM-DD HH24:MI:SS'))
			WHERE RT.ID_ROOM_TYPE = '".$data_booking_room->ID_ROOM_TYPE."'
			AND R.IS_ACTIVE = 1
			ORDER BY R.ROOM_NO
			")->result();
		
		$response = "";
		foreach ($data as $key) {
		
			
			$image = base_url("assets/").'img/products/product-7.jpg';
			$form_action =site_url('admin/booking/order_book_detail_ajax_pilih?id_room='.$key->ID_ROOM.'&id_booking_room='.$id_booking_room);
			$booked ='';
			if ($key->ID_BOOKING_ROOM == $id_booking_room) {
				$button = '<button disabled class="s mb-1 mt-1 me-1 btn btn-warning" >
												 SELECTED ROOM
											</button>';
			}else if ($key->ID_BOOKING_ROOM != "") {
				$booked = '<div class="image-frame-badges-wrapper">
														<span class="badge badge-ecommerce badge-danger">Booked</span>
													</div>';
				$button = '<button disabled class="s mb-1 mt-1 me-1 btn btn-primary" >
												 PILIH ROOM
											</button>';
			} else {
				$button = '<a href="'.$form_action.'" class="s mb-1 mt-1 me-1 btn btn-primary" >
												<i class="bx bx-save text-4 me-2"></i> Pilih Room
											</a>';
			}
			
			$response .= '
			<div class="col-sm-6 col-xl-4 mb-4 mb-sm-0">
									<div class="card card-modern card-modern-alt-padding">
										<div class="card-body bg-light">
											<div class="image-frame mb-2">
												<div class="image-frame-wrapper">
												'.$booked.'
													<a href="#"><img src="'.$image.'" class="img-fluid" alt="Product Short Name" /></a>
												</div>
											</div>
											<small><a href="ecommerce-products-form.html" class="ecommerce-sidebar-link text-color-grey text-color-hover-primary text-decoration-none">Room Info</a></small>
											<h4 class="text-4 line-height-2 mt-0 mb-2"><a href="ecommerce-products-form.html" class="ecommerce-sidebar-link text-color-dark text-color-hover-primary text-decoration-none">'.$key->ROOM_NO.'</a></h4>

											<h4 class="text-4 line-height-2 mt-0 mb-2"><a href="ecommerce-products-form.html" class="ecommerce-sidebar-link text-color-dark text-color-hover-primary text-decoration-none">'.$key->TYPE_BED.'</a></h4>
											<h4 class="text-4 line-height-2 mt-0 mb-2"><a href="ecommerce-products-form.html" class="ecommerce-sidebar-link text-color-dark text-color-hover-primary text-decoration-none">'.$key->PERSON.' Orang</a></h4>
											
											<div class="product-price">
												<div class="sale-price">'.$this->rupiah($key->RATE).'</div>
											</div>
											'.$button.'
										</div>
									</div>
								</div>
			';
		}
		echo $response;
	}
	public function order_book_typeroom_ajax()
	{
		$id_booking_room = $this->input->post('id_room_detail');
		$data = $this->db->query("
					SELECT BR.*, ROOM_CATEGORY, ROOM_NAME, ROOM_NO,
					TO_CHAR(CHECKIN_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT_ACTUAL, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT
					FROM GH.BOOKING B 
					RIGHT JOIN GH.BOOKING_ROOM BR ON BR.ID_BOOKING = B.ID_BOOKING 
					LEFT JOIN GH.ROOM_TYPE RT ON RT.ID_ROOM_TYPE = BR.ID_ROOM_TYPE 
					LEFT JOIN GH.ROOM IR ON IR.ID_ROOM = BR.ID_ROOM 
					WHERE BR.ID_BOOKING_ROOM = '".$id_booking_room."'")->row();
		echo json_encode($data);
	}
	public function order_book_detail_ajax_pilih()
	{
		$id_room = $this->input->get("id_room");
		$id_booking_room = $this->input->get("id_booking_room");
		$cari_booking = $this->db->query("SELECT BR.*, TO_DATE(TO_CHAR(CHECKOUT_ACTUAL,'YYYY-MM-DD'),'YYYY-MM-DD') - TO_DATE(TO_CHAR(CHECKIN_ACTUAL,'YYYY-MM-DD'),'YYYY-MM-DD') AS DATEDIFF FROM GH.BOOKING_ROOM BR where ID_BOOKING_ROOM ='".$id_booking_room."' ")->row();
	
		$detail_room =  $this->db->query("SELECT * FROM GH.ROOM where ID_ROOM ='".$id_room."' ")->row();
		$total_price = $cari_booking->DATEDIFF * $detail_room->RATE;
		$data_update = array('ID_ROOM'=>$id_room,'PRICE'=>$total_price,'TOTAL_PERSON'=>$detail_room->PERSON);
		$this->db->where('ID_BOOKING_ROOM',$id_booking_room);
		$update = $this->db->update('GH.BOOKING_ROOM',$data_update);
		if ($update) {

			$data_update_status = array('STATUS'=>1);
			$this->db->where('ID_BOOKING',$cari_booking->ID_BOOKING);
			$this->db->update('GH.BOOKING',$data_update_status);

			$this->update_total_booking($cari_booking->ID_BOOKING);
			$this->save_log_booking($cari_booking->ID_BOOKING,"Berhasil memilih room");
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil memilih room</div>');
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal memilih room</div>');
			$this->save_log_booking($cari_booking->ID_BOOKING,"Gagal memilih room");
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		}
	}
	function delete_room_booking($id_booking_room)
	{
		$cari_booking = $this->db->query("SELECT BR.*, TO_DATE(TO_CHAR(CHECKOUT_ACTUAL,'YYYY-MM-DD'),'YYYY-MM-DD') - TO_DATE(TO_CHAR(CHECKIN_ACTUAL,'YYYY-MM-DD'),'YYYY-MM-DD') AS DATEDIFF FROM GH.BOOKING_ROOM BR where ID_BOOKING_ROOM ='".$id_booking_room."' ")->row();
		$this->db->where('ID_BOOKING_ROOM',$id_booking_room);
		$delete = $this->db->delete('GH.BOOKING_ROOM');
		$this->db->where('ID_BOOKING_ROOM',$id_booking_room);
		$delete = $this->db->delete('GH.BOOKING_ROOM_ADD_BED');
		if ($delete) {
			$this->update_total_booking($cari_booking->ID_BOOKING);
			$this->save_log_booking($cari_booking->ID_BOOKING,"Berhasil menghapus room");
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus room</div>');
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menghapus room</div>');
			$this->save_log_booking($cari_booking->ID_BOOKING,"Gagal menghapus room");
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		}
	}

	function delete_room_booking_addbed($id_booking_room_add_bed)
	{
		$cari_booking = $this->db->query("SELECT BR.ID_BOOKING FROM GH.BOOKING_ROOM_ADD_BED BRAB INNER JOIN GH.BOOKING_ROOM BR ON BR.ID_BOOKING_ROOM = BRAB.ID_BOOKING_ROOM WHERE BRAB.ID_BOOKING_ROOM_ADD_BED = '".$id_booking_room_add_bed."' ")->row();
		$this->db->where('ID_BOOKING_ROOM_ADD_BED',$id_booking_room_add_bed);
		$delete = $this->db->delete('GH.BOOKING_ROOM_ADD_BED');
		if ($delete) {
			$this->update_total_booking($cari_booking->ID_BOOKING);
			$this->save_log_booking($cari_booking->ID_BOOKING,"Berhasil menghapus addtional bed");
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Addtional bed</div>');
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menghapus Addtional bed</div>');
				$this->save_log_booking($cari_booking->ID_BOOKING,"Gagal menghapus addtional bed");
			redirect("admin/booking/order_book_detail/".$cari_booking->ID_BOOKING);
		}
	}

	function save_log_booking($id_booking,$message)
	{
		$user = $this->ion_auth->user()->row();
		$ip = $this->input->ip_address();
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$date = date('Y-m-d H:i:s');
		$data_insert = array(
				"PID" => $this->uuid(),
				"ID_BOOKING" => $id_booking,
				"URL" => $actual_link,
				"MESSAGE" => $message,
				"ID_USER" => $user->ID,
				"IP_ADDRESS" => $ip,
		);
		$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
		$data_insert = $this->db->insert("GH.LOG_BOOKING",$data_insert);
		return true;
	}
	function generate_id()
    {
      $count = $this->db->query("SELECT * from GH.BOOKING WHERE ltrim(TO_CHAR(DATETIME_INSERT,'yymm'),'0') = ltrim(TO_CHAR(SYSDATE,'yymm'),'0')")->result();
      $num = count($count)+1;
      $tahunbulan=date('Ym');
      $paddedNum = sprintf("%04d", $num);
      $hasil = $tahunbulan.$paddedNum;
      return $hasil; 
    }

    public function calendar()
	{

		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['title'] = 'Calendar Booking';
		$this->data['desc'] = 'Calendar Booking';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['keyword'] = 'Calendar Booking';
		$this->template_backend->display('admin/vcalendar',$this->data);
	}

	public function ajax_calendar()
	{
		$data = $this->db->query("SELECT B.*, TO_CHAR(CHECKIN, 'YYYY-MM-DD') AS STR_CHECKIN,TO_CHAR(CHECKOUT+1, 'YYYY-MM-DD') AS STR_CHECKOUT FROM GH.BOOKING B WHERE STATUS != 3")->result();
		$array = array();
		foreach ($data as $row) { 
			$color = '#0000';
			$textColor = 'white';
			if ($row->STATUS == 0) {
				$color = '#52ABFF';
				$textColor = 'white';
			}else if(($row->STATUS == 1) ){
				$color = '#F98509';
				$textColor = 'white';
			}else if(($row->STATUS == 2) ){
				$color = '#09F909';
				$textColor = 'white';
			} else {
				$color = '#F90931';
				$textColor = 'white';
			}
			
			 $url = "https://www.google.co.in/";
           	 $array[] = array(
                'description' => "BOOKING",
                'title' => $row->GUEST_NAME_LEAD.' - '.$row->UNIT_PIC_BOOKING,
                'start' => $row->STR_CHECKIN,
                'end' => $row->STR_CHECKOUT,
                'edit' => $url,
                'color' => $color,
                 'textColor'=> $textColor,
                'icon' => 'fa-check',
            );
		}

		echo json_encode($array);
	}
	function outputMySQLToHTMLTable(mysqli $mysqli, string $table)
	{
	    // Make sure that the table exists in the current database!
	    $tableNames = array_column($mysqli->query('SHOW TABLES')->fetch_all(), 0);
	    if (!in_array($table, $tableNames, true)) {
	        throw new UnexpectedValueException('Unknown table name provided!');
	    }
	    $res = $mysqli->query('SELECT * FROM '.$table);
	    $data = $res->fetch_all(MYSQLI_ASSOC);
	    
	    echo '<table>';
	    // Display table header
	    echo '<thead>';
	    echo '<tr>';
	    foreach ($res->fetch_fields() as $column) {
	        echo '<th>'.htmlspecialchars($column->name).'</th>';
	    }
	    echo '</tr>';
	    echo '</thead>';
	    // If there is data then display each row
	    if ($data) {
	        foreach ($data as $row) {
	            echo '<tr>';
	            foreach ($row as $cell) {
	                echo '<td>'.htmlspecialchars($cell).'</td>';
	            }
	            echo '</tr>';
	        }
	    } else {
	        echo '<tr><td colspan="'.$res->field_count.'">No records in the table!</td></tr>';
	    }
	    echo '</table>';
	}

	function timestamp_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
	public function available()
	{

		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['title'] = 'Available Room';
		$this->data['desc'] = 'Available Room';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['keyword'] = 'Available Room';
		$query_list_room =$this->db->query("SELECT * FROM GH.ROOM WHERE IS_ACTIVE = 1 order by ROOM_NO")->result();
		$query_list_typeroom =$this->db->query("SELECT * FROM GH.ROOM_TYPE WHERE IS_ACTIVE = 1 order by ROOM_NAME DESC")->result();
		$this->data['list_room'] = $query_list_room;
		$this->data['list_typeroom'] = $query_list_typeroom;
		$list_room_row='';
		$list_typeroom_row='';
		for ($i = 0; $i < count($query_list_room); $i++) {
			if ($i != count($query_list_room)-1){
				$list_room_row .="'".$query_list_room[$i]->ROOM_NO."',";
			} else {
				$list_room_row .="'".$query_list_room[$i]->ROOM_NO."'";
			}
		}
		for ($i = 0; $i < count($query_list_typeroom); $i++) {
			if ($i != count($query_list_typeroom)-1){
				$list_typeroom_row .="'".$query_list_typeroom[$i]->ROOM_NAME."',";
			} else {
				$list_typeroom_row .="'".$query_list_typeroom[$i]->ROOM_NAME."'";
			}
		}
		$query_room_avail = $this->db->query("
			SELECT * FROM 
			(SELECT * FROM 
			(
				 SELECT TANGGAL.*,ROOM_BOOK.ROOM_NO FROM 
				 (
				 select TO_CHAR(SYSDATE -1 + level - 1,'YYYY-MM-DD') dt
					from   dual
					connect by level <= (
					   SYSDATE +14 - SYSDATE -1 + 1
					)
				 ) TANGGAL 
				 LEFT JOIN 
				 (
				 	SELECT R.ROOM_NO, TO_CHAR(BR.CHECKIN_ACTUAL,'YYYY-MM-DD') CHECKIN , TO_CHAR(BR.CHECKOUT_ACTUAL,'YYYY-MM-DD') CHECKOUT FROM GH.ROOM R
					LEFT JOIN GH.BOOKING_ROOM BR ON BR.ID_ROOM = R.ID_ROOM  
				 ) ROOM_BOOK
				 ON dt BETWEEN  ROOM_BOOK.CHECKIN AND  ROOM_BOOK.CHECKout
			) D
			PIVOT
			( COUNT(ROOM_NO)
			FOR ROOM_NO IN (".$list_room_row."))
			) TBL
			ORDER BY DT
			")->result();
		$query_typeroom_avail = $this->db->query("
			SELECT * FROM 
			(SELECT * FROM 
			(
				 SELECT TANGGAL.*,ROOM_BOOK.ROOM_NAME FROM 
				 (
				 select TO_CHAR(SYSDATE -1 + level - 1,'YYYY-MM-DD') dt
					from   dual
					connect by level <= (
					   SYSDATE +14 - SYSDATE -1 + 1
					)
				 ) TANGGAL 
				 LEFT JOIN 
				 (
				 	SELECT RT.ROOM_NAME, TO_CHAR(BR.CHECKIN_ACTUAL,'YYYY-MM-DD') CHECKIN , TO_CHAR(BR.CHECKOUT_ACTUAL,'YYYY-MM-DD') CHECKOUT FROM GH.ROOM R
				 	INNER JOIN GH.ROOM_TYPE RT ON RT.ID_ROOM_TYPE  = R.ID_ROOM_TYPE
					LEFT JOIN GH.BOOKING_ROOM BR ON BR.ID_ROOM_TYPE = R.ID_ROOM_TYPE 
				 ) ROOM_BOOK
				 ON dt BETWEEN  ROOM_BOOK.CHECKIN AND  ROOM_BOOK.CHECKout
			) D
			PIVOT
			( COUNT(ROOM_NAME)
			FOR ROOM_NAME IN (".$list_typeroom_row."))
			) TBL
			ORDER BY DT
			")->result();

		$table='';
		$table .= '<table class="table table-bordered text-center">';
	    $table .= '<thead>';
	    $table .= '<tr>';
	    $table .= '<th  class="table-dark col-xs-1">Tanggal</th>';
	    foreach ($query_list_room as $column) {
	        $table .= '<th class="table-dark">'.htmlspecialchars($column->ROOM_NO).'</th>';
	    }
	    $table .= '</tr>';
	    $table .= '</thead>';
	    foreach ($query_room_avail as $row) {
	          $table .= '<tr>';
	          foreach ($row as $cell) {
	          		if ($cell == '1') {
	          			 $table .= '<td class="table-danger">Booked</td>';
	          		} else if ($cell== '0') {
	          			$table .= '<td class="table-success">Available</td>';
	          		}else{
	          			$table .= '<td class="table-dark"><b>'. $this->timestamp_indo($cell).'</b></td>';
	          		}
	                
	            }
	            $table .= '</tr>';
	     }
	    $table .= '</table>';

	    $table2='';
		$table2 .= '<table class="table table-bordered text-center">';
	    $table2 .= '<thead>';
	    $table2 .= '<tr>';
	    $table2 .= '<th  class="table-dark col-xs-1">Tanggal</th>';
	    foreach ($query_list_typeroom as $column) {
	        $table2 .= '<th class="table-dark">'.htmlspecialchars($column->ROOM_NAME).'</th>';
	    }
	    $table2 .= '</tr>';
	    $table2 .= '</thead>';
	    foreach ($query_typeroom_avail as $row) {
	          $table2 .= '<tr>';
	          foreach ($row as $cell) {
	          		$table2 .= '<td class="table-dark"><b>'. ($cell).'</b></td>';
	                
	            }
	            $table2 .= '</tr>';
	     }
	    $table2 .= '</table>';
	    $this->data['booking'] = $table;
	    $this->data['type_booking'] = $table2;
		$this->template_backend->display('admin/vavailable',$this->data);
	}

	public function canceled()
	{
		if ($this->input->method() === 'post') {
			$id_booking = $this->input->post('id_booking',TRUE);
			$add_note = $this->input->post('add_note',TRUE);
			$data_update = array('NOTE' => $add_note,
								 'STATUS' => 3
								);
			$this->db->where('ID_BOOKING',$id_booking);
			$update = $this->db->update('GH.BOOKING',$data_update);
			if ($update) {
				$query_setnull = $this->db->query("UPDATE GH.BOOKING_ROOM SET CHECKIN_ACTUAL = NULL, CHECKOUT_ACTUAL = NULL WHERE ID_BOOKING = '".$id_booking."' ");
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil cancel booking ini</div>');
				$this->save_log_booking($id_booking,"Berhaisl melakukan cancel booking");
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal cancel booking ini</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			}
			
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function completed()
	{
		if ($this->input->method() === 'post') {
			$id_booking = $this->input->post('id_booking',TRUE);
			$add_note = $this->input->post('note',TRUE);
			$detail_room = $this->db->query("SELECT * FROM GH.BOOKING_ROOM WHERE ID_BOOKING = '".$id_booking."' and ID_ROOM IS NULL")->result();
			if (count($detail_room) > 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Mohon selesai setting room terlebih dahulu sebelum melakukan penyelesaian order booking</div>');
				redirect("admin/booking/order_book_detail/".$id_booking);
			} else {
				$data_update = array('NOTE' => $add_note,
								 'STATUS' => 2
								);
				$this->db->where('ID_BOOKING',$id_booking);
				$update = $this->db->update('GH.BOOKING',$data_update);
				if ($update) {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menyelesaikan booking ini</div>');
					$this->save_log_booking($id_booking,"Berhaisl melakukan menyelesaikan booking");
					redirect("admin/booking/order_book_detail/".$id_booking);
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menyelesaikan booking ini</div>');
					redirect("admin/booking/order_book_detail/".$id_booking);
				}
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
