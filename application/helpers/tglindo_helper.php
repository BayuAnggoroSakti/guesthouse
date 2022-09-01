<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tgl_indo($tgl){
	$xt			= explode("-", $tgl);
	$tanggal 	= $xt[0];
	$bulan 		= getBulan($xt[1]);
	$tahun		= $xt[2];
	// $tanggal 	= substr($tgl,0,2);
	// $bulan 		= getBulan(substr($tgl,3,2));
	// $tahun 		= substr($tgl,6,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getHari($tgle) {
	switch ($tgle) {
		case 1:
			return "Senin";
			break;
		case 2:
			return "Selasa";
			break;
		case 3:	
			return "Rabu";
			break;
		case 4:	
			return "Kamis";
			break;
		case 5:	
			return "Jumat";
			break;
		case 6:	
			return "Sabtu";
			break;
		case 7:	
			return "Minggu";
			break;
		case 0:	
			return "Minggu";
			break;	
	}
}


function getBulan($bln){
	switch (true) {
		case ($bln=='1'||$bln=='01'): 
			return "Januari";
			break;
		case ($bln=='2'||$bln=='02'): 
			return "Februari";
			break;
		case ($bln=='3'||$bln=='03'): 
			return "Maret";
			break;
		case ($bln=='4'||$bln=='04'): 
			return "April";
			break;
		case ($bln=='5'||$bln=='05'): 
			return "Mei";
			break;
		case ($bln=='6'||$bln=='06'): 
			return "Juni";
			break;
		case ($bln=='7'||$bln=='07'): 
			return "Juli";
			break;
		case ($bln=='8'||$bln=='08'): 
			return "Agustus";
			break;
		case ($bln=='9'||$bln=='09'): 
			return "September";
			break;
		case ($bln=='10'):
			return "Oktober";
			break;
		case ($bln=='11'):
			return "November";
			break;
		case ($bln=='12'):
			return "Desember";
			break;

		default:
            return Date('F');
            break;	
	}
}

function getBln($bln){
	switch ($bln) {
		case 1: 
			return "JAN";
			break;
		case 2:
			return "FEB";
			break;
		case 3:
			return "MAR";
			break;
		case 4:
			return "APR";
			break;
		case 5:
			return "MEI";
			break;
		case 6:
			return "JUN";
			break;
		case 7:
			return "JUL";
			break;
		case 8:
			return "AGU";
			break;
		case 9:
			return "SEP";
			break;
		case 10:
			return "OKT";
			break;
		case 11:
			return "NOV";
			break;
		case 12:
			return "DES";
			break;
	}
}
/* Location: ./application/helpers/tglindo_helper.php */
?>