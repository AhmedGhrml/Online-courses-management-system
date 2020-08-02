<?php
session_start();
error_reporting(0);
define("serveur","localhost");
define("utilisateur","id13574000_root");
define("mot_de_passe","Z8@%MP?Fa~H8dMdV");
define("base","id13574000_base");
if(isset($_POST['submit'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$_SESSION['email']=$email;
$_SESSION['password']=$pass;


$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
$sql="SELECT * FROM admin WHERE email='$email' AND password='$pass'";
$resultat=mysqli_query($bdd,$sql);
if(mysqli_num_rows($resultat)==0){
    
    echo "<script>alert('Verifier votre email ou mot de pass');</script>";
    while($row = mysqli_fetch_assoc($resultat)){
        $_SESSION['idadmin']=$row['id'];
}}

else{
    
    
   
    header('location:../teacher_list.php');
}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
  <title>PolyOnline - Admin</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
	
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>

<!-- partial:index.partial.html -->
<form style="  position: relative;
  top: 50%;
  width: 250px;
  display: table;
  margin: -150px auto 0 auto;
  background: #fff;
  border-radius: 4px;"  method="post">
  
  <fieldset>
    
  	<legend class="legend">Admin Login</legend>
    
    <div class="input">
    	<input type="email" placeholder="Email" name="email" required value="<?php if (isset($_POST['email']))echo($email);else echo("");?>" />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
    	<input type="password" placeholder="Password" name="pass" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    <div class="input" style="text-align:center;">
    <a href="/../../index.html">Accueil</a>
    </div>
    

    <button type="submit" class="submit" name="submit"><i class="fa fa-long-arrow-right"></i></button>

       

    
    
    
    
  </fieldset>
  
  
</form>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
