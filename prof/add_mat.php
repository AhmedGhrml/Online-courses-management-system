<?php
include 'includes/connect.php';
session_start();
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:login/profLogin.php');

}
else{
 $email=$_SESSION['email'];   
$type=$_POST['type'];
$ddl=$_POST['ddl'];
$titre=$_POST['titre'];
$desc=$_POST['desc'];
$libel=$_SESSION['libel'];
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx' ,'txt','pptx','png'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO matiere (titre, description, document,libel,type,ddl) VALUES ('$titre', '$desc', '$filename','$libel','$type','$ddl')";
            $sql2 = "INSERT INTO notification (sender, reciever, type ,status) VALUES ('$email', 'etudiant', '$type','1')";
            if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}




}?>