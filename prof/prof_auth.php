<?php

define("serveur","localhost");
define("utilisateur","root");
define("mot_de_passe",'');
define("base","poly");


$email=$_POST['email'];

$pass=$_POST['pass'];
$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
$sql="SELECT * FROM prof WHERE email='$email' AND password='$pass'";
$resultat=mysqli_query($bdd,$sql);
if(mysqli_num_rows($resultat)==0){
    echo 'Utilisateur ou mot de passe incorrecte !!';
    echo($email);
}
else{
    session_start();
    $_SESSION["email"]=$_POST['email'];
    $_SESSION["pass"]=$_POST['pass'];
    header('location:prof_page.php');
}

?>