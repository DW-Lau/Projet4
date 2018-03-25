<?php
if (isset($pseudo) ){
	require('../../controller/sublogController.php');
session_start();
$_SESSION=$informationsMembre;
echo '<script> alert("Bonjour: '.$_SESSION['pseudo']. '" !)</script>';
}

?>
<div id="mentions_Infos">
	<div id="comptes_inscriptions">
		<?php //condition to acces profil's page, when user is log in.
		if( isset($_SESSION['pseudo']) ){
			echo '<p> Bonjour: '.$_SESSION['pseudo'].'</p>';

		}else{
			echo '<h4>Connexion:</h4>
			<p class="bottom"> 
				Vous êtes déjà membre:<a href="./home.php?action=inscription">Login</a>
			<br/>
				Vous voulez nous rejoindre: <a href="./home.php?action=inscription"> Inscription</a>
			</p>';
		}
		?>
		
						
	</div>
	<div id="last_bill">
			<h4>Les dernières nouveautés:</h4>
			<span class="blog">
				<?php
					try{
						$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
					}
					catch (Exception $e){
						die('Erreur: ' . $e->getmsg());
					}

					$reponse= $bdd->query('SELECT id_billets, billetitre, commbillet, date_format(date_ecrit,"%d.%m.%Y - %H.%i")as date_ecrit_fr FROM billets ORDER BY date_ecrit LIMIT 0 , 1');

					while($donnees=$reponse->fetch() ){

					echo '<h6>'.htmlspecialchars($donnees['billetitre']).' le:'.$donnees['date_ecrit_fr'].'</h6><p>
					'.htmlspecialchars($donnees['commbillet']).'</p>';
				}
				$reponse->closeCursor();

				?>
			</span>
	</div>
	<!-- <div id="contacts">	
		<h4>Contacts</h4>
			<ul>
				<li>Tel: 01 23 45 67 89</li>
				<li>Mail:jean.forteRoche@adressemail.test</li>
				<li>Editeur:</li>
			</ul>
			<p> Projet réalisé dans le cadre de la formation Openclassrooms: Dévelloppeur web junior.
			</p>
	</div> -->
</div>