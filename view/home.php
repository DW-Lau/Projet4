<!DOCTYPE html>
<html>

<?php
require ("portions/header.php");/*THE HEADER IS CALL */
if (!(isset($_GET['action']) ) ) {
	require("pages/homepage.php");
}
if (isset($_GET['action'])){
	if($_GET['action']=='inscription'){
		require("pages/inscription.php");
		require ("../contoller/sublogController.php");
		/*Condition Submit or login session*/
		if ( isset($_POST['checkPseudo'])&& isset($_POST['checkmdp']) ){
			checkInfos();
		}else{
			subInfos();/*endof Submit/login session*/
		}//It will check if login or submit has been filled.


	}//end of $_GET['action']=='inscription'
	
		elseif ($_GET['action']=='auteur') {//got to auteur.php
			require("pages/auteur.php");
		}
		elseif ($_GET['action']=='chapitres') {
			require("pages/chapitres.php");
			require("../controller/selectChapController.php");
				if ($_GET['action']=='chapitre') {
					require("pages/chapitre.php");
					
				}
		}
}
 ?>
			
			<footer>
				<?php require("portions/mentionsLeg.php");?>
			</footer>
		</body>
		<script type="text/javascript" src="javascript/commentaires.js"></script>

</html>