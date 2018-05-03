<section>
	<?php
	while($chapitre = $pickOneChap->fetch()){
	?>
	<form id="editChaptre" action="./home.php?action=reEdit&amp;id=<?php echo $chapitre['id']; ?>" method="post">
		<label>Titre:<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($chapitre['titre']);?>" required/></label>
		<textarea class="tinymce" name="tinymce_Chap"><?= nl2br($chapitre['textchap'])?></textarea>
		<input type="submit" id="edit" value="Modifier" />
	</form>

<?php
			}
				$pickOneChap->closeCursor();
			?>
</section>
<script type="text/javascript" src="./view/javascript/jquery.min.js"></script>
<script type="text/javascript" src="./view/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="./view/plugins/tinymce/init-tinymce.js"></script>
</body>
</html>