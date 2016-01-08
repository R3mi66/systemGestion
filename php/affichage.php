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
	
	//Liste des taches pour l'Agly
	echo '<div id=\'agly\'>';
		$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%Agly%\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
		echo '<table>';
			echo '<thead><tr><th>Tache Agly</th></tr>';
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

	//Liste des taches pour VDR
	echo '<div id=\'vdr\'>';
		$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%VDR%\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
		echo '<table>';
			echo '<thead><tr><th>Tache VDR</th></tr>';
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

	//Liste des taches pour Vinca
	echo '<div id=\'vinca\'>';
		$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%Vinca%\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
		echo '<table>';
			echo '<thead><tr><th>Tache Vinca</th></tr>';
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

	//Liste des taches pour le Reseau
	echo '<div id=\'reseau\'>';
		$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%Reseau%\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
		echo '<table>';
			echo '<thead><tr><th>Tache Reseau</th></tr>';
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

	//Liste des taches pour les stations
	echo '<div id=\'station\'>';
		$reponse = $base->query('SELECT idtache, nomtache, datemaxtache FROM tache_' . $year . ' WHERE nomtache LIKE \'%Station%\' AND datetache <= CURDATE() AND daterealisationtache IS NULL ORDER BY datemaxtache');
		echo '<table>';
			echo '<thead><tr><th>Tache Station</th></tr>';
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
?>