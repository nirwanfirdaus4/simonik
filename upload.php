<?php
$file_path = "upload/";

if (isset($_FILES['uploaded_file']['name'])) {

    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        $response['message'] = 'File uploaded successfully';
        $response['error'] = false;
    } else{
        $response['error'] = true;
        $response['message'] = 'Could not move the file';
    }
} else {

    $response['error'] = true;
    $response['message'] = 'Not received any file';
}
echo json_encode($response);
?>

