<?php
    /*-----------------------------------*/
    /*         liste_complete.php        */
    /*-----------------------------------*/
    /*                                   */
    /*     Liste Complete des taches     */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	global $base;

	$year = date("Y");
	$now = date("Y-m-d H:i:s");

	$ouvrage = array ('Agly','Vdr','Vinca','Reseau','Station');

	//Liste des taches pour chacun des sites
	for ($i=0; $i<5; $i++)
	{
		echo '<div id=\''. $ouvrage[$i] .'\'>';
			$reponse = $base->query('SELECT idtache, nomtache, datemaxtache, daterealisationtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%'. $ouvrage[$i] .'%\'');
			echo '<table>';
				echo '<thead><tr><th>Tache '. $ouvrage[$i] .'</th></tr>';
				echo '<tbody>';
					while ( $donnees = $reponse->fetch() )
					{
						echo '<tr>';
							if (($donnees['datemaxtache'] < $now) AND ($donnees['daterealisationtache'] == NULL))
							{
								echo '<td bgcolor=\'red\'><a href=\'?idtache=' . $donnees['idtache'] . '\'>' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
							}
							elseif ($donnees['daterealisationtache'] != NULL) {
								echo '<td bgcolor=\'green\'><a href=\'?idtache=' . $donnees['idtache'] . '\'>' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
							}
							else{
								echo '<td><a href=\'?idtache=' . $donnees['idtache'] . '\'>' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
							}

						echo '</tr>';
					}
				echo '</tbody>';
			echo '</table>';
		echo '</div>';
	}
?>