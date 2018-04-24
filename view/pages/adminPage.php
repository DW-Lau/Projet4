<div id="headband">
	<div id="lastChapUpDate">
			<?php
				while ($donnees=$lastChapterPost->fetch()) {
			?>
			<h2>Dernier Chapitre: </h2>
				<?php echo htmlspecialchars($donnees['titre']);?>
			<?php
				}
				$lastChapterPost->closeCursor();
			?>
	</div>
	<div id="lastCommUpDate">
		<h2>Dernier Commentaire:</h2>
		<?php
			while ($commentUpdate=$lastCommentPost->fetch() ) {
		?>
		<p>
			<strong> Message:</strong> "<?php echo htmlspecialchars($commentUpdate['contenu']);?> ", <strong> écrit par:</strong> <?php echo htmlspecialchars($commentUpdate['membre']);?>.
			<br/><strong> Au chapitre:</strong> <?php echo htmlspecialchars($commentUpdate['titre']);?>
			<a href="./home.php?action=selectionchapitre&amp;id=<?php echo $commentUpdate['id_chap']; ?>">Aller vers</a>
		</p>
		<?php
			}
				$lastCommentPost->closeCursor();
		?>
	</div>
</div>
