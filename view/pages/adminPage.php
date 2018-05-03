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
	<article id="WrittingChap">
		<h2> <span class="maj">é</span>crire un nouveau chapitre:</h2>
		<form id="getNewComment" action="./home.php?action=postChap" method="post">
							<label>Titre:<input type="text" name="title" id="title" value="" required/></label>
							<textarea class="tinymce" name="tinymce_Chap"></textarea>
							<input type="submit" id="send" value="Publier" />
						</form>
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
			<p>
			<?php
					while ($list=$listChapters->fetch() ) {
			?>
			<?php echo $list['titre']?>:<a href="./home.php?action=editChap&amp;id=<?php echo $list['id']; ?>">Modifier</a> <br/>
			<?php
			}
			$listChapters->closeCursor();
			?>
		</p>
		</div>
	</aside>

</section>
<script type="text/javascript" src="./view/javascript/jquery.min.js"></script>
<script type="text/javascript" src="./view/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="./view/plugins/tinymce/init-tinymce.js"></script>
</body>
</html>