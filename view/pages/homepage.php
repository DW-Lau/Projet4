<div class="borderDeco">
</div>
<!-- 	<?php
	//include_once("../controller/homeController.php");
	?> -->
<section>
	<div id="sideDeco">
		<article id="chaps">
			<h3 class="Chapters">Les Chapitres</h3>
				<p> Retrouvez la liste complète des derniers chapitres, postés par l'auteur.</p>
					<div id="chaptersColumns">
					<?php
						while ($donnees=$chapters->fetch()) {
					?>
					<div class="lastsChapts">
						<img src="view/Images/Alaska_Railroad.jpg" id="imgThumb" alt="Billet simple pour lAlaska">
						<p>
							<a href="./home.php?action=selectionchapitre&amp;id=<?php echo $donnees['id']; ?>"> <?php echo htmlspecialchars($donnees['titre']); ?></a> - posté le: <?php echo htmlspecialchars($donnees['date_fr']); ?>
						</p>

					</div>

					<?php
						}
						$chapters->closeCursor();
					?>
				</div>
		</article>

		<div id="block">
			<?php
				while($billets= $bills->fetch()){
			?>
				<aside class="last_Comm">
					<h4  class="new_Aside"> <?php echo htmlspecialchars($billets['billetitre']); ?></h4>
						<p class="new_Note"><?= nl2br($billets['commbillet'])?></p>
				</aside>
			<?php
				}
				$bills->closeCursor();
			?>				
		</div>		
	</div><!--Fin de sideDeco-->
</section>
</body>
</html>
