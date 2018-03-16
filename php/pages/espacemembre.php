<!-- <?php
//setcookie('pseudo',$informationsMembre['pseudo']);
?> -->
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">

	<meta name="description" content="Découvert le nouveau roman de Jean Forteroche, 'Billet simple pour Alaska'.(Projet Openclassroom)">

	<meta name="keywords" content="Billet simple pour l'Alaska, Jean Forteroche, Roman, Livre, En Ligne, nouveautées, Actulitée, Auteur" />
		<!--Meta Facebook-->
	<meta property="og:title" content="Billet simple ppir l'Alaska, par JF" />
	<meta property="og:type" content="article" /> 
	<meta property="og:url" content="http://www.projet4.laura-lariccia.fr" /> 
	<meta property="og:image" content="images/" /> 
	<meta property="og:description" content="Le nouveau roman de Jean ForteRoche" /> 
	<meta property="og:site_name" content="Billet simple ppir l'Alaska, par JF" /> 
	<meta property="fb:admins" content="Facebook numeric ID" />
		
		<!--Meta Twitter-->
	<meta name="twitter:card" content="images/.png">
	<meta name="twitter:site" content="@laura"> 
	<meta name="twitter:title" content="Billet simple ppir l'Alaska, par JR">
	<meta name="twitter:description" content="Le nouveau roman de Jean ForteRoche"> 
	<meta name="twitter:creator" content="@author_handle">
	<meta name="twitter:image:src" content="images.png">
		<!--FIN META -->
		
	<link rel="stylesheet" type="text/css" href="../../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../css/stylesA.css">
	<!--POLICES-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
	<title>Votre Profil</title>
	</head>

	<body>
		<?php require('../portions/header.php');?>
		<section>
			<div id="sideDeco">
		
				<div>
				<?php require('../../controller/sublogController.php'); ?>	
				<h6>Bonjour : <?php echo $informationsMembre['pseudo']?></h6>
				</div>
			</div>
		</section>

		<footer>
				<?php require ("../portions/mentionsLeg.php");
					?>
			</footer>
		</section>
	</body>
</html>