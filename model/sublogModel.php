<?php
//---------------INFORMATIONS from inscription form------------//
// $lastname = htmlspecialchars($_POST['lastname']);
// $firstname= htmlspecialchars($_POST['firstname']);
// $pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
// $mdp=$_POST['mdp'];//MOT DE PASSE
// $mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
// $mail = $_POST['mail'];//ADRESSE MAIL

//---------------INFORMATIONS from loginForm form------------//

function checkInfo($checkpseudo,$checkmdp){
	$bdd=dbConnect();

	$req= $bdd->prepare('SELECT id,mail FROM membres WHERE pseudo=:pseudo');
	$checkUser=$req->execute(array(
   			    'pseudo' => $checkPseudo));

	$resultat = $checkUser->fetch();
	$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);
	return $isPasswordCorrect;
}//end of checkInfos();   

function getNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
		$bdd=dbConnect();
		$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

		$user = $bdd->prepare('INSERT INTO membres(lastname,firstname,pseudo,mail,mdp) VALUES(:lastname,:firstname,:pseudo,:mail,:mdp )');
		$infoUser=$user->execute(array(
				'lastname'=>$lastname,
				'firstname'=>$firstname,
				'pseudo'=>$pseudo,
				'mail'=>$mail,
				'mdp'=>$pass_hache));
		return $infoUser;
		var_dump($infoUser);

		// $reponse= $bdd->prepare('SELECT id,pseudo FROM membres WHERE pseudo=:pseudo');
		// $reponse-> execute(array(
		// 	'pseudo'=>$pseudo));

		//  $informationsMembre=$reponse->fetch();
	// 	 header("Location:../../home.php");

	// }else {
	// 	header("Location:inscription.php");
	// }
}//end of subInfo()


