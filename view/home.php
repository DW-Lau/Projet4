<!DOCTYPE html>
<html>

<?php
require ("portions/header.php");/*THE HEADER IS CALL */
if (!(isset($_GET['action']) ) ) {
	require("../controller/homeController.php");//FONCTIONNE
}
if (isset($_GET['action'])){
	if($_GET['action']=='inscription'){
		require ("../controller/sublogController.php");
	}//end of $_GET['action']=='inscription'		

if ($_GET['action']=='logger') {
	require ("../controller/sublogController.php");
		
if (isset($_POST['lastname'])) {
	$lastname = htmlspecialchars($_POST['lastname']);
	$firstname= htmlspecialchars($_POST['firstname']);
	$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
	$mdp=$_POST['mdp'];//MOT DE PASSE
	$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
	$mail = $_POST['mail'];//ADRESSE MAIL

	if(isset($lastname)&& isset($firstname)&&isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail)){
		if ($mdp==$mdp1) {
			if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {
				if ( isset($lastname)&& isset($firstname)&&isset($pseudo)&&($mdp==true)&&($mail== true) ) {
							 // var_dump($lastname);

							// getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
									  getNewUser($_POST['lastname'],$_POST['firstname'],$_POST['pseudo'],$_POST['mdp'],$_POST['mail']);
						//	var_dump(getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail) );
												 echo "OKAY ligne 67"; 

										require ("../controller/sublogController.php");
										echo "toujours okay";
						}
							else{
								echo "Un problème est survenu. Veuillez resaissir vos informations";
							}
					}
				}else{
					echo "les 2 mots de passe ne sont pas correspondant.";
				}

		}			/*MAIL*/
				

				//This condition will check if  all inuput are well filled.
				/*endof Submit/login session*/
	}else{
			$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
			$checkmdp = $_POST['checkmdp'];
		if ( isset($checkPseudo)&& isset($checkmdp) ){
				echo "vérife pseudo et mdp";
				checkInfoUser($_POST['checkPseudo'],$_POST['checkmdp']);

			checkInfos();
				if (!$resultat){
					  echo 'Mauvais identifiant ou mot de passe !';
				}else{
					if ($isPasswordCorrect) {
						session_start();
						  	$_SESSION['id'] = $resultat['id'];
						    $_SESSION['pseudo'] = $pseudo;
						    echo "SESSION OK";
					}else {
					    	echo 'Mauvais identifiant ou mot de passe !';
					   	}
				}//end of the fist else

		}
	}//It will check if login or submit has been filled.
}
		
		elseif( $_GET['action']=='billets' ){
			require("../controller/billsController.php");
				
		}
		// elseif( ($_GET['action']=='billets')&&(isset($_POST['lastUpdate']) ) ){
		// 		require("../controller/billsController.php");
		// 		$rep=getLastBills();
		// 	}
	
		elseif ($_GET['action']=='auteur') {//got to auteur.php
			require("pages/auteur.php");
		}

		elseif ($_GET['action']=='chapitres') {
			require("../controller/selecChapController.php");

		}
		 elseif($_GET['action']=='chapitre'){
		 	require("../controller/oneChapController.php");
		 }
		 elseif($_GET['action']=='supprimeComm'){
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