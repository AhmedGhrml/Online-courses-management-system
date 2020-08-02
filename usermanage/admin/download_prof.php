<?php 
session_start();
include('includes/config.php');
error_reporting(0);


if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:login/profLogin.php');

}
else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>Nom et Prénom</th>
											<th>Matiere</th>
											<th>Téléphone</th>
											<th>Email</th>
											
										</tr>
									</thead>

<?php 
$filename="Liste des professeurs";
$sql = "SELECT * from prof";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo'
<tr>  
<td>'.$cnt.'</td> 
<td>'.$Name= $result->nompr.'</td> 
<td>'.$Email= $result->mat.'</td> 
<td>'.$Gender= $result->tel.'</td> 
<td>'.$Phone= $result->email.'</td> 
					
</tr>  
';
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");


			$cnt++;
			}
	}
?>
</table>
<?php } ?>