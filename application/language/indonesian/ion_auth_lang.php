<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Author: Suhindra
*         suhindra@hotmail.co.id
*         @suhindra
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Last-Edit: 28.04.2016
*
* Description:  Indonesian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']				= '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat, silahkan hubungin Guest House untuk mengaktifkan akun anda!</div>';
$lang['account_creation_unsuccessful']				= '<div class="alert alert-danger" role="alert">Tidak Dapat Membuat Akun</div>';
$lang['account_creation_duplicate_email']			= '<div class="alert alert-danger" role="alert">Email Sudah Digunakan atau Tidak Valid</div>';
$lang['account_creation_duplicate_identity']	    = '<div class="alert alert-danger" role="alert">Identitas Sudah Digunakan atau Tidak Valid</div>';

// TODO Please Translate
$lang['account_creation_missing_default_group']		= 'Standar grup tidak diatur';
$lang['account_creation_invalid_default_group']		= '<div class="alert alert-danger" role="alert">Pengaturan Nama Grup Standar Tidak Valid</div>';


// Password
$lang['password_change_successful']					= '<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah</div>';
$lang['password_change_unsuccessful']				= '<div class="alert alert-danger" role="alert">Tidak Dapat Mengganti Kata Sandi</div>';
$lang['forgot_password_successful']					= '<div class="alert alert-success" role="alert">Email untuk Set Ulang Kata Sandi Telah Dikirim</div>';
$lang['forgot_password_unsuccessful']				= '<div class="alert alert-danger" role="alert">Tidak Dapat Set Ulang Kata Sandi</div>';

// Activation
$lang['activate_successful']						= '<div class="alert alert-success" role="alert">Akun Telah Diaktifkan, silahkan login menggunakan email anda</div>';
$lang['activate_unsuccessful']						= '<div class="alert alert-danger" role="alert">Tidak Dapat Mengaktifkan Akun</div>';
$lang['deactivate_successful']						= 'Akun Telah Dinonaktifkan';
$lang['deactivate_unsuccessful']					= 'Tidak Dapat Menonaktifkan Akun';
$lang['activation_email_successful']			    = '<div class="alert alert-success" role="alert">Email untuk Aktivasi Telah Dikirim. Silahkan cek inbox atau spam</div>';
$lang['activation_email_unsuccessful']		        = '<div class="alert alert-danger" role="alert">Tidak Dapat Mengirimkan Email Aktivasi</div>';
$lang['deactivate_current_user_unsuccessful']		= 'Anda tidak dapat Nonaktifkan akun anda sendiri.';

// Login / Logout
$lang['login_successful']							= '<div class="alert alert-success" role="alert">Log In Berhasil</div>';
$lang['login_unsuccessful']							= '<div class="alert alert-danger" role="alert">Log In Gagal, Pastikan email dan password benar!</div>';
$lang['login_unsuccessful_not_active']	            = '<div class="alert alert-danger" role="alert">Akun Tidak Aktif, Silahkan hubungi administrator</div>';
$lang['login_timeout']								= '<div class="alert alert-danger" role="alert">Sementara Terkunci. Coba Beberapa Saat Lagi.<div>';
$lang['logout_successful']							= '<div class="alert alert-success" role="alert">Log Out Berhasil</div>';

// Account Changes
$lang['update_successful']							= 'Informasi Akun Berhasil Diperbaharui';
$lang['update_unsuccessful']						= 'Gagal Memperbaharui Informasi Akun';
$lang['delete_successful']							= 'Pengguna Telah Dihapus';
$lang['delete_unsuccessful']						= 'Gagal Menghapus Pengguna';

// Groups
$lang['group_creation_successful']				    = 'Grup Berhasil Dibuat';
$lang['group_already_exists']						= 'Nama Grup Sudah Digunakan';
$lang['group_update_successful']					= 'Rincian Grup Berhasil Diubah';
$lang['group_delete_successful']					= 'Grup Berhasil Dihapus';
$lang['group_delete_unsuccessful']				    = 'Gagal Menghapus Grup';
$lang['group_delete_notallowed']					= 'Tidak Dapat menghapus Grup Administrator';
$lang['group_name_required']						= 'Nama Grup Tidak Boleh Kosong';
$lang['group_name_admin_not_alter']			    	= 'Nama Grup Admin Tidak Bisa Diubah';

// Activation Email
$lang['email_activation_subject']					= 'Aktivasi Akun';
$lang['email_activate_heading']						= 'Aktifkan Akun dari %s';
$lang['email_activate_subheading']				    = 'Silahkan klik tautan berikut untuk %s.';
$lang['email_activate_link']						= 'Aktifkan Akun Anda';

// Forgot Password Email
$lang['email_forgotten_password_subject']			= 'Verifikasi Lupa Password';
$lang['email_forgot_password_heading']				= 'Setel Ulang Kata Sandi untuk %s';
$lang['email_forgot_password_subheading']			= 'Silahkan klik tautan berikut untuk %s.';
$lang['email_forgot_password_link']					= 'Setel Ulang Kata Sandi';

