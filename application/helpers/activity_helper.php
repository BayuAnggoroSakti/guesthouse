<?php

function activity_log($nomor, $modul, $aktivitas){
    $CI =& get_instance();

    $param['LOG_ID'] = $nomor; // log id
    $param['LOG_USERNAME'] = $CI->session->userdata('username');
    $param['LOG_MODUL'] = $modul; // nama modul beserta aksinya
    $param['LOG_AKTIVITAS'] = $aktivitas; //log catatan perubahan

    //load model log
    $CI->load->model('log_model');

    //save to database
    $CI->log_model->save($param);

}
?> 