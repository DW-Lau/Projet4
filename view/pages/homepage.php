<div class="borderDeco">
</div>
	<?php
	include_once("../controller/homeController.php");
	?>
<section>
	<div id="sideDeco">
		<article id="chaps">
			<h3 class="Chapters">Les Chapitres</h3>
				<p> Retrouvez la liste complète des derniers chapitres, postés par l'auteur.</p>
					<?php
						while ($donnees=$chapters->fetch()) {
					?>
				<div class="lastsChapts">
					<img src="Images/Alaska_Railroad.jpg" id="imgThumb" alt="Billet simple pour lAlaska">
						<p>
							<a href="pages/chapitre.php?id=' <?= htmlspecialchars($donnees['id']); ?>'"> <?php echo htmlspecialchars($donnees['titre']); ?></a> - posté le: <?php echo htmlspecialchars($donnees['date_fr']); ?>
						</p>

				</div>
					<?php
						}
						$chapters->closeCursor();
					?>
		</article>

		<div id="block">
			<?php
				while($billets= $rep->fetch()){
			?>
				<aside class="last_Comm">
					<h4  class="new_Aside"> <?php echo htmlspecialchars($billets['billetitre']); ?></h4>
						<p class="new_Note"><?php echo htmlspecialchars($billets['commbillet'])?></p>
				</aside>
			<?php
				}
				$rep->closeCursor();
			?>				
		</div>		
	</div><!--Fin de sideDeco-->
</section>