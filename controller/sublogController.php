<?php
				try{
					$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
				}
				catch (Exception $e){
					die('Erreur: ' . $e->getmsg());
				}


				$_POST['lastname'] = htmlspecialchars($_POST['lastname']);
				$_POST['firstname'] = htmlspecialchars($_POST['firstname']);
				$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);//PSEUDO
				$_POST['mdp']=$_POST['mdp'];//MOT DE PASSE
				$_POST['mdp1']=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
				//$_POST['mail'] = htmlspecialchars($_POST['mail']);//ADRESSE MAIL
				// $_POST['signature']=htmlspecialchars($_POST['signature']);
	//Vérification pseudo


		// if ($_POST['pseudo']&& $^_POST['mdp1'] sont dans la bdd) {
				//alors on vérifie que les 2 correspondent entres eux.
				//SINON, on renvoie vers la page login avec un message d'erreur.
	
		// }
		// else

		if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['pseudo'])){
			if (preg_match("#^[a-zA-Z0-9]?#", $_POST['pseudo']) ){
				if (isset($_POST['mail'])) {
					if (preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
						if ($_POST['mdp']==$_POST['mdp1']) {
							if((preg_match("#^[a-zA-Z0-9]?#", $_POST['mdp']))){
										
								$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

								$req = $bdd->prepare('INSERT INTO membres(lastname,firstname,pseudo,mail,mdp,date_entree) VALUES(:lastname,:firstname,:pseudo,:mail,:mdp,NOW() )');

								$req->execute(array(
									'lastname'=>$_POST['lastname'],
									'firstname'=>$_POST['firstname'],
									'pseudo'=> $_POST['pseudo'],
									'mail'=>$_POST['mail'],
									'mdp'=>$pass_hache
								));
								// var_dump($_POST['pseudo']);
								// var_dump($_POST['firstname']);
								// var_dump($_POST['lastname']);
								// var_dump($_POST['mail']);
								$reponse= $bdd->query('SELECT lastname,firstname,pseudo,mail,signature,date_entree FROM membres');
	 								var_dump($reponse['pseudo']);
	 								echo htmlspecialchars($reponse['pseudo'])."!";

							}else {
								echo "erreur 0";
							}
						}else{
							echo "erreur 12";
						}
					}else{
						echo "mail incorrect";
					}
				}else{
			echo "erreur dans le mail";
		}
			}else{
			echo "erreur dans le mdp";
		}
			//end php's check regex pseudo
		}else{
			echo "erreur dans le nom";
		}
		//End of first and last name condition.

	

	// 						//---------------VERIFICATION DES INFORMATIONS------------//

	// 						
	// 					}
	// 						else{
	// 					echo 'adresse invalide';
	// 					}
	// 				}
	// 			}
	// 			else{
	// 				echo "le mot de passe ne correspond pas à la norme</br>";
	// 			}
	// 		}else{
	// 			echo "mot de passe NON similaire! </br>";}//fin mot de passe
	// 	}//fin pseudo
	// }

