<?php
    /*-----------------------------------*/
    /*         tache_en_cours.php        */
    /*-----------------------------------*/
    /*                                   */
    /*       Liste Taches en cours       */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	$year = date("Y");
	$now = date("Y-m-d H:i:s");

	$ouvrage = array ('Agly','VDR','Vinca','Reseau','Station');

	if ( isset($_GET['idtache']) )
	{
		$base->query('UPDATE tache_' . $year . ' SET daterealisationtache = \'' . $now . '\' WHERE idtache=\'' . $_GET['idtache'] . '\'');
	}
	
	//Liste des taches pour chacun des sites
	for ($i=0; $i<5; $i++)
	{
		echo '<div class=\'\'>';
			$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%'. $ouvrage[$i] .'\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
			echo '<table>';
				echo '<thead><tr><th>Tache '. $ouvrage[$i] .'</th></tr>';
				echo '<tbody>';
					while ( $donnees = $reponse->fetch() )
					{
						echo '<tr>';
							if ($donnees['datemaxtache'] < $now)
							{
								echo '<td bgcolor=\'#ff6347\'><a class="a" href=\'?idtache=' . $donnees['idtache'] . '\' onclick="return confirm(\'Etes vous sûre de vouloir valider cette intervention ?\');">' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
							}
							else{
								echo '<td><a class="a" href=\'?idtache=' . $donnees['idtache'] . '\' onclick="return confirm(\'Etes vous sûre de vouloir supprimer cette intervention \');">' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
							}

						echo '</tr>';
					}
				echo '</tbody>';
			echo '</table>';
		echo '</div>';
	}
?>