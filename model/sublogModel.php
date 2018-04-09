<?php
//---------------INFORMATIONS from inscription form------------//
// $lastname = htmlspecialchars($_POST['lastname']);
// $firstname= htmlspecialchars($_POST['firstname']);
// $pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
// $mdp=$_POST['mdp'];//MOT DE PASSE
// $mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
// $mail = $_POST['mail'];//ADRESSE MAIL

//---------------INFORMATIONS from loginForm form------------//

function checkInfo($checkPseudo,$checkmdp){
	$bdd=dbConnect();
		var_dump($checkPseudo);

	$req= $bdd->prepare('SELECT id,mdp FROM membres WHERE pseudo=:pseudo');
	$req->execute(array(
   			    'pseudo' => $checkPseudo
   			));
//	var_dump($checkUser['pseudo']);
	$resultat = $req->fetch();
	// return $resultat;
	$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);
// 	if (!$resultat){
//   		echo 'Mauvais identifiant ou mot de passe !';
// 	}else{
//     	if ($isPasswordCorrect) {
//         	session_start();
//         	$_SESSION['id'] = $resultat['id'];
//        		$_SESSION['pseudo'] = $pseudo;
//         echo 'Vous êtes connecté !';
//     }
//     else {
//         echo 'Mauvais identifiant ou mot de passe !';
//     }
// }
	//return $isPasswordCorrect;
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
				'mdp'=>$pass_hache
			));
		return $infoUser;
		//var_dump($infoUser);

		// $reponse= $bdd->prepare('SELECT id,pseudo FROM membres WHERE pseudo=:pseudo');
		// $reponse-> execute(array(
		// 	'pseudo'=>$pseudo));

		//  $informationsMembre=$reponse->fetch();
	// 	 header("Location:../../home.php");

	// }else {
	// 	header("Location:inscription.php");
	// }
}//end of subInfo()

// function getIdUser($id,$pseudo){
// 	$bdd=dbConnect();

// 	$logUser=$bdd->prepare('SELECT id, pseudo FROM membres WHERE id=: id, pseudo=:pseudo');
// 	$infoLog=$logUser->execute(array(
// 		'id'=>$id,
// 		'pseudo'=>$pseudo
// 		));
// 	return $infoLog;
// }
