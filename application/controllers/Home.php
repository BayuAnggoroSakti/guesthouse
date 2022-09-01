<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Home extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->library('template_frontend');
		$this->lang->load('auth');
		if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Session anda habis, silahkan login ulang</div>');
			redirect('auth_user/login', 'refresh');
		}
	}

	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['email'] = $user->EMAIL;
		$this->data['title'] = 'Guest House - Home';
		$this->data['desc'] = 'Guest House - Home';
		$this->data['keyword'] = 'Guest House - Home';
		$this->template_frontend->display('frontend/vhome',$this->data);
	}

	public function nopage()
	{
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['email'] = $user->EMAIL;
		$this->data['title_head'] = 'No Result';
		$this->data['title'] = 'Guest House - No Result';
		$this->data['desc'] = 'Guest House - No Result';
		$this->data['keyword'] = 'Guest House - No Result';
		$this->template_frontend->display('frontend/vno_result',$this->data);
	}
	public function send_email_admin($data,$subject)
	{
		$query = $this->db->query("SELECT * FROM GH.USERS U INNER JOIN GH.USERS_GROUP UG ON UG.USER_ID = U.ID WHERE U.ACTIVE = 1 AND UG.GROUP_ID = 1")->result();
		foreach ($query as $data_email) {
			$this->send_email($data_email->EMAIL,$data,$subject);
		}
	}

	public function send_email($email,$data,$subject)
	{
		  $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'purabarutamadev@gmail.com',  // Email gmail
            'smtp_pass'   => '7v4r3SzrdFF58DAU',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@guesthouse.puragroup.com', 'Admin Guest House');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject($subject);

        // Isi email
        $this->email->message($this->load->view('template/email',$data, true));

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
            echo $this->email->print_debugger();
        }
	}

	public function search_room_avail()
	{
		$date_checkin = $this->input->get('date_checkin', TRUE);
		$time_checkin = $this->input->get('time_checkin', TRUE);
		$date_checkout = $this->input->get('date_checkout', TRUE);
		$time_checkout = $this->input->get('time_checkout', TRUE);
		$person = $this->input->get('person', TRUE);
		$checkin = $date_checkin.' '.$time_checkin;
		$checkout = $date_checkout.' '.$time_checkout;
		// $room = $this->db->query("SELECT * FROM 
		// (
		// SELECT R.ID_ROOM_TYPE ,MAX(ROOM_NAME) ROOM_NAME,MAX(TYPE_BED) TYPE_BED,COUNT(R.ROOM_NO) JUMLAH,MAX(PERSON) PERSON, MAX(FACILITY) FACILITY,
		// MAX(RATE) RATE FROM GH.ROOM_TYPE RT INNER JOIN GH.ROOM R ON R.ID_ROOM_TYPE = RT.ID_ROOM_TYPE LEFT JOIN GH.BOOKING_ROOM BR ON BR.ID_ROOM_TYPE = R.ID_ROOM_TYPE AND (BR.CHECKIN_ACTUAL BETWEEN TO_DATE('".$checkin."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$checkout."','YYYY-MM-DD HH24:MI:SS') OR BR.CHECKOUT_ACTUAL BETWEEN TO_DATE('".$checkin."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$checkout."','YYYY-MM-DD HH24:MI:SS')) WHERE BR.ID_BOOKING_ROOM IS NULL  AND R.IS_ACTIVE = 1
		// GROUP BY R.ID_ROOM_TYPE 
		// ) TBL ORDER BY ROOM_NAME DESC
		// ")->result();
		$room = $this->db->query("
SELECT DRV.*, JUMLAH - TOTAL_BOOKING AS SISA FROM 
(
	SELECT TBL.*, NVL(BOOKING.JUM,0) AS TOTAL_BOOKING FROM 
	(
		SELECT RT.ID_ROOM_TYPE , MAX(RATE) RATE,MAX(ROOM_NAME) ROOM_NAME, MAX(TYPE_BED) TYPE_BED, MAX(FACILITY) FACILITY, MAX(PERSON) PERSON,COUNT(*) AS JUMLAH, MAX(RT.IMAGE) AS IMAGE
		FROM GH.ROOM R
		INNER JOIN GH.ROOM_TYPE RT ON RT.ID_ROOM_TYPE  = R.ID_ROOM_TYPE 
		WHERE R.IS_ACTIVE = 1
		GROUP BY RT.ID_ROOM_TYPE 
	) TBL
	LEFT JOIN 
	(
	SELECT ID_ROOM_TYPE , COUNT(*) JUM FROM GH.BOOKING_ROOM BR
	WHERE  
	(BR.CHECKIN_ACTUAL BETWEEN TO_DATE('".$checkin."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$checkout."','YYYY-MM-DD HH24:MI:SS') 
	OR BR.CHECKOUT_ACTUAL BETWEEN TO_DATE('".$checkin."','YYYY-MM-DD HH24:MI:SS') AND TO_DATE('".$checkout."','YYYY-MM-DD HH24:MI:SS')) 
	GROUP BY ID_ROOM_TYPE 
	) BOOKING
	ON BOOKING.ID_ROOM_TYPE = TBL.ID_ROOM_TYPE
) DRV WHERE JUMLAH - TOTAL_BOOKING != 0 ORDER BY ROOM_NAME DESC")->result();
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['email'] = $user->EMAIL;
		$this->data['title_head'] = 'Booking Room';
		$this->data['title'] = 'Pilih Rooms - Order';
		$this->data['desc'] = 'Pilih Rooms - Order';
		$this->data['keyword'] = 'Pilih Rooms - Order';
		$this->data['room'] = $room;
		$this->template_frontend->display('frontend/vroom_search',$this->data);
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
    function uuid()
	{
		return vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
	}

	function datediff($checkin, $checkout)
	{
		$checkin = strtotime($checkin);
		$checkout = strtotime($checkout);
		$datediff = $checkout - $checkin;
		$datediff = round($datediff / (60 * 60 * 24));
		return $datediff;
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
	public function act_booking()
	{
		if ($this->input->method() === 'post') {
			$user = $this->ion_auth->user()->row();
			$checkin = $this->input->post('checkin',TRUE);
			$checkout = $this->input->post('checkout',TRUE);
			$guest_nohp_lead = $this->input->post('guest_nohp_lead',TRUE);
			$guest_name_lead = $this->input->post('guest_name_lead',TRUE);
			$total_price = $this->input->post('total_price',TRUE);
			$total_person = $this->input->post('total_person',TRUE);
			$desc = $this->input->post('desc',TRUE);
			$list_room = $this->input->post('list_room',TRUE);
			$list_room_array = explode(",",$list_room);
			$date = date('Y-m-d H:i:s');
			$datediff = $this->datediff(substr($checkin,0,10), substr($checkout,0,10));

			$id_booking =  $this->generate_id();
			$data_insert_booking = array(
				"ID_BOOKING" => $id_booking,
				"NAME_PIC_BOOKING" => $user->FIRST_NAME.' '.$user->LAST_NAME,
				"UNIT_PIC_BOOKING" => $user->COMPANY,
				"NOHP_PIC_BOOKING" => $user->PHONE,
				"GUEST_NAME_LEAD" => $guest_name_lead,
				"GUEST_NOHP_LEAD" => $guest_nohp_lead,
				"TOTAL_PRICE" => $total_price,
				"TOTAL_PERSON" => $total_person,
				"DESC" => $desc,
				"USER_ID_CREATE" => $user->ID,
				"STATUS" => 0,
			);
			$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKIN',"to_date('$checkin','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->set('CHECKOUT',"to_date('$checkout','YYYY-MM-DD HH24:MI:SS')",false);
			$insert = $this->db->insert("GH.BOOKING",$data_insert_booking);
			if ($insert) {
				for ($i=0; $i < count($list_room_array) ; $i++) { 
					$cari_price = $this->db->query("SELECT * FROM GH.ROOM WHERE ID_ROOM_TYPE='".$list_room_array[$i]."'")->row();
					$total_room_price = $datediff * $cari_price->RATE;
					$data_insert_booking_detail = array(
						"ID_BOOKING_ROOM" => $this->uuid(),
						"ID_BOOKING" => $id_booking,
						"PRICE" => $total_room_price,
						"TOTAL_PERSON" => $cari_price->PERSON,
						"ID_ROOM_TYPE" => $list_room_array[$i],
						"GUEST_NAME_LEAD" => $guest_name_lead,
						"ID_USER_INSERT" => $user->ID,
					);
					$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
					$this->db->set('CHECKIN_ACTUAL',"to_date('$checkin','YYYY-MM-DD HH24:MI:SS')",false);
					$this->db->set('CHECKOUT_ACTUAL',"to_date('$checkout','YYYY-MM-DD HH24:MI:SS')",false);
					$this->db->insert("GH.BOOKING_ROOM",$data_insert_booking_detail);
					$this->save_log_booking($id_booking,"Berhasil melakukan booking kamar");
				}
				//send_email_user
				$email = $user->EMAIL;
				$data = array('nama_tamu'=> $guest_name_lead,
					 'nama_pemesan' => $user->FIRST_NAME.' '.$user->LAST_NAME.' - '.$user->COMPANY,
					 'checkin' => $this->timestamp_indo(substr($checkin,0,10)).', '.substr($checkin,11,55),
					 'booking_id' => '#'.$id_booking,
					 'checkout' => $this->timestamp_indo(substr($checkout,0,10)).', '.substr($checkout,11,55),
					 'jumlah_kamar' => count($list_room_array).' Kamar',
					 'datetime_insert' => date('Y-m-d H:i:s'),
					);
				$subject = 'Success Booking #'.$id_booking;
				$this->send_email($email,$data,$subject);
				$subject_admin = 'New Booking #'.$id_booking;
				$this->send_email_admin($data,$subject_admin);
				
				redirect('home/success/'.$id_booking);
			} else {
				echo 'errror';
			}
		}
	}

	public function success($id_booking = null)
	{
		if ($this->uri->segment(3)=="") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">ID Booking tidak tersedia</div>');
			redirect("home/booking");
		}else{
				$this->data['title'] = 'Booking Success';
				$this->data['desc'] = 'Booking Success';
				$this->data['keyword'] = 'Booking Success';
				$this->data['id_booking'] = $id_booking;

				$this->load->view("frontend/vsuccess_book",$this->data);
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
	public function booking()
	{
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['email'] = $user->EMAIL;
		$this->data['title_head'] = 'Booking List';
		$this->data['title'] = 'Booking List';
		$this->data['desc'] = 'Booking List';
		$this->data['keyword'] = 'Booking List';
		$this->data['list_booking'] = $this->db->query("SELECT B.*, TO_CHAR(CHECKIN, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKIN,TO_CHAR(CHECKOUT, 'YYYY-MM-DD HH24:MI:SS') AS STR_CHECKOUT,TO_CHAR(DATETIME_INSERT, 'YYYY-MM-DD HH24:MI:SS') AS STR_DATETIME_INSERT FROM GH.BOOKING B WHERE USER_ID_CREATE = '".$user->ID."' ORDER BY B.DATETIME_INSERT DESC")->result();
		$this->template_frontend->display('frontend/vbooking',$this->data);
	}
	public function cancel_booking($id = NULL)
	{
		$id_booking = $id;
		$data_update = array('NOTE' => 'Telah di cancel oleh PIC Booking',
							 'STATUS' => 3
							);
		$this->db->where('ID_BOOKING',$id_booking);
		$update = $this->db->update('GH.BOOKING',$data_update);
		if ($update) {
			$query_setnull = $this->db->query("UPDATE GH.BOOKING_ROOM SET CHECKIN_ACTUAL = NULL, CHECKOUT_ACTUAL = NULL WHERE ID_BOOKING = '".$id_booking."' ");
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil cancel booking ini</div>');
			$this->save_log_booking($id_booking,"Telah di cancel oleh PIC Booking");
			redirect("home/booking/");
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal cancel booking ini</div>');
			redirect("home/booking/");
		}
			
	}
	public function booking_detail($id = NULL)
	{
		if ($this->uri->segment(3)=="") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">ID Booking tidak tersedia</div>');
			redirect("home/booking");
		}else{
			 $check_id = $this->db->query("SELECT * FROM GH.BOOKING where ID_BOOKING = '".$id."'")->result();
			if (count($check_id) == 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">ID Booking '.$id.' tidak tersedia</div>');
				redirect("home/booking");
			} else {
				$user = $this->ion_auth->user()->row();
				$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
				$this->data['email'] = $user->EMAIL;
				$this->data['title_head'] = 'Booking #'.$id;
				$this->data['title'] = 'Booking Detail';
				$this->data['desc'] = 'Booking Detail';
				$this->data['keyword'] = 'Booking Detail';
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
				$add_bed = $this->db->query("SELECT BRB.*, R.ROOM_NO,TO_CHAR(DATE_START, 'YYYY-MM-DD') AS STR_CHECKIN,TO_CHAR(DATE_END, 'YYYY-MM-DD') AS STR_CHECKOUT FROM GH.BOOKING_ROOM_ADD_BED BRB LEFT JOIN GH.BOOKING_ROOM BR ON BRB.ID_BOOKING_ROOM = BR.ID_BOOKING_ROOM LEFT JOIN GH.ROOM R ON R.ID_ROOM = BR.ID_ROOM WHERE ID_BOOKING = '".$id."'")->result();
				$this->data['log_booking'] = $this->db->query("SELECT LB.*,USERNAME, FIRST_NAME,LAST_NAME,TO_CHAR(LB.DATETIME_INSERT, 'YYYY-MM-DD HH24:MI:SS') AS STR_DATETIME_INSERT FROM GH.LOG_BOOKING LB LEFT JOIN GH.USERS U ON U.ID = LB.ID_USER where ID_BOOKING = '".$id."' order by LB.DATETIME_INSERT DESC")->result();
				$total_add_bed = 0;
				foreach ($add_bed as $data_bed) {
					$total_add_bed = $total_add_bed+ $data_bed->PRICE;
				}
				$this->data['total_add_bed'] =$total_add_bed;
				$this->template_frontend->display('frontend/vbooking_detail',$this->data);
			}
		}
	}



}
