<?php
	
	if (isset($pseudo) || isset($checkPseudo) ){
	include('../controller/loginController.php');
	    if ($isPasswordCorrect) {
       		session_start();
      		$_SESSION['id'] = $resultat['id'];
        	$_SESSION['pseudo'] = $pseudo;
       		echo 'Vous êtes connecté !';
   		}
   		else{
   			echo "Mauvais identifiant ou mot de passe";
   		}
}
	//echo '<script> alert("Bonjour: '.$_SESSION['pseudo']. '" !)</script>';
?>
<!DOCTYPE html>
<html>

<?php
require ("portions/header.php");/*THE HEADER IS CALL */

if (!(isset($_GET['action']) ) ) {
	require("../controller/homeController.php");//FONCTIONNE
	//require("../controller/footerController.php");
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
							// getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
							getNewUser($_POST['lastname'],$_POST['firstname'],$_POST['pseudo'],$_POST['mdp'],$_POST['mail']);
							 echo "OKAY ligne 44"; 

							require ("../controller/sublogController.php");
												echo "okay ligne 47";
						}else{
							echo "Un problème est survenu. Veuillez resaissir vos informations";
						}
					}
				}else{
					echo "les 2 mots de passe ne sont pas correspondant.";
				}
			}//end of if(isset($lastname)&& isset($firstname)&&	.....
			
		}//end of if (isset($_POST['lastname'])) ligne30
		else{
			$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
			$checkmdp = $_POST['checkmdp'];
			if ( isset($checkPseudo)&& isset($checkmdp) ){
				checkInfo($_POST['checkPseudo'],$_POST['checkmdp']);
				require ("../controller/loginController.php");
				//checkInfos();
					//end of the fist else
				}
			}//It will check if login or submit has been filled.
	}
		
	// elseif( $_GET['action']=='billets' ){
	// 	require("../controller/billsController.php");			
	// }
	// elseif ($_GET['action']=='auteur') {//got to auteur.php
	// 	require("pages/auteur.php");
	// }

		elseif ($_GET['action']=='chapitres') {
			require("../controller/selecChapController.php");

		}
		 elseif($_GET['action']=='chapitre'){
		 	require("../controller/oneChapController.php");
		 	getComments();
		 	
		 	if($_GET['action']=='chapitre'){
		 		//echo "hello?";
		 		$_GET['id'];
		 		//var_dump($_GET['id']);
		 		$idChap=$_GET['id'];
		 		$pseudoComment=$_POST['nickname'];
				$textComment=$_POST['tinymce'];
		 		var_dump($pseudoComment);
		 		
				addComment($_POST['nickname'],$_POST['tinymce'],$_GET['id']);echo "passer?";
				require("../controller/oneChapController.php");
				
		 	}elseif (isset($_GET['signaler'])){

		 		//suppression commentaire
		 	}
		 }
		 elseif($_GET['action']=='supprimeComm'){
		 	require("../controller/oneChapController.php");
		 }
}

require("../controller/footerController.php");
 ?>
		
		<script type="text/javascript" src="javascript/commentaires.js"></script>

</html>