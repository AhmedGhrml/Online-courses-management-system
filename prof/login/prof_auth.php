<?php
session_start();
define("serveur","localhost");
define("utilisateur","root");
define("mot_de_passe",'');
define("base","poly");
$email=$_POST['email'];
$pass=$_POST['pass'];
$_SESSION['email']=$email;
$_SESSION['pass']=$pass;


$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
$sql="SELECT * FROM admin WHERE email='$email' AND password='$pass'";
$resultat=mysqli_query($bdd,$sql);
if(mysqli_num_rows($resultat)==0){
    echo "<script>alert('Verifier votre email ou mot de pass');</script>";
    header('location:adminLogin.php');

    
}

else{
    
   
    header('location:../teacher_list.php');
}

?>