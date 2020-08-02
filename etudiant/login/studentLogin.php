<?php
session_start();
define("serveur","localhost");
define("utilisateur","id13574000_root");
define("mot_de_passe",'Z8@%MP?Fa~H8dMdV');
define("base","id13574000_base");
if(isset($_POST['submit'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$_SESSION['email']=$email;
$_SESSION['pass']=$pass;


$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
$sql="SELECT * FROM etudiant WHERE email='$email' AND password='$pass'";
$resultat=mysqli_query($bdd,$sql);
if(mysqli_num_rows($resultat)==0){
    
    echo "<script>alert('Verifier votre email ou mot de pass');</script>";
}

else{
    while($row = mysqli_fetch_assoc($resultat)){
        $_SESSION['nom']=$row['nom'];
        $_SESSION['image']=$row['image'];
        $_SESSION['idd']=$row['id'];
    }
   
    header('location:../matiere_page.php');
}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
  <title>PolyOnline - Etudiant</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

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
    
  	<legend class="legend">Etudiant Login</legend>
    
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
