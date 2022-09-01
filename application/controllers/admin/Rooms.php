<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Rooms extends CI_Controller
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
			edirect('admin/login', 'refresh');
		}
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function type_bed()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['title'] = 'Room - Type Bed';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['desc'] = 'Room - Type Bed';
		$this->data['keyword'] = 'Room - Type Bed';
		$query_bed = $this->db->query("SELECT * FROM GH.BED_TYPE")->result();
		$this->data['bed'] = $query_bed;
		$this->template_backend->display('admin/room/v_bed',$this->data);
	}

	public function type_bed_add()
	{
		if ($this->input->method() === 'post') {
			$type_bed = $this->input->post("bed_name");
			$rate = $this->input->post("rate");
			$is_active = $this->input->post("is_active");
			$data_insert = array(
				'BED_NAME' => $type_bed,
				'RATE' => $rate,
				'IS_ACTIVE' => $is_active
			);
			$insert = $this->db->insert('GH.BED_TYPE',$data_insert);
			if ($insert) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan type bed</div>');
				redirect("admin/rooms/type_bed");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menambahkan type bed</div>');
			}
			
		} else {
			redirect("admin/rooms/type_bed");
		}	
	}

	public function type_bed_update()
	{
		if ($this->input->method() === 'post') {
			$type_bed = $this->input->post("bed_name");
			$rate = $this->input->post("rate");
			$is_active = $this->input->post("is_active");
			$data_update = array(
				'RATE' => $rate,
				'IS_ACTIVE' => $is_active
			);
			$this->db->where('BED_NAME',$type_bed);
			$update = $this->db->update('GH.BED_TYPE',$data_update);
			if ($update) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah type bed</div>');
				redirect("admin/rooms/type_bed");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengubah type bed</div>');
			}
			
		} else {
			redirect("admin/rooms/type_bed");
		}	
	}

	public function type_bed_delete()
	{
		if ($this->input->method() === 'post') {
			$type_bed = $this->input->post("type_bed");
			$this->db->where('BED_NAME',$type_bed);
			$delete = $this->db->delete('GH.BED_TYPE');
			if ($delete) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus type bed</div>');
				redirect("admin/rooms/type_bed");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menghapus type bed</div>');
			}
			
		} else {
			redirect("admin/rooms/type_bed");
		}
		
	}

	public function type_room()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['title'] = 'Room - Type Room';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['desc'] = 'Room - Type Room';
		$this->data['keyword'] = 'Room - Type Room';
		$query_room = $this->db->query("SELECT * FROM GH.ROOM_TYPE")->result();
		$this->data['room_type'] = $query_room;
		$this->template_backend->display('admin/room/v_room_type',$this->data);
	}
	function uuid()
	{
		return vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
	}
	public function type_room_add()
	{
		if ($this->input->method() === 'post') {
			$room_category = $this->input->post("room_category");
			$room_name = $this->input->post("room_name");
			$is_active = $this->input->post("is_active");
			$data_insert = array(
				'ID_ROOM_TYPE' => $this->uuid(),
				'ROOM_NAME' => $room_name,
				'ROOM_CATEGORY' => $room_category,
				'IS_ACTIVE' => $is_active
			);
			$insert = $this->db->insert('GH.ROOM_TYPE',$data_insert);
			if ($insert) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan type room</div>');
				redirect("admin/rooms/type_room");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menambahkan type room</div>');
			}
			
		} else {
			redirect("admin/rooms/type_bed");
		}	
	}

	public function type_room_update()
	{
		if ($this->input->method() === 'post') {
			$room_category = $this->input->post("room_category");
			$room_name = $this->input->post("room_name");
			$is_active = $this->input->post("is_active");
			$id_room_type = $this->input->post("id_room_type");
			$data_update = array(
				'ROOM_NAME' => $room_name,
				'ROOM_CATEGORY' => $room_category,
				'IS_ACTIVE' => $is_active
			);
			$this->db->where('ID_ROOM_TYPE',$id_room_type);
			$update = $this->db->update('GH.ROOM_TYPE',$data_update);
			if ($update) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah type Room</div>');
				redirect("admin/rooms/type_room");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengubah type Room</div>');
			}
			
		} else {
			redirect("admin/rooms/type_room");
		}	
	}

	public function type_room_delete()
	{
		if ($this->input->method() === 'post') {
			$id_room_type = $this->input->post("id_room_type");
			$this->db->where('ID_ROOM_TYPE',$id_room_type);
			$delete = $this->db->delete('GH.ROOM_TYPE');
			if ($delete) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus type room</div>');
				redirect("admin/rooms/type_room");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menghapus type room</div>');
			}
			
		} else {
			redirect("admin/rooms/type_room");
		}
	}

	public function index()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['title'] = 'Manage Room - Room';
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['desc'] = 'Manage Room - Room';
		$this->data['keyword'] = 'Manage Room - Room';

		$query_room = $this->db->query("SELECT R.*, ROOM_CATEGORY, ROOM_NAME FROM GH.ROOM R
			LEFT JOIN GH.ROOM_TYPE T ON R.ID_ROOM_TYPE = T.ID_ROOM_TYPE ")->result();
		$this->data['room'] = $query_room;

		$query_type_room = $this->db->query("SELECT * FROM GH.ROOM_TYPE WHERE IS_ACTIVE = 1")->result();
		$this->data['type_room'] = $query_type_room;

		$query_type_bed = $this->db->query("SELECT * FROM GH.BED_TYPE WHERE IS_ACTIVE = 1")->result();
		$this->data['type_bed'] = $query_type_bed;

		$this->template_backend->display('admin/room/v_room',$this->data);
	}

	public function room_add()
	{
		if ($this->input->method() === 'post') {
			$id_room_type = $this->input->post("id_room_type");
			$room_no = $this->input->post("room_no");
			$facility = $this->input->post("facility");
			$person = $this->input->post("person");
			$rate = $this->input->post("rate");
			$type_bed = $this->input->post("type_bed");
			$is_active = $this->input->post("is_active");
			$user = $this->ion_auth->user()->row();
			$data = date('Y-m-d H:i:s');
			$data_insert = array(
				'ID_ROOM' => $this->uuid(),
				'ID_ROOM_TYPE' => $id_room_type,
				'ROOM_NO' => $room_no,
				'FACILITY' => $facility,
				'TYPE_BED' => $type_bed,
				'PERSON' => $person,
				'RATE' => $rate,
				'IS_ACTIVE' => $is_active,
				'USER_ID_CREATE' => $user->ID,
			);
			$this->db->set('DATETIME_INSERT',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$insert = $this->db->insert('GH.ROOM',$data_insert);
			if ($insert) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan  room</div>');
				redirect("admin/rooms");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menambahkan  room</div>');
			}
			
		} else {
			redirect("admin/rooms");
		}	
	}

	public function room_update()
	{
		if ($this->input->method() === 'post') {
			$id_room = $this->input->post("id_room");
			$id_room_type = $this->input->post("id_room_type");
			$room_no = $this->input->post("room_no");
			$facility = $this->input->post("facility");
			$person = $this->input->post("person");
			$rate = $this->input->post("rate");
			$type_bed = $this->input->post("type_bed");
			$is_active = $this->input->post("is_active");
			$user = $this->ion_auth->user()->row();
			$date = date('Y-m-d H:i:s');
			$data_update = array(
				'ID_ROOM_TYPE' => $id_room_type,
				'ROOM_NO' => $room_no,
				'FACILITY' => $facility,
				'TYPE_BED' => $type_bed,
				'PERSON' => $person,
				'RATE' => $rate,
				'IS_ACTIVE' => $is_active,
			);
			$this->db->set('DATETIME_UPDATE',"to_date('$date','YYYY-MM-DD HH24:MI:SS')",false);
			$this->db->where('ID_ROOM',$id_room);
			$update = $this->db->update('GH.ROOM',$data_update);
			if ($update) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah room</div>');
				redirect("admin/rooms");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengubah room</div>');
			}
			
		} else {
			redirect("admin/rooms");
		}	
	}

	public function room_activate()
	{
		if ($this->input->method() === 'post') {
			$id_room = $this->input->post("id_room");
			$data_update = array(
					'IS_ACTIVE' => 1
				);
			$this->db->where('ID_ROOM',$id_room);
			$update = $this->db->update('GH.ROOM',$data_update);
			if ($update) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengaktifkan room</div>');
				redirect("admin/rooms");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal mengaktifkan room</div>');
			}
			
		} else {
			redirect("admin/rooms");
		}
		
	}

	public function room_deactivate()
	{
		if ($this->input->method() === 'post') {
			$id_room = $this->input->post("id_room");
			$data_update = array(
					'IS_ACTIVE' => 0
				);
			$this->db->where('ID_ROOM',$id_room);
			$update = $this->db->update('GH.ROOM',$data_update);
			if ($update) {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menonaktifkan room</div>');
				redirect("admin/rooms");
			} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal menonaktifkan room</div>');
			}
			
		} else {
			redirect("admin/rooms");
		}
		
	}

}
