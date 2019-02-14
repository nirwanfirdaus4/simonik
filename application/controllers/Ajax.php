<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
	  $databasehost = "localhost";
	  $databaseuser = "root";
	  $databasepass = "";
	  $db_name ="simonik";
	  $check = mysqli_connect($databasehost,$databaseuser,$databasepass,$db_name);

	if($_POST['key']=='getData'){


        $start = mysqli_escape_string($check,$_POST['start']);
        $limit = mysqli_escape_string($check,$_POST['limit']);
        $hasilquery = mysqli_query($check,"SELECT * FROM tb_ukm LIMIT $start, $limit");
        if(mysqli_num_rows($hasilquery)>0){
          $response = "";
          while($data = mysqli_fetch_array($hasilquery)){
            $response .= '
              <tr>  
                <td>'.$data['id_ukm'].'</td>
                <td>'.$data['nama_ukm'].'</td>
                <td>
				
             	<a href="" title="Edit Data"><button type="button" id="edit" onclick="edit('.$data['id_ukm'].')" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
				<a href="" title="Hapus Data"><button type="button" id="delete" onclick="dels('.$data['id_ukm'].')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>   	           	
                </td>
              </tr>

            ';
          }
          exit($response);
        }else {
          exit('limitMax');
        }
      }


    if($_POST['key']=='addnew'){
        // $date =  mysqli_escape_string($check,$_POST['DateOrder']);
        $nama_ukm = mysqli_escape_string($check,$_POST['nama_ukm']); 
        $hasilquery = mysqli_query($check,"INSERT INTO tb_ukm(nama_ukm) VALUES ('$nama_ukm')");

      }

	if($_POST['key']=='delete'){
		$id_ukm = mysqli_escape_string($check,$_POST['data']);
		$hasilquery = mysqli_query($check,"DELETE FROM tb_ukm WHERE id_ukm=$id_ukm");
	}      


	}
}
