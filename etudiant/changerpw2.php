<?php
include('includes/connect.php');
$pass=$_POST['passwordconf'];
$id=$_POST['id'];
$sql="UPDATE `etudiant` SET password='$pass' WHERE id='$id'";
if (mysqli_query($connect,$sql))
{
	echo "<p>Mise à jour avec succès</p>
		 <a href='matiere_page.php'><button type='button'>Home</a>";
}
else
{
	echo "Erreur de mise à jour";
}


	
$connect->close();

?>