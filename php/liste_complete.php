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

	$ouvrage = array ('Agly','VDR','Vinca','Reseau','Station');

	//Liste des taches pour chacun des sites
	for ($i=0; $i<5; $i++)
	{
		echo '<div class=\''. $ouvrage[$i] .'\'>';
			$reponse = $base->query('SELECT idtache, nomtache, datemaxtache, daterealisationtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%'. $ouvrage[$i] .'%\' ORDER BY nomtache');
			echo '<table>';
				echo '<thead><tr><th>Tache '. $ouvrage[$i] .'</th></tr>';
				echo '<tbody>';
					while ( $donnees = $reponse->fetch() )
					{
						echo '<tr>';
							if (($donnees['datemaxtache'] < $now) AND ($donnees['daterealisationtache'] == NULL))
							{
								echo '<td bgcolor=\'#ff6347\'>' . htmlspecialchars($donnees['nomtache']) . '</td>';
							}
							elseif ($donnees['daterealisationtache'] != NULL)
							{
								if ($donnees['datemaxtache'] < $donnees['daterealisationtache'])
								{
									echo '<td bgcolor=\'orange\'>' . htmlspecialchars($donnees['nomtache']) . '</td>';
								}
								else
								{
									echo '<td bgcolor=\'#98fb98\'>' . htmlspecialchars($donnees['nomtache']) . '</td>';
								}
							}
							else
							{
								echo '<td>' . htmlspecialchars($donnees['nomtache']) . '</td>';
							}

						echo '</tr>';
					}
				echo '</tbody>';
			echo '</table>';
		echo '</div>';
	}
?>