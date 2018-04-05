<?php
	try{
		$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
	}
	catch (Exception $e){
		die('Erreur: ' . $e->getmsg());
	}

//---------------INFORMATIONS from inscription form------------//
$lastname = htmlspecialchars($_POST['lastname']);
$firstname= htmlspecialchars($_POST['firstname']);
$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
$mdp=$_POST['mdp'];//MOT DE PASSE
$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
$mail = $_POST['mail'];//ADRESSE MAIL

//---------------INFORMATIONS from loginForm form------------//

// $checkPseudo = htmlspecialchars($_POST['checkPseudo']);
// 		$checkmdp = $_POST['checkmdp'];

function checkInfos(){
	$req= $bdd->prepare('SELECT id,mail FROM membres WHERE pseudo=:pseudo');
	$req->execute(array(
    'pseudo' => $checkPseudo));

	$resultat = $req->fetch();
	$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);

	// if (!$resultat)
	// {
	//     echo 'Mauvais identifiant ou mot de passe !';
	// }
	// 	else{
	//   		if ($isPasswordCorrect) {
	// 	        session_start();
	// 	        $_SESSION['id'] = $resultat['id'];
	// 	        $_SESSION['pseudo'] = $pseudo;

	//   		}
	//   		else {
	//        		 echo 'Mauvais identifiant ou mot de passe !';
	//    		}
	// 	}//end of the fist else
}//end of checkInfos();

function subInfo(){
	// if ($mdp==$mdp1) {
	// 	//if both pwd matches together, then
	// }else{
	// 	echo "les 2 mots de passe ne sont pas correspondant.";
	// }

	// /*MAIL*/
	// if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {

	// }else{
	// 	echo "Votre mail ne correspond pas à la norme...";
	// }

	// //This condition will check if  all inuput are well filled.
	// if ( isset($lastname)&& isset($firstname)&&isset($pseudo)&&($mdp==true)&&($mail== true) ) {
		$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

		$req = $bdd->prepare('INSERT INTO membres(lastname,firstname,pseudo,mail,mdp) VALUES(:lastname,:firstname,:pseudo,:mail,:mdp )');
		var_dump($lastname);
		$req->execute(array(
				'lastname'=>$lastname,
				'firstname'=>$firstname,
				'pseudo'=>$pseudo,
				'mail'=>$mail,
				'mdp'=>$pass_hache));

		$reponse= $bdd->prepare('SELECT id,pseudo FROM membres WHERE pseudo=:pseudo');
		$reponse-> execute(array(
			'pseudo'=>$pseudo));

		 $informationsMembre=$reponse->fetch();
	// 	 header("Location:../../home.php");

	// }else {
	// 	header("Location:inscription.php");
	// }
}//end of subInfo()


