<?php
session_start();



if (!(isset($_GET['action']) ) ) {
	require("controller/Front.php");
		headBand();
		getAllChaps();
		
}
if (isset($_GET['action'])){
	if($_GET['action']=='logOut'){
		session_destroy();
		require("controller/Front.php");
		headBand();
		getAllChaps();
		// header("Location:home.php");
	}
	if($_GET['action']=='inscription'){
		require("controller/Front.php");
	 	require ("controller/Back.php");
	 		headBand();
	 		formulaire();

	 		//subscribe($lastname,$firstname,$pseudo,$mdp,$mail);
	 		

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
						require ("controller/Back.php");
						subscribe($lastname,$firstname,$pseudo,$mdp,$mail);
						$pseudoPresent=0;
					}
					else{
						require ("controller/Front.php");
						headBand();
						echo "Un problème est survenu. Veuillez resaissir vos informations";
					}
				}//end of regex pwd
			}else{
				require ("controller/Front.php");
				headBand();
				echo "les 2 mots de passe ne sont pas correspondant.</br>

				<a href='./home.php'>Retour à la page d'acceuil .</a>";
			}
		}//end of if(isset($lastname)&& isset($firstname)&&	.....
			
	}//end of if (isset($_POST['lastname'])) ligne30
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];

		if ( isset($checkPseudo)&& isset($checkmdp) ){
			require("controller/Front.php");
			require ("controller/Back.php");	
			headBand();
			checkInfo($checkPseudo,$checkmdp);
			
		}

	}//end of 'logger'
	
	if($_GET['action']=='admin'){
		if (isset($_SESSION["pseudo"])) {
			if( ($_SESSION["id"])=="115"){
				require("controller/Front.php");
				require("controller/Back.php");
				headBand();
				lastUpdate();
			}
		}
		require("controller/Front.php");
		require("controller/Back.php");
		headBand();
		adminPage();
		
		//require("view/pages/connexionAdmin.php");
	}
	if($_GET['action']=='adminOnly'){
		if (!isset($AdminPseudo)&& !isset($AdminPwd)) {
			$AdminPseudo=htmlspecialchars($_POST['IdAdmin']);
			$AdminPwd=$_POST['PwdAdmin'];
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			lastUpdate();
			adminConnexion($AdminPseudo,$AdminPwd);
		}else{
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			lastUpdate();
			adminConnexion($AdminPseudo,$AdminPwd);
			
		}
	}
 	if ($_GET['action']=='chapitres') {
		require("controller/Front.php");
		headBand();
		getAllChaps();
	}
	if($_GET['action']=='selectionchapitre'){
		require("controller/Front.php");
		headBand();
		getOneChap();
	} 	

	if($_GET['action']=='ValiderComment'){
		$_GET['id'];
		//var_dump($_GET['id']);
		$idChap=$_GET['id'];
		//$pseudoComment=$_POST['nickname'];
			 $pseudoComment=$_SESSION['pseudo'];
		$textComment=$_POST['tinymce'];
		//var_dump($pseudoComment);
		 		require("controller/Front.php");
		 		headBand();
		 		//getOneChap();
		addComments($pseudoComment,$textComment,$idChap);		
	}
	if ($_GET['action']=='postChap') {
		$titleChap=$_POST['title'];
		$textChap=$_POST['tinymce_Chap'];
		require("controller/Front.php");
		require("controller/Back.php");
		headBand();
		lastUpdate();
		postChap($titleChap,$textChap);
	}
	if ($_GET['action']=='editChap') {
		$chapEdit=$_GET['id'];
		require("controller/Front.php");
		require("controller/Back.php");
		headBand();
		editChapter();
	}
	if ($_GET['action']=='signaler'){
		$_GET['id'];
		//$_GET['id_chap'];

		//var_dump($_GET['id_chap']);
		$warningComm=$_GET['id'];
		//var_dump($warningComm);
			require("controller/Back.php");
			updateWarningComm($warningComm);


	}
		if($_GET['action']=='reEdit'){
			$idEdit=$_GET['id'];
			$titleEdit=$_POST['title'];
			$textEdit=$_POST['tinymce_Chap'];
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			lastUpdate();
			reEditChap($idEdit,$titleEdit,$textEdit);

		}
	if($_GET['action']=='deleteComm'){
		$id_comm=$_GET['id'];

		require("controller/Front.php");
		require("controller/Back.php");
		deletedComment($id_comm);
	}
	if($_GET['action']=='commentChecked'){
		$id_comm=$_GET['id'];
		require("controller/Front.php");
		require("controller/Back.php");
		validationComment($id_comm);
	}
	if ($_GET['action']=='eraseChap') {
		$idChapter=$_GET['id'];
		require("controller/Front.php");
		require("controller/Back.php");
		deletedChapAndComments($idChapter);
	}
}//end of all actions
?>
		
	<!--	<script type="text/javascript" src="javascript/commentaires.js"></script>
 <script type="text/javascript" src="view/javascript/jquery.min.js"></script>
<script type="text/javascript" src="view/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="view/plugins/tinymce/init-tinymce.js"></script> -->
<!-- </html> -->