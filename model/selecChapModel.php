	<?php
			try{
							$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
						}
						catch (Exception $e){
							die('Erreur: ' . $e->getmsg());
						}

						$reponse= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 100)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ');//Selection of the first 100 characters 
				
						while($donnees=$reponse->fetch() ){
							// echo'<div class="thumbnail">
							// 		<h5><a href="./home.php?action=auteur?id='.$donnees['id'].'">'. htmlspecialchars($donnees['titre']).'</a></h5>
							// 		<p class="sumChapters">'.$donnees['textchap'].' [...]</br>
							// 		Mise en ligne le:'.$donnees['date_fr'] .'</p>
							// 	</div>' ;
						}
						$reponse -> closeCursor();
						?>