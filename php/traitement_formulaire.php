<?php
    /*-----------------------------------*/
    /*     traitement_formulaire.php     */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement des données       */
    /*     envoyées par le formulaire    */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Connection à la base de données
    $database = new Database();
    $base = $database->connection();
    
    include_once('function_cycle.php');

    //Chargement du fichier des options
    if (file_exists("./xml/cyclique.xml"))
    {
            $xml=simplexml_load_file("./xml/cyclique.xml");
    }

     //Année en cours
    $year = date("Y");

    //Nombre de semaine dans l'année
    $nbresemaine = date("W", mktime(0,0,0,12,28,$year));

    $intervention = $_POST['intervention'];
    $ouvrage = $_POST['ouvrage'];
    $cycle = $_POST['cycle'];

    //Detection des noms de stations
    if (($ouvrage == "Camelas") OR ($ouvrage == "Mascareil") OR ($ouvrage == "Espira") OR ($ouvrage == "Rivesaltes") OR ($ouvrage == "Corbere") OR ($ouvrage == "Saint Michel") OR ($ouvrage == "Bouleternere") OR ($ouvrage == "Latour") OR ($ouvrage == "Station VDR"))
    {
        $intervention = $intervention .' ' . $ouvrage;
        $ouvrage = "Station";
    }    

    switch ($cycle)
    {
        case 'Trimestriel':
            trimestriel($intervention, $ouvrage, $year);
            break;

        case '2mois/3':
            mois3($intervention, $ouvrage, $year);
            break;

        case 'Hebdomadaire':
            for ($i = 1; $i < $nbresemaine+1; $i++)
            {
                $retour = get_monday_friday_week($i, $year);

                hebdomadaire($intervention, $ouvrage, $year, $i, $retour[0], $retour[1]);
            }
            break;

        case 'Mensuel':
            mensuel($intervention, $ouvrage, $year);
            break;

        case 'Saisonnier':
            saisonnier($intervention, $ouvrage_station, $ouvrage, $year, $i, $retour[0], $retour[1]);
            break;

        case 'Semestriel':
            semestriel($intervention, $ouvrage, $year);
            break;

        case 'Annuel':
            annuel($intervention, $ouvrage, $year);
            break;

        case 'Annuelp':
            if ( $year%2 == 0 )
            {
                annuel($intervention, $ouvrage, $year);
            }
            break;

        case 'Annueli':
            if ( $year%2 != 0 )
            {
                annuel($intervention, $ouvrage, $year);
            }
            break;

        case 'Janvier':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
            break;

        case 'Fevrier':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
            break;

        case 'Mars':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
            break;

        case 'Avril':
           $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
            break;

        case 'Mai':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
            break;

        case 'Juin':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
            break;

        case 'Juillet':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
            break;

        case 'Aout':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
            break;

        case 'Septembre':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
            break;

        case 'Octobre':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
            break;

        case 'Novembre':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
            break;

        case 'Decembre':
            $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
            break;

        case '1semaine/2':
            for ($i = 1; $i < $nbresemaine+1; $i++)
            {
                if ( $i%2 == 0 )
                {
                    $retour = get_monday_friday_week($i, $year);

                    semaine2($intervention, $ouvrage, $year, $i, $retour[0], $retour[1]);
                }
            }
            break;
         
        default:
            echo 'Non reconnu : ' . $cycle;
            echo '<br>';
            break;
    }

	//Redirection vers la page principale
	header('location:../index.php');
?>