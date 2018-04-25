<?php
session_start();
//var_dump($_SESSION['id']);
// if(isset($_SESSION["pseudo"]) ){
// 	echo 'Bonjour et bienvenue: '.$_SESSION['pseudo'];
// }
?>
<!DOCTYPE html>
<html>

<?php
require ("view/portions/header.php");/*THE HEADER IS CALL */

if (!(isset($_GET['action']) ) ) {
	require("controller/Front.php");
	firstPage();
}
if (isset($_GET['action'])){
	if($_GET['action']=='logOut'){
		session_destroy();
		// header("Location:home.php");
	}
	if($_GET['action']=='inscription'){
	 	require ("controller/Back.php");
	 		formulaire();

	}//end of $_GET['action']=='inscription'		

	if ($_GET['action']=='subscribeMember') {
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
						var_dump($lastname);
							
						require ("controller/Back.php");
						subscribe($lastname,$firstname,$pseudo,$mdp,$mail);
							
					}
					else{
						echo "Un problème est survenu. Veuillez resaissir vos informations";
					}
				}//end of regex pwd
			}else{
				echo "les 2 mots de passe ne sont pas correspondant.";
			}
		}//end of if(isset($lastname)&& isset($firstname)&&	.....
			
	}//end of if (isset($_POST['lastname'])) ligne30
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];

		if ( isset($checkPseudo)&& isset($checkmdp) ){
			require ("controller/Back.php");	
			checkInfo($checkPseudo,$checkmdp);
		}

	}//end of 'logger'
	
	if($_GET['action']=='admin'){
		require("view/pages/connexionAdmin.php");
	}
	if($_GET['action']=='adminOnly'){
		$AdminPseudo=htmlspecialchars($_POST['IdAdmin']);
		$AdminPwd=$_POST['PwdAdmin'];

		if (isset($AdminPseudo)&& isset($AdminPwd)) {
			
			require("controller/Back.php");
			lastUpdate();
			adminConnexion($AdminPseudo,$AdminPwd);
			
		}
	}
 	if ($_GET['action']=='chapitres') {
		require("controller/Front.php");
		getAllChaps();
	}
	if($_GET['action']=='selectionchapitre'){
		require("controller/Front.php");
		getOneChap();
	} 	

	if($_GET['action']=='ValiderComment'){
		$_GET['id'];
		//var_dump($_GET['id']);
		$idChap=$_GET['id'];
		$pseudoComment=$_POST['nickname'];
		$textComment=$_POST['tinymce'];
		var_dump($pseudoComment);
		 		
		addComment($_POST['nickname'],$_POST['tinymce'],$_GET['id']);echo "passer?";
		require("../controller/oneChapController.php");
				
	}
	if ($_GET['action']=='signaler'){
		$_GET['id'];
		var_dump($_GET['id']);
		$warningComm=$_GET['id'];
		var_dump($warningComm);
			require("controller/Back.php");
			updateWarningComm($warningComm);


	}
		 
	if($_GET['action']=='supprimeComm'){
		require("controller/Front.php");
	}
}//end of all actions
?>
		
		<script type="text/javascript" src="javascript/commentaires.js"></script>

</html>