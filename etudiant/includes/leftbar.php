<?php 
	session_start();
	$total=$_SESSION['totaletudiant'];
	$count=$_SESSION['countetudiant'];
	
	?>
	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
			<li class="ts-label">Main</li>
			<li><a href="matiere_page.php"><i class="glyphicon glyphicon-file"></i> &nbsp;Lister les matieres</a>
			</li>
			<li><a href="td_page.php"><i class="glyphicon glyphicon-file"></i>&nbsp;Lister les TD</a>
			</li>
			<li><a href="tp_page.php"><i class="glyphicon glyphicon-file"></i>&nbsp;Lister les TP</a>
			<li><a href="nvmessages.php"><i class="fa fa-paper-plane"></i>&nbsp;Nouveau Message</a>
			<li><a href="messagerecu.php"><i class="fa fa-inbox"></i>&nbsp;(<?php echo($total);?>)Messages Reçus  <sup style="color:red">(<?php echo($count);?>) non lus</sup></a></a></li>
			
			</li>
			
			</ul>
			<img src="logo.png"  style="height:50px; weight:15px;margin-left:80px;position:relative; top:350px;"/>


		</nav>

		