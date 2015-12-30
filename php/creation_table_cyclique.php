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

    //Fonction de calcul de la date du lundi et vendredi de chaque semaine de l'année
    function get_monday_friday_week($week, $year, $format = "Y-m-d")
    {
        $firstDayinYear = date("N", mktime(0, 0, 0, 1, 1, $year));

        if($firstDayinYear<5)
            $shift = (1 - $firstDayinYear)*86400;
        else
            $shift = (8 - $firstDayinYear)*86400;

        if ($week > 1)
            $weekInSeconds = ($week-1)*604800;
        else
            $weekInSeconds = 0;

        $timestamp_lundi = mktime(0, 0, 0, 1, 1, $year) + $weekInSeconds + $shift;
        $timestamp_vendredi = mktime(0, 0, 0, 1, 5, $year) + $weekInSeconds + $shift;

        return array(date($format, $timestamp_lundi), date($format, $timestamp_vendredi));
    }

    //Fonction permettant de connaitre le nombre de semaine dans une année donnée
    function number_week()
    {
        
    }

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
        $creation = $base->query('CREATE TABLE tache_' . $year . '(idtache INT UNSIGNED AUTO_INCREMENT, nomtache VARCHAR(255) NOT NULL, datetache DATETIME NOT NULL, datemaxtache DATETIME NOT NULL, daterealisationtache DATETIME, commentaire VARCHAR(258), PRIMARY KEY (idtache)) ENGINE=INNODB');

        //Remplissage de la table avec les données du fichier cyclique.xml
        foreach ($xml->intervention as $intervention)
        {
            switch ($intervention->cycle) {
                case 'Trimestriel':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mars - ' . $intervention->ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juin - ' . $intervention->ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Septembre - ' . $intervention->ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Decembre - ' . $intervention->ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
                    break;

                case '2mois/3':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Fevrier - ' . $intervention->ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $intervention->ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $intervention->ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $intervention->ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $intervention->ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $intervention->ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $intervention->ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
                    break;

                case 'Hebdomadaire':
                    $retour = get_monday_friday_week(45, 2015);
                    echo "Lundi : " . $retour[0] . " et Vendredi : " . $retour[1];
                    echo '<br>';
                    break;

                case 'Mensuel':
                    echo '4';
                    echo '<br>';
                    break;

                case 'Saisonnier':
                    echo '5';
                    echo '<br>';
                    break;

                case 'Semestriel':
                    echo '6';
                    echo '<br>';
                    break;

                case 'Annuel':
                    echo '7';
                    echo '<br>';
                    break;

                case 'Janvier':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Fevrier':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Mars':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Avril':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Mai':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Juin':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Juillet':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Aout':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Septembre':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Octobre':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Novembre':
                    echo '8';
                    echo '<br>';
                    break;

                case 'Decembre':
                    echo '8';
                    echo '<br>';
                    break;

                case '1semaine/2':
                    echo '1';
                    echo '<br>';
                    break;
                 
                default:
                    echo 'Non reconnu : ' . $intervention->cycle;
                    echo '<br>';
                    break;
            }
        }
	}
?>