<div class="borderDeco">
</div>
	<?php
	require("../controller/homeController.php");
	?>
<section>
	<div id="sideDeco">
		<article id="chaps">
					<h3 class="Chapters">Les Chapitres</h3>
						<p> Retrouvez la liste complète des derniers chapitres, postés par l'auteur.</p>';

			<?php chaptersCalls() ?>
				<div class="lastsChapts">
						<img src="Images/Alaska_Railroad.jpg" id="imgThumb" alt="Billet simple pour lAlaska">
						<p><a href="pages/chapitre.php?id='.$reponse['id'].'"><?= htmlspecialchars($reponse['titre'])?></a>
						 - posté le:<?=$reponse['date_fr']?></p></div>' ;
						

		</article>
					
						
						<div id="block">';
						<aside class="last_Comm">
										<h4  class="new_Aside">'.htmlspecialchars($informations['billetitre']).'</h4>
											<p class="new_Note">'.htmlspecialchars($informations['commbillet']).'</p>
									</aside>';
								
						}	
						echo '</div>';//End of <div id="block">
						$rep ->closeCursor();
					?>
				</div><!--Fin de sideDeco-->
	</section>