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
				<div id="chapterSideDeco">
					<article id="chapterText"> 
						<?php
							try{
								$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
							}
							catch (Exception $e){
								die('Erreur: ' . $e->getmsg());
							}
						
						$idPage=$_GET['id']; //Creation of a variable  to get id of the page.
							$reponse=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:id ');

							$reponse->execute(array(
								'id'=>$idPage,
							 ));
							$donnees = $reponse->fetch();							
							echo '<h2>'.$donnees['titre'].'</h2> 
								<p>'.$donnees['textchap'].'</p>';

							$reponse->closeCursor()
						?>
						<?php
							try{
								$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
							}
							catch (Exception $e){
								die('Erreur: ' . $e->getmsg());
							}
						$idPage=$_GET['id'];
							$comments=$bdd->prepare('SELECT id_chap,membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE id_chap=:id_chap ');
						
							$comments->execute(array(
								'id_chap'=>$idPage
							));

							while($allcomms= $comments->fetch() ){
								echo '<span class="commChapter">
										<span class="membreComm">'.htmlspecialchars($allcomms['membre']).'</span> à posté le '.$allcomms['date_poste_fr'].'</br>
										<p>'.htmlspecialchars($allcomms['contenu']).'</p>
									</span>';
						//RESTE A INSERER LES NOUVEAUX COMMENTAIRES DANS LA BASE DE DONNEES ET A LES AFFICHER; AJOUTER LE TINY MCE  SI L'UTILISATEUR EST CONNECTER

							}
							$comments->closeCursor()
							?>
						

							
					</article>
				</div>
			</section>
			<footer>
				<?php require ("../portions/mentionsLeg.php");?>
			</footer>
		</body>
</html>