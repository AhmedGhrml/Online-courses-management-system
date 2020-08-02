<?php 
error_reporting(0);
session_start();
include('connect.php');
$email=$_SESSION['email'];
$sql1="SELECT *  FROM prof where email='$email' ";
$res1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($res1) > 0) 
{
	while($row = mysqli_fetch_assoc($res1)) 
	{	$id=$row['id'];
		$nom=$row['nompr'];
		$image=$row['image'];
	}
	$_SESSION['idprof']=$id;
}		
?>
<div class="brand clearfix">
<h4 class="pull-left text-white" style="margin:20px 0px 0px 20px">&nbsp; Ecole Polytechnique de Sousse</h4>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
		<ul class="ts-profile-nav">
		<li class="ts-account" >
		<a style="background-color:#3E454C; width:100%">Bienvenue &nbsp;&nbsp;   <?php echo $nom;?>  </a>
				
			</li>
			<li class="ts-account" style="
     display: inline-block;
     text-align: center;">
				<a href="#"> Compte <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a ><img src="/polyOnline/prof/images/<?php echo $image;?>" style="width:50px; border-radius:30%;"/></a></li>
					<li><a href="changerpw.php">Changer profil</a></li>
					<li><a href="logout.php">Déconnexion</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	#2C3136
	