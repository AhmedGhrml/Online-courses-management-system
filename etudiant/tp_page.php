<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connect.php');

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM matiere WHERE id=$id";
    $result = mysqli_query($connect, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../prof/uploads/' . $file['document'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../prof/uploads/' . $file['document']));
        readfile('../prof/uploads/' . $file['document']);

    
        exit;
    }

}
$nom=$_SESSION['nom'];
$libele=$_POST['libel'];
$datetime=$_POST['datetime'];
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    
    // destination of the file on the server
    $destination = '../prof/uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx' ,'txt','pptx'])) {
        $error="You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        $error= "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO tp (nomEmet, fichier,datetime,libel) VALUES ('$nom','$filename','$datetime','$libele')";
            if (mysqli_query($connect, $sql)) {
               $msg="fichier importé avec succés";
            }
        } else {
            $error="error d'importation , essayer de nouveau";
        }
    }
}








 ?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Page des TPs</title>

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

<body>
	<?php include('includes/header.php');?>


	










	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Page des TPs</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Liste des TPs</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
												
                                                <th class="text-center">titre</th>
                                                <th class="text-center">Matiere</th>
												<th class="text-center">document</th>
												<th class="text-center">deadline</th>
												<th class="text-center">Telecharger</th>
												<th class="text-center">Envoyer</th>
												
												
												
												
                                        
										</tr>
									</thead>
									
									<tbody>

<?php




















include('includes/connect.php');
include('prof_auth.php');
echo $_POST['email'];
$sql1="SELECT mat  FROM prof where email='teacher@teacher.com' ";
$res1=mysqli_query($connect,$sql1);

if(mysqli_num_rows($res1) > 0) 
{
	while($row = mysqli_fetch_assoc($res1)) 
{		
$libel=$row['mat'];
}
}

$sql="SELECT *  FROM matiere where type='TP' ";
$sql2="SELECT status from TP";
$res2=mysqli_query($connect,$sql2);
$res=mysqli_query($connect,$sql);
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:studentLogin.html');
		;

}

else{
	
while($row = $res->fetch_assoc())
{				?>	
										<tr class="text-center">
                                            <td><?php echo $row['titre'];?></td>
                                            <td><?php echo $row['libel'];?></td>
											<td><?php echo $row['document'];?></td>
											<td><?php echo $row['ddl'];?></td>
											
											
											
											
											
                                            
	
                                            
                                            
        
</td>

                                            
											
<td>


<a href="downloadtp.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to telecharger');">&nbsp; <i class="fa fa-download"></i></a>&nbsp;&nbsp;

</td>
<td>      
<form  method="POST" enctype="multipart/form-data" > 
<input name="libel" type="hidden" id="libelID" value="<?php echo $row['libel']; ?>">
<input name="datetime" type="hidden" id="libelID" value="<?php echo date('Y-m-d H:i:s');?>">  
<button type="submit" class="btn btn-primary"<?php  if(date('Y-m-d H:i:s')>$row['ddl']){echo "disabled";}else echo "";?>  name="save"><?php  if(date('Y-m-d H:i:s')>$row['ddl']){echo "Deadline dépassé";}else echo "Envoyer";?></button>
<input   type="file" name="myfile" value="ajouter" style="width:150x;"/>

</form>
 </td>
 


										</tr>
										
										<?php $cnt=$cnt+1; }} ?>
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
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
				