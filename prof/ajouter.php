<?php session_start();
error_reporting(0);
include('includes/connect.php');
$type=$_POST['type'];
$email=$_SESSION['email'];   
$ddl=$_POST['ddl'];
$titre=$_POST['titre'];
$desc=$_POST['desc'];
$libel=$_SESSION['libel'];
$msg="";
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx' ,'txt','pptx','png'])) {
      $error="You file extension must be .zip, .pdf or .docx .txt or .png";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
      $error="File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO matiere (titre, description, document,libel,type,ddl) VALUES ('$titre', '$desc', '$filename','$libel','$type','$ddl')";
			$sql2 = "INSERT INTO notification (sender, reciever ,libel , type ,status) VALUES ('$email', 'etudiant','$libel', '$type','1')";
            if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)) {
              $msg="contunue importé avec succés";
            }
        } else {
          $error="error d'importation , essayer de nouveau";
        }
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ajouter Document</title>
  <!-- Font awesome -->
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
		header('location:profLogin.php');

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
						<h3 class="page-title">Ajouter Document</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Ajouter Document</div>
                  <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                  <div class="panel-body">
  
                  <form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
<div class="form-group">


<label class="col-sm-2 control-label">Titre<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control" name="titre" placeholder="Titre" value="">
</div>
<label class="col-sm-2 control-label">Document<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="file" class="form-control" name="myfile" placeholder="1234 Main St">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" class="form-control" name="ddl" placeholder="Deadline à respecter">
</div>

<label class="col-sm-2 control-label">Type<span style="color:red" >*</span></label>
<div class="col-sm-4">
<select name="type" class="form-control" style="height:45px">
              <option selected>Cours</option>
              <option >TD</option>
              <option >TP</option>
              
            </select>
</div>
</div>
<label class="col-sm-2 control-label">Description<span style="color:red" >*</span></label>
<div class="form-group" >
	<div class="col-sm-3" >
		
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="5" name="desc"></textarea>
	
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
<?php } ?>