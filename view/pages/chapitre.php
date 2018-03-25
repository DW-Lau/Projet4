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
