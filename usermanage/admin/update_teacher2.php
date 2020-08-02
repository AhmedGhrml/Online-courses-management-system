<?php
include 'connect.php';
$email=$_POST['email'];
$pass=$_POST['password'];
$nompr=$_POST['nompr'];
$matiere=$_POST['mat'];
$tel=$_POST['tel'];
$id=$_POST['id'];
$sql="UPDATE `prof` SET email='$email',password='$pass',nompr='$nompr',mat='$matiere',tel='$tel'  WHERE id={$id}";
if (mysqli_query($connect,$sql))
{
	echo "<p>Mise à jour avec succès</p> <a href='admin/userlist.php' type='button'>Home</a>";
	header('location:teacher_list.php');
}
else
{
	echo "Erreur de mise à jour";
	
}
	
$connect->close();

?>