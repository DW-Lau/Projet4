<section>
	<div id="secondSideDeco">
		<aside id="introChapters">
			<h3>Les chapitres:</h3>
				<p> Retrouvez ici la liste, complète, des chapitres du nouveau roman de Jean ForteRoche.  </p>
		</aside>
		
		<article id="seleChap">
				<div class="thumbnail">
					<h5><a href="./home.php?action=auteur&amp;id=<?php$donnees['id']?>'"><?= htmlspecialchars($donnees['titre'])?></a></h5>
						<p class="sumChapters"> <?=$donnees['textchap']?> [...]</br>
						Mise en ligne le:<?=$donnees['date_fr']?></p>
				</div>
					</article>
				</div>
			</section>
