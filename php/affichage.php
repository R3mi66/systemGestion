<?php
    /*-----------------------------------*/
    /*             index.php             */
    /*-----------------------------------*/
    /*                                   */
    /*    Page définissant l'affichage   */
    /*          de l'application         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	global $base;

	$year = date("Y");
	$now = date("Y-m-d H:i:s");

	if ( isset($_GET['idtache']) )
	{
		$base->query('UPDATE tache_' . $year . ' SET daterealisationtache = \'' . $now . '\' WHERE idtache=\'' . $_GET['idtache'] . '\'');
	}

	$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
	
	echo '<div id=\'admin\'>';
		echo '<table>';
			echo '<thead><tr><th>Tache</th></tr>';
			echo '<tbody>';
				while ( $donnees = $reponse->fetch() )
				{
					echo '<tr>';
						if ($donnees['datemaxtache'] < $now)
						{
							echo '<td bgcolor=\'red\'><a href=\'?idtache=' . $donnees['idtache'] . '\'>' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
						}
						else{
							echo '<td><a href=\'?idtache=' . $donnees['idtache'] . '\'>' . htmlspecialchars($donnees['nomtache']) . '</a></td>';
						}

					echo '</tr>';
				}
			echo '</tbody>';
		echo '</table>';
	echo '</div>';
	
	$reponse->closeCursor();
?>