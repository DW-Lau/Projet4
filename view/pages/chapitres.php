<section>
	
	<div id="secondSideDeco">
		<aside id="introChapters">
			<h3>Les chapitres:</h3>
				<p> Retrouvez ici la liste, complète, des chapitres du nouveau roman de Jean ForteRoche.  </p>
		</aside>
		
		<article id="seleChap">

				<?php
					while ($list=$listChapters->fetch() ) {
				?>
				<div class="thumbnail">
					
					<h5><a href="./home.php?action=selectionchapitre&amp;id=<?php echo $list['id']; ?>"><?php echo htmlspecialchars($list['titre'])?></a>
					</h5>
						<p class="sumChapters"> <?= nl2br($list['textchap']);?> [...]</br>
						Mise en ligne le:<?php echo htmlspecialchars($list['date_fr']);?></p>
				</div>
				<?php
					}
					$listChapters->closeCursor();
				?>
		</article>
	</div>
</section>
<!-- pages/chapitre.php?id=<
./home.php?action=chapitres?id=< -->