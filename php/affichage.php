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

	$reponse = $base->query('SELECT nomtache, datemaxtache FROM tache_2016 WHERE datetache <= CURDATE()');
	
	echo '<div id=\'admin\'>';
		echo "<form name='search' action='./admin_post.php' method='POST'>";
		echo '<table>';
			echo '<thead><tr><th>Tache</th></tr>';
			echo '<tbody>';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>';
						echo '<td>' . htmlspecialchars($donnees['nomtache']) . '</td>';
					echo '</tr>';
				}
			echo '</tbody>';
		echo '</table>';
		echo '</form>';
	echo '</div>';
	
	$reponse->closeCursor();
?>