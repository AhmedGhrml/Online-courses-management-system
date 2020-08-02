<?php
include('includes/connect.php');
 
$id=5;
$sql="SELECT * FROM etudiant ";
$res=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($res);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
         <!-- Font awesome -->
	<link rel="stylesheet" href="usermanage/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="usermanage/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="usermanage/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="usermanage/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="usermanage/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="usermanage/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="usermanage/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="usermanage/css/style.css">
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
<body>
<?php 

include('includes/header.php');

if(mysqli_num_rows($res) > 0) 
{
	while($row = mysqli_fetch_assoc($res)) 
{}	
?>

<div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-md-12">
    <form method="POST" action="update_student2.php">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" class="form-control" name="email"  value="<?php echo $row['email'] ; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password"  value="<?php echo $row['password'] ; ?>">
          </div>
		  <div class="form-group col-md-6">
            <label for="inputPassword4">Password Confirmation</label>
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Nom Et Prenom</label>
          <input type="text" class="form-control" name="nompr" placeholder="1234 Main St" disabled value="<?php echo $row['nom']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
        <?php echo($nom);echo($id); ?>
        <?php echo $row['email'] ; ?>
      </form>
</div>
</div>
    
</body>
</html>


