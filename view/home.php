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
		<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/stylesA.css">
	<!--POLICES-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">
	<title>Billet simple pour l'Alaska, par JF</title>
	</head>
		<body>	
			
			<header>
				<div id="headR_Home">
					<h1><a href="home.php"> "Billet simple pour l'Alaska"</a></h1>
						<div id="lower_Deco">
							<div id="line_Ink"><!--Ink line add in css--></div>
							<h2> Jean Forteroche</h2>
						</div>
				</div>
					<nav>
						<ul>
							<li><a href="pages/auteur.php">L'Auteur</a></li>
							<li><a href="pages/chapitres.php">Les Chapitres</a></li>
							<li><a href="pages/billets.php">Les Nouveautées</a></li>
							</ul>
					</nav>
			</header>

				<div class="borderDeco">
				</div>
		
			<section>
				<div id="sideDeco">
					<?php
						try{
							$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
						}
						catch (Exception $e){
							die('Erreur: ' . $e->getmsg());
						}

						$reponse= $bdd->query('SELECT id,titre,textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ORDER BY date_edition  DESC LIMIT 0,2');
						/*Thoses 4 lines created the <article>*/
						echo '<article id="chaps">
									<h3 class="Chapters">Les Chapitres</h3>
										<p> Retrouvez la liste complète des chapitres, au fur et à mesure des postes.
										</p>';

						while($donnees=$reponse->fetch() ){
							echo'<div class="lastsChapts">
							<img src="Images/Alaska_Railroad.jpg" id="imgThumb" alt="Billet simple pour lAlaska">
							<a href="pages/chapitre.php?id='.$donnees['id'].'">'. htmlspecialchars($donnees['titre']).'</a>
								<p> posté le:'.$donnees['date_fr'].'</div></p>' ;
						}

						echo'</article>';//End of <article>
						$reponse -> closeCursor();
					/*----Creation of the aside part----*/
						$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit LIMIT 0,2');
						echo '<div id="block">';
						while($informations= $rep->fetch() ){
							echo '<aside class="last_Comm">
										<h4  class="new_Aside">'.htmlspecialchars($informations['billetitre']).'</h4>
											<p class="new_Note">'.htmlspecialchars($informations['commbillet']).'</p>
									</aside>';
								
						}	
						echo '</div>';//End of <div id="block">
						$rep ->closeCursor();
					?>
				</div><!--Fin de sideDeco-->
			</section>
			<footer>
				<?php require("portions/mentionsLeg.php");?>
			</footer>
		</body>
		<script type="text/javascript" src="javascript/commentaires.js"></script>

</html>