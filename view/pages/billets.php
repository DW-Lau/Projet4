<section>
	<div id="sideDeco">
		<article id="allBills">
			<h3>Restez à la page des dernière nouveau:</h3>
		<!-- 	<form method="post" action="home.php?action=billets">
			<select name="choice">
				<option value="order" id="order" name="order">Ordre de parution</option>
				<option value="lastUpdate" id="lastUpdate" name="lastUpdate">Dernier en date</option>
				<input type="submit" id="validation" value="Valider" />
			</select>
		</form>
		<div id="test"> -->
			<?php
				while($billets= $rep->fetch()){
			?>
		<h4  class="new_Aside"> <?php echo htmlspecialchars($billets['billetitre']); ?></h4>
			<p class="new_Note"><?php echo htmlspecialchars($billets['commbillet'])?>
			</p>
			<?php
				}
				$rep->closeCursor();
			?>	
		<!-- </div> -->
		</article>
		
	</div>
</section>

