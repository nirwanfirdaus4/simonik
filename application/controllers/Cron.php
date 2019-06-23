<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

  public function kirim_pengingat() {
    	// date_default_timezone_set('Asia/Jakarta');

   $semua_jobdesk = $this->db->get_where('tb_jobdesk', array('status_jobdesk' => 'Belum Dikerjakan'))->result_array();

   foreach ($semua_jobdesk as $jobdesk) {
    		$now = time(); // or your date as well
        $your_date = strtotime($jobdesk['deadline']);
        $datediff = $now - $your_date;
        $nama_jobdesk = $jobdesk['nama_jobdesk'];
        $day = round($datediff / (60 * 60 * 24));
        

        if($day == -1) {
          $data_user = $this->db->get_where('tb_user', array('id_user' => $jobdesk['id_user']))->row();
          $data_proker = $this->db->get_where('tb_daftar_proker', array('id_proker' => $jobdesk['id_proker']))->row();

          send_email(array($data_user->email_user), 'Pengingat Deadline', 'Sudahkah anda mengerjakan '.'<b>'.$nama_jobdesk.'</b>'.' untuk program kerja '.$data_proker->nama_proker);
          
        }
      }
    }
  }