
	<div id="last_billet">
			<h4>Les dernières nouveautés:</h4>
			<span class="blog">
				<?php
					while($lastBillet=$billet->fetch() ){
				?>
					<h6><?php echo htmlspecialchars($lastBillet['billetitre']);?> le:<?php echo htmlspecialchars($lastBillet['date_ecrit_fr']);?></h6>
					<p>
					<?= nl2br($lastBillet['commbillet']);?>
					</p>
					<?php
				}
				$billet->closeCursor();
				?>
			</span>
	</div>
</div>

