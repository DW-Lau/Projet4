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
	<title>Billet simple pour l'Alaska, par JF</title>
	</head>
		<body>	
			
			<?php require('../portions/header.php');?>
		
			<section>
				<div id="sideDeco">
						<?php
							try{
								$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
							}
							catch (Exception $e){
								die('Erreur: ' . $e->getmsg());
							}
<<<<<<< HEAD
							//var_dump($_GET['id']);
							$reponse=$bdd->prepare('SELECT id,titre,textchap,date_edition
							 FROM chapitres
							 WHERE id=?');

							$reponse->execute(array(
								'id'=>$_GET['id'],
							));
							$donnees = $reponse->fetch();
							var_dump($reponse);
							var_dump($donnees['titre']);
=======
							$reponse=$bdd->prepare('SELECT chapitres.id,titre,textchap, chapitres.date_edition,chapitres.comms, commentaires.id,commentaires.id_chap,commentaires.membre,commentaires.contenu, commentaires.date_poste
							 FROM chapitres
							 LEFT JOIN commentaires
							 ON chapitres.id=commentaires.id_chap
							 WHERE chapitres.id=?');

							$reponse->execute(array(
								'chapitres.id'=>$_POST['chapitres.id']
							));
							$donnees = $reponse->fetch();
>>>>>>> d29d908d31ab8e553bf7b7f4c33c736407968636
							echo '<h2>'.$donnees['titre'].'</h2> 
							<p>'.$donnees['textchap'].'</p>';
							//  <div class="allComs"> <p>'.$donnees['contenu'].'</p>
							$reponse->closeCursor()
						?>
				</div>
			</section>
			<footer>
				<?php require ("../portions/mentionsLeg.php");?>
			</footer>
		</body>
</html>