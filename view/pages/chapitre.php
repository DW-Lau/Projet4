<section>
	<!-- <?php
	//include_once("../../controller/oneChapController.php");
	?> -->
	<div id="chapterSideDeco">
		<article id="chapterText"> 
			<?php
				while($donnees = $reponse->fetch()){
			?>
			<h2><?php echo htmlspecialchars($donnees['titre']);?></h2>

						
				<p><?php echo htmlspecialchars($donnees['textchap']);?></p>
			<?php
			}
				$reponse->closeCursor()
			?>
		</article>
		<aside>
			<?php
						
				while($allcomms= $comments->fetch() ){
			?>
				<span class="commChapter">
					<span class="membreComm"><?php echo htmlspecialchars($allcomms['membre']);?>
					
						<p>à posté le <?php echo htmlspecialchars($allcomms['date_poste_fr']);?></br>
						<p><?php echo htmlspecialchars($allcomms['contenu']);?>
						
						</p>
					</span>';
						<!-- //RESTE A INSERER LES NOUVEAUX COMMENTAIRES DANS LA BASE DE DONNEES ET A LES AFFICHER; AJOUTER LE TINY MCE  SI L'UTILISATEUR EST CONNECTER -->
						<?php
							}
							$comments->closeCursor();
						?>
		</aside>		

							
					
				</div>
			</section>
