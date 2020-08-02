	<?php 
	session_start();
	error_reporting(0);
	$total=$_SESSION['total'];
	$count=$_SESSION['count'];

	
?>
	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Menu</li>
				
				<li><a href="./prof_page.php"><i class="fa fa-files-o" aria-hidden="true"></i> &nbsp;Lister matiere</a></li>
				<li><a href="./ajouter.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Ajouter cours / TP/ TD</a></li>
				<li><a href="./td_page_prof.php"><i class="fa fa-files-o" aria-hidden="true"></i> &nbsp;Lister TD</a></li>
				<li><a href="./tp_page_prof.php"><i class="fa fa-files-o" aria-hidden="true"></i> &nbsp;Lister TP</a></li>
				<li><a href="./nvmessages.php"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Nouveau Message </a> </li>
				<li><a href="./messagesrecu.php"><i class="fa fa-inbox" aria-hidden="true"></i> &nbsp;(<?php echo($total);?>)Messages Reçus  <sup style="color:red">(<?php echo($count);?>) non lus</sup></a></a></li>


			
			</ul>
			<img src="./logo.png"  style="height:50px; weight:15px;margin-left:80px;position:relative; top:350px;"/>

			

		</nav>

		