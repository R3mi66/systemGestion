<?php
    /*-----------------------------------*/
    /*           demarrage.php           */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement au démarrage      */
    /*          de l'application         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
  //Chargement et Action sur les différentes options de l'application transmises par le fichier option.xml
	//Vérification de l'existence du fichier des options
	if (file_exists("./xml/option.xml"))
	{
      //Chargement du fichier des options
		  $xml=simplexml_load_file("./xml/option.xml");
	}

	//Traitement des données de Date
	$day = date("d");
	$month = date("m");
	$year = date("Y");

	if($xml->datetime->year != $year)
	{
  	$xml->datetime->year = $year;
  }

  if($xml->datetime->month != $month)
	{
  	$xml->datetime->month = $month;
  }

  if($xml->datetime->day != $day)
	{
  	$xml->datetime->day = $day;
  }

  //Ouverture du fichier
  $fe = fopen("./xml/option.xml", "w+" );

	//Sauvegarde des modifications du fichier d'option
  fwrite($fe, $xml->saveXML(), strlen($xml->saveXML()));

  //Fermeture du fichier
	fclose($fe);


  //Vérification de l'existence de la table nécessaire au fonctionnement de l'application + Création si nécessaire
  //Vérification de l'existence de la table tache[xxxx]
  //Requête de récupération des données
  $reponse = $base->query('SHOW TABLES FROM vdr_system_gestion LIKE \'tache_'. $year . '\'');
  $donnees = $reponse->rowCount();

  //Si $donnees est vide alors creation de la table
  if ($donnees == 0)
  {
    //Creation des classes "Tache" et "Intervention"
    $tache = new Tache();
    $intervention = new Intervention();

    //Nombre de semaine dans l'année
    $nbresemaine = date("W", mktime(0,0,0,12,28,$year));

    //Définition des semaines de début et fin de campagne d'irrigation
    $debutcampagne = date("W", mktime(0,0,0,04,01,$year));
    $fincampagne = date("W", mktime(0,0,0,10,30,$year));

    //Creation de la table annuelle tache[xxxx]
    $tache->creer($base);

    //Récupération des taches systématiques
    $listeTache = $intervention->lister($base);

    //Opérations effectuées sur chacune des lignes récupérées suivant le cycle de l'intervention
    while ($donnees = $listeTache->fetch())
    {
      $nom_intervention = $donnees['nom_intervention'];
      $nom_ouvrage = $donnees['nom_ouvrage'];
      $nom_cycle = $donnees['nom_cycle'];

      if (($nom_ouvrage == 'Camelas') OR ($nom_ouvrage == 'Mascareil') OR ($nom_ouvrage == 'Corbere') OR ($nom_ouvrage == 'Bouleternere') OR ($nom_ouvrage == 'Saint Michel') OR ($nom_ouvrage == 'Espira') OR ($nom_ouvrage == 'Rivesaltes') OR ($nom_ouvrage == 'Latour'))
      {
        $nom_intervention = $nom_intervention . ' - Station ' . $nom_ouvrage;
      }

      if ($nom_ouvrage == 'Station VDR')
      {
        $nom_intervention = $nom_intervention . ' - ' . $nom_ouvrage;
      }

      switch ($nom_cycle)
      {
        case 'Trimestriel':
          $tache->trimestriel($base, $nom_intervention, $nom_ouvrage, $year);
          break;

        case '2mois/3':
          $tache->mois3($base, $nom_intervention, $nom_ouvrage, $year);
          break;

        case 'Hebdomadaire':
          for ($i = 1; $i < $nbresemaine+1; $i++)
          {
            $retour = get_monday_friday_week($i, $year);
            $tache->hebdomadaire($base, $nom_intervention, $nom_ouvrage, $year, $i, $retour[0], $retour[1]);
          }
          break;

        case 'Mensuel':
          $tache->mensuel($base, $nom_intervention, $nom_ouvrage, $year);
          break;

        case 'Saisonnier':
          for ($i = $debutcampagne; $i < $fincampagne+1; $i++)
          {
            $retour = get_monday_friday_week($i, $year);
            $tache->saisonnier($base, $nom_intervention, $nom_ouvrage, $year, $i, $retour[0], $retour[1]);
          }
          break;

        case 'Semestriel':
          $tache->semestriel($base, $nom_intervention, $nom_ouvrage, $year);
          break;

        case 'Annuel':
          $tache->annuel($base, $nom_intervention, $nom_ouvrage, $year);
          break;

        case 'Annuelp':
          if ( $year%2 == 0 )
          {
            $tache->annuel($base, $nom_intervention, $nom_ouvrage, $year);
          }
          break;

        case 'Annueli':
          if ( $year%2 != 0 )
          {
            $tache->annuel($base, $nom_intervention, $nom_ouvrage, $year);
          }
          break;

        case 'Janvier':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
          break;

        case 'Fevrier':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
          break;

        case 'Mars':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
          break;

        case 'Avril':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
          break;

        case 'Mai':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
          break;

        case 'Juin':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
          break;

        case 'Juillet':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
          break;

        case 'Aout':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
          break;

        case 'Septembre':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
          break;

        case 'Octobre':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
          break;

        case 'Novembre':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
          break;

        case 'Decembre':
          $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $nom_intervention . ' - Année ' . $year . ' - ' . $nom_ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
          break;

        case '1semaine/2':
          for ($i = 1; $i < $nbresemaine+1; $i++)
          {
            if ( $i%2 == 0 )
            {
              $retour = get_monday_friday_week($i, $year);

              $tache->semaine2($base, $nom_intervention, $nom_ouvrage, $year, $i, $retour[0], $retour[1]);
            }
          }
          break;
         
        default:
          echo 'Non reconnu : ' . $nom_cycle;
          echo '<br>';
          break;
      }
    }
  }
?>