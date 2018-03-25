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
						<p> Retrouvez la liste complète des chapitres, au fur et à mesure des postes.</p>';

			while($donnees=$reponse->fetch() ){
				echo'<div class="lastsChapts">
						<img src="Images/Alaska_Railroad.jpg" id="imgThumb" alt="Billet simple pour lAlaska">
						<p><a href="pages/chapitre.php?id='.$donnees['id'].'">'. htmlspecialchars($donnees['titre']).'</a>
						 - posté le:'.$donnees['date_fr'].'</p></div>' ;
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