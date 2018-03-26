
		
			<section>
				<div id="sideDeco">
					<article>
						<h4> Jean Forteroche</h4> 
						<p>Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.</p>

						<p>Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco nec postulo, facis amice; sed, ut mihi videris, non recte iudicas de Catone; aut enim nemo, quod quidem magis credo, aut si quisquam, ille sapiens fuit. Quo modo, ut alia omittam, mortem filii tulit! memineram Paulum, videram Galum, sed hi in pueris, Cato in perfecto et spectato viro.</p>

						<p>Quod opera consulta cogitabatur astute, ut hoc insidiarum genere Galli periret avunculus, ne eum ut praepotens acueret in fiduciam exitiosa coeptantem. verum navata est opera diligens hocque dilato Eusebius praepositus cubiculi missus est Cabillona aurum secum perferens, quo per turbulentos seditionum concitores occultius distributo et tumor consenuit militum et salus est in tuto locata praefecti. deinde cibo abunde perlato castra die praedicto sunt mota.</p>

						<p>Victus universis caro ferina est lactisque abundans copia qua sustentantur, et herbae multiplices et siquae alites capi per aucupium possint, et plerosque mos vidimus frumenti usum et vini penitus ignorantes.</p>

						<p>Post hanc adclinis Libano monti Phoenice, regio plena gratiarum et venustatis, urbibus decorata magnis et pulchris; in quibus amoenitate celebritateque nominum Tyros excellit, Sidon et Berytus isdemque pares Emissa et Damascus saeculis condita priscis.</p>
					</article>

					<aside>
						<h5> Les derniers billets</h5>
						<?php
							try{
								$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
								}
							catch (Exception $e){
								die('Erreur: ' . $e->getmsg());
							}

							$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit LIMIT 0,2');
						echo '<div id="block">';
						while($informations= $rep->fetch() ){
							echo '<aside class="last_Comm">
										<h4  class="new_Aside">'.htmlspecialchars($informations['billetitre']).'</h4>
											<p class="new_Note">'.htmlspecialchars($informations['commbillet']).'</p>
									</aside>';
								
						}	
						echo '</div>';//End of <div id="block">
						$rep ->closeCursor();
					?>
					</aside>

				</div>
			</section>
