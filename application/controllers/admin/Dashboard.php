<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Dashboard extends CI_Controller
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
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			redirect('auth/login', 'refresh');
		}
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$this->data['namalogin'] = $user->FIRST_NAME.' '.$user->LAST_NAME;
		$this->data['title'] = 'Dashboard Admin';
		$this->data['desc'] = 'Dashboard Admin';
		$this->data['keyword'] = 'Dashboard Admin';
		$this->data['data_room'] = $this->db->query("SELECT * FROM GH.ROOM WHERE IS_ACTIVE = 1")->result();
		$this->data['data_room_not'] = $this->db->query("SELECT * FROM GH.ROOM WHERE IS_ACTIVE = 0")->result();
		$this->data['user'] = $this->db->query("SELECT * FROM GH.USERS")->result();
		$this->data['booking'] = $this->db->query("SELECT * FROM GH.BOOKING where STATUS != 3")->result();
		$this->data['booking_not'] = $this->db->query("SELECT * FROM GH.BOOKING where STATUS = 3")->result();
		$this->data['profit'] = $this->db->query("SELECT SUM(TOTAL_PRICE) AS TOTAL_PRICE FROM GH.BOOKING where STATUS=2")->row();
		$this->data['available'] = $this->available();
		$this->template_backend->display('admin/vdashboard',$this->data);
	}

	public function available()
	{
		$query_list_room =$this->db->query("SELECT * FROM GH.ROOM WHERE IS_ACTIVE = 1 order by ROOM_NO")->result();
		$this->data['list_room'] = $query_list_room;
		$list_room_row='';
		for ($i = 0; $i < count($query_list_room); $i++) {
			if ($i != count($query_list_room)-1){
				$list_room_row .="'".$query_list_room[$i]->ROOM_NO."',";
			} else {
				$list_room_row .="'".$query_list_room[$i]->ROOM_NO."'";
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
		return $table;
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


}
