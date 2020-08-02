<?php
include('includes/connect.php');
$id=$_GET['idfile'];
$sql = "SELECT * FROM tp WHERE id=$id";
    $result = mysqli_query($connect, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['fichier'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['fichier']));
        readfile('uploads/' . $file['fichier']);

    
        exit;
    }
    else {echo("file dont exist");} 



?>