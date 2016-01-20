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

    //Année en cours
    $year = date("Y");

    //Nombre de semaine dans l'année
    $nbresemaine = date("W", mktime(0,0,0,12,28,$year));

    //Définition des semaines de début et fin de campagne d'irrigation
    $debutcampagne = date("W", mktime(0,0,0,04,01,$year));
    $fincampagne = date("W", mktime(0,0,0,10,30,$year));

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
            switch ($intervention->cycle)
            {
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
                    for ($i = 1; $i < $nbresemaine+1; $i++)
                    {
                        $retour = get_monday_friday_week($i, $year);
                        
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                    }
                    break;

                case 'Mensuel':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Février - ' . $intervention->ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mars - ' . $intervention->ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $intervention->ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $intervention->ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juin - ' . $intervention->ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $intervention->ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $intervention->ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Septembre - ' . $intervention->ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $intervention->ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $intervention->ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Decembre - ' . $intervention->ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Saisonnier':
                    for ($i = $debutcampagne; $i < $fincampagne+1; $i++)
                    {
                        //Thuir
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Mascareil - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Camelas - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                        //Rivesaltes
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Rivesaltes - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                        //Espira de l'Agly
                       $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Espira - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                        //Latour de France
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Latour de France - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                    }
                    break;

                case 'Semestriel':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Semestre - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2eme Semestre - ' . $intervention->ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Annuel':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
                    break;

                case 'Annuelp':
                    if ( $year%2 == 0 )
                    {
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
                    }
                    break;

                case 'Annueli':
                    if ( $year%2 != 0 )
                    {
                        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
                    }
                    break;

                case 'Janvier':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Fevrier':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
                    break;

                case 'Mars':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Avril':
                   $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
                    break;

                case 'Mai':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Juin':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
                    break;

                case 'Juillet':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Aout':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Septembre':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
                    break;

                case 'Octobre':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
                    break;

                case 'Novembre':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
                    break;

                case 'Decembre':
                    $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $intervention->ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
                    break;

                case '1semaine/2':
                    for ($i = 1; $i < $nbresemaine+1; $i++)
                    {
                        if ( $i%2 == 0 )
                        {
                            $retour = get_monday_friday_week($i, $year);
                            
                            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $intervention->ouvrage . '\', \'' . $retour[0] . ' 00:00:00\', \'' . $retour[1]  . ' 23:59:59\', NULL, NULL)');
                        }
                    }
                    break;
                 
                default:
                    echo 'Non reconnu : ' . $intervention->cycle;
                    echo '<br>';
                    break;
            }
        }
	}
?>