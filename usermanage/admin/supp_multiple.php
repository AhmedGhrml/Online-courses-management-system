<?php
session_start();
$supp=$_POST['supp'];

include "connect.php";
foreach ($supp as $key => $value) {
	
$sql="DELETE from etudiant where id='$value'";
$res=mysqli_query($connect,$sql);

}

foreach ($supp as $key => $value) {
	if($_SESSION['id']==$value)
		session_destroy();
		
		
}

//include "index2.php";
header('location:index2.php');




?>