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
	<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
 	 <script>tinymce.init({ selector:'textarea' });</script> -->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
	<title>Billet simple pour l'Alaska, par JF</title>
	</head>
		<body>	
			
			<?php require("../portions/header.php");?>
		
			<section>
				<div id="secondSideDeco">
					<aside id="introChapters">
						<h3>Les chapitres:</h3>
						<p> Retrouvez ici la liste, complète, des chapitres du nouveau roman de Jean ForteRoche.  </p>
					</aside>
					<article id="seleChap">
							<?php
						try{
							$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
						}
						catch (Exception $e){
							die('Erreur: ' . $e->getmsg());
						}

						$reponse= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 100)as textchap,date_edition FROM chapitres ');//Selection of the first 100 characters 
				
						while($donnees=$reponse->fetch() ){
							echo'<div class="thumbnail">
									<h5><a href="chapitre.php?id='.$donnees['id'].'">'. htmlspecialchars($donnees['titre']).'</a></h5>
									<p class="sumChapters">'.$donnees['textchap'].' [...]</br>
									Mise en ligne le:'.$donnees['date_edition'] .'</p>
								</div>' ;
						}
						$reponse -> closeCursor();
						?>
					</article>
				</div>
			</section>
			<footer>
				<?php require ("../portions/mentionsLeg.php");?>
			</footer>
		</body>
</html>