<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(isset($_POST['save'])){
$email=$_POST['email'];
$pass=$_POST['password'];
$nompr=$_POST['nompr'];
$image="unnamed.png";
$req1="SELECT * FROM etudiant WHERE email='$email'";
$result=mysqli_query($connect,$req1);
if ((mysqli_num_rows($result)) <= 0) {
    $req="INSERT into etudiant(nom,email,password,image) values ('$nompr','$email','$pass','$image')";
    if(mysqli_query($connect,$req))
{
  $msg="Etudiant ajouté aavec succés";

    
}
    
	

}


else if((mysqli_num_rows($result)> 0)){ 
    $error="error d'ajout d'etudiant , cet etudiant exist déja , utiliser un autre email";
    

}
    


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
    <!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>
</head>
<?php
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:adminLogin.php');

}
else{
?>
<body>
<?php include('includes/header.php');?>

<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Ajouter Etudiant</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Ajouter Etudiant</div>
                  <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                  <div class="panel-body">
  
                  <form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
<div class="form-group">


<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control" name="email" placeholder="Email" required >
</div>
<label class="col-sm-2 control-label">Password<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $pass?>" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Nom et Prénom<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nompr" placeholder="Nom et prénom" v value="<?php echo($nompr);?>" required>

</div>
</div>

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="save" type="submit">Ajouter</button>
	</div>
</div>

</form>
</div>
</div>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



		
	
  <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
						$('.errorWrap').slideUp("slow");
					}, 3000);
					});
		</script>
    
</body>
</html>
<?php }?>