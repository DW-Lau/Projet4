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
		<aside id="showComms" style="overflow:unset;">
			<h4>Commentaires:</h4>
			<?php
						
				while($commentaires= $allcomms->fetch() ){
			?>
				<span class="commChapter">
					<span class="membreComm">
						<strong><?php echo htmlspecialchars($commentaires['membre']);?></strong>
					
						à posté le : <?php echo htmlspecialchars($commentaires['date_poste_fr']);?></br>
						<p><?php echo htmlspecialchars($commentaires['contenu']);?><span class="signaler"><a href="./home.php?action=supprimerComm&amp;id=<?php echo $_GET['id']; ?>"> Signaler ce commentaire</a></span>
						</p>

					</span>
				</span>
						<?php
							}
							$allcomms->closeCursor();
						?>

					<div id="writeComm">
						<form id="getNewComment" action="./home.php?action=chapitreNewComm&amp;id=<?php echo $list['id']; ?>" method="post">
							<label>Pseudo:<input type="text" name="pseudo" required/></label>
							<textarea class="tinymce"></textarea>
							<input type="submit" id="save" value="Valider" />
						</form>
								
					</div> 
		</aside>		

							
					
				</div>
			</section>
			<!-- javascript -->
			<script type="text/javascript" src="./javascript/jquery.min.js"></script>
			<script type="text/javascript" src="./plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="./plugins/tinymce/init-tinymce.js"></script>