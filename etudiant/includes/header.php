<?php 
session_start();
define("serveur","localhost");
define("utilisateur","id13574000_root");
define("mot_de_passe",'Z8@%MP?Fa~H8dMdV');
define("base","id13574000_base");
if(isset($_SESSION['email'])){$email=$_SESSION['email'];
$nom=$_SESSION['nom'];
$image=$_SESSION['image'];
}
?>
<div class="brand clearfix">
<h4 class="pull-left text-white" style="margin:20px 0px 0px 20px">&nbsp; Ecole Polytechnique de Sousse</h4>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
		<ul class="ts-profile-nav">
		<li class="ts-account" >
		<a style="background-color:#3E454C; width:100%">Bienvenue &nbsp;&nbsp;   <?php echo $nom;?> </a>
				
			</li>
	
			<li class="ts-account" style="display: inline-block;
     text-align: center;">
				<a href="#"> Compte <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
				<li><a ><img src="./images/<?php echo $image;?>" style="width:50px; border-radius:30%;"/></a></li>

					<li><a href="changerpw.php">Changer profil</a></li>
					<li><a href="logout.php">Déconnexion</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	
 
	