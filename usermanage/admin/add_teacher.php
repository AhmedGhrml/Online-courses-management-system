<?php
include 'connect.php';
$email=$_POST['email'];
$pass=$_POST['password'];
$nompr=$_POST['nompr'];
$matiere=$_POST['mat'];
$tel=$_POST['tel'];
$req="INSERT into prof(email,password,nompr,mat,tel) values ('$email','$pass','$nompr','$matiere','$tel')";
if(mysqli_query($connect,$req))
{
    echo"<p> Ajout du prof avec succés</p>";

}
$connect->close();




?>