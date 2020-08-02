<?php
include('includes/connect.php');
$id=$_GET['id'];
$sql = "SELECT * FROM matiere WHERE id=$id";
    $result = mysqli_query($connect, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../prof/uploads/' . $file['document'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../prof/uploads/' . $file['document']));
        readfile('../prof/uploads/' . $file['document']);

    
        exit;
    }
    else {echo("file dont exist");} 



?>