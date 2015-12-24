<?php
    /*-----------------------------------*/
    /*     creation_table_cyclique.php   */
    /*-----------------------------------*/
    /*                                   */
    /*       Creation de la table        */
    /*             tache[xxxx]           */
    /*          en début d'année         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	global $base;

    $year = date("Y");

	//Requête de récupération des données
	$reponse = $base->query('SHOW TABLES FROM vdr_system_gestion LIKE \'tache_'. $year . '\'');
	$donnees = $reponse->rowCount();

	if ($donnees == 0)
	{
		//Chargement du fichier de la liste des tâches cyclique
        if (file_exists("./xml/cyclique.xml"))
        {
                $xml=simplexml_load_file("./xml/cyclique.xml");
        }

        //Creation de la table annuelle
        $reponse = $base->query('CREATE TABLE tache_' . $year . '(idtache INT UNSIGNED AUTO_INCREMENT, nomtache VARCHAR(255) NOT NULL, datetache DATETIME NOT NULL, datemaxtache DATETIME NOT NULL, daterealisationtache DATETIME NOT NULL, commentaire VARCHAR(258), PRIMARY KEY (idtache)) ENGINE=INNODB');

        //Sauvegarde des modifications du fichier d'option
        $fe = fopen("./xml/cyclique.xml", "w+" );
        fwrite($fe, $xml->saveXML(), strlen($xml->saveXML()));

        fclose($fe);
	}
?>