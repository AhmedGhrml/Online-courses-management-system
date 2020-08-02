<?php 
session_start();
error_reporting(0);
include('connect.php');
$email=$_SESSION['email'];
$sql1="SELECT nompr  FROM prof where email='$email' ";
$res1=mysqli_query($connect,$sql1);
?>
<div class="brand clearfix">
<h4 class="pull-left text-white" style="margin:20px 0px 0px 20px">&nbsp; Ecole Polytechnique de Sousse</h4>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
		<ul class="ts-profile-nav">
		<li class="ts-account" >
		<a style="background-color:#3E454C; width:100%">Bienvenue &nbsp;&nbsp;   <?php echo($email);?> </a>
				
			</li>
			<li class="ts-account" style="display: inline-block;
     text-align: center;">
				<a href="#"> Compte <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="changerpw.php">Changer mot de passe</a></li>
					<li><a href="logout.php">Déconnexion</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	#2C3136
	