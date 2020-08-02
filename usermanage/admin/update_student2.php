<?php
include 'connect.php';
$email=$_POST['email'];
$pass=$_POST['password'];
$nompr=$_POST['nompr'];
$id=$_POST['id'];
$sql="UPDATE `etudiant` SET nom='$nompr',email='$email',password='$pass' WHERE id={$id}";
if (mysqli_query($connect,$sql))
{
	echo "<p>Mise à jour avec succès</p>
		 <a href='students_list.php'><button type='button'>Home</a>";
}
else
{
	echo "Erreur de mise à jour";
}
	
$connect->close();

?>