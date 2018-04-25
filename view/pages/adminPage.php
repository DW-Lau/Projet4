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
<section id="adminPannel">
	<article>
		
	</article>
	<aside id="gestionBlock">
		<div id="CommAdmin">
			<h2> Liste des commentaires à vérifier:</h2>
			<?php
				while ($listReportedComm= $reportedComments-> fetch() ) {
			?>
			<p>Message: <?php echo htmlspecialchars($listReportedComm['contenu']);?> <br/>
				Ecrit par: <?php echo htmlspecialchars($listReportedComm['membre']);?> le: <?php echo htmlspecialchars($listReportedComm['date_poste_fr']);?>
			</p>
			<?php
			}
			$reportedComments-> closeCursor();

			?>
			
		</div>
		<div id="ChapAdmin">
			<h2> Liste des chapitres déjà publié:</h2>
			<?php
					while ($list=$listChapters->fetch() ) {
			?>
			<h3><?php echo htmlspecialchars($list['titre'])?></h3>
			<?php
			}
			$listChapters->closeCursor();
			?>
		</div>
	</aside>

</section>