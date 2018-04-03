<!DOCTYPE html>
<html>

<?php
require ("portions/header.php");/*THE HEADER IS CALL */
if (!(isset($_GET['action']) ) ) {
	require("../controller/homeController.php");//FONCTIONNE
}
if (isset($_GET['action'])){
	if($_GET['action']=='inscription'){
	
		require("pages/inscription.php");
		/*Condition Submit or login session*/

	}//end of $_GET['action']=='inscription'		
	if ($_GET['action']=='logger') {
		require ("../controller/sublogController.php");
		if ( isset($_POST['checkPseudo'])&& isset($_POST['checkmdp']) ){
			$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];
			checkInfos();
				if (!$resultat){
					  echo 'Mauvais identifiant ou mot de passe !';
				}else{
					if ($isPasswordCorrect) {
						session_start();
						  	$_SESSION['id'] = $resultat['id'];
						    $_SESSION['pseudo'] = $pseudo;
					}else {
					    	echo 'Mauvais identifiant ou mot de passe !';
					   	}
				}//end of the fist else
		}elseif(isset($lastname)&& isset($firstname)&&isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($amil)){
			$lastname = htmlspecialchars($_POST['lastname']);
			$firstname= htmlspecialchars($_POST['firstname']);
			$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
			$mdp=$_POST['mdp'];//MOT DE PASSE
			$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
			$mail = $_POST['mail'];//ADRESSE MAIL
				if ($mdp==$mdp1) {
		//if both pwd matches together, then
				}else{
					echo "les 2 mots de passe ne sont pas correspondant.";
				}

				/*MAIL*/
				if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {

				}else{
					echo "Votre mail ne correspond pas à la norme...";
				}

				//This condition will check if  all inuput are well filled.
				if ( isset($lastname)&& isset($firstname)&&isset($pseudo)&&($mdp==true)&&($mail== true) ) {
						subInfos();
				}/*endof Submit/login session*/
		}//It will check if login or submit has been filled.

	}
		
	
	
		elseif ($_GET['action']=='auteur') {//got to auteur.php
			
		}

		elseif ($_GET['action']=='chapitres') {
			require("../controller/selecChapController.php");

		}
		 elseif($_GET['action']=='chapitre'){
		 	require("../controller/oneChapController.php");
		 }
}
 ?>
			
			<footer>
				<?php require("portions/mentionsLeg.php");?>
			</footer>
		</body>
		<script type="text/javascript" src="javascript/commentaires.js"></script>

</html>