<?php
include 'connect.php';
$email=$_POST['email'];
$pass=$_POST['password'];
$nompr=$_POST['nompr'];
$req="INSERT into etudiant(nom,email,password) values ('$nompr','$email','$pass')";
if(mysqli_query($connect,$req))
{
    echo"<p> Ajout du d'etudiant avec succés</p>";

}
$connect->close();




?>