<section>
	<!-- <?php
	//include_once("../../controller/oneChapController.php");
	?> -->
	<div id="chapterSideDeco">
		<article id="chapterText"> 
			<?php

				while($chapitre = $donnees->fetch()){
			?>
			<h2><?php echo htmlspecialchars($chapitre['titre']);?></h2>		
				<p><?= nl2br($chapitre['textchap'])?></p>
			<?php
			}
				$donnees->closeCursor();
			?>
		</article>
		<aside id="showComms">
			<h4>Commentaires:</h4>
			<?php
						
				while($commentaires= $allcomms->fetch() ){
			?>
				<span class="commChapter">
					<span class="membreComm">
						<?php echo htmlspecialchars($commentaires['membre']);?>
					
						<p>à posté le <?php echo htmlspecialchars($commentaires['date_poste_fr']);?></br>
						<p><?php echo htmlspecialchars($commentaires['contenu']);?>
						</p>
					</span>
				</span>
						<?php
							}
							$allcomms->closeCursor();
						?>

					<!-- <div id="writeComm">
						<form>
							<textarea></textarea>
						</form>
								
					</div> -->
		</aside>		

							
					
				</div>
			</section>
