<?php
    /*-----------------------------------*/
    /*          function_cycle.php       */
    /*-----------------------------------*/
    /*                                   */
    /*       Fichier des fonctions       */
    /*              des cycles           */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
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

    //Fonctions des différents cycle
	function trimestriel($intervention, $ouvrage, $year)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Trimestre - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2nd Trimestre - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 3eme Trimestre - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 4eme Trimestre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	}

	function mois3($intervention, $ouvrage, $year)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Fevrier - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
	}

	function hebdomadaire($intervention, $ouvrage, $year, $i, $lundi, $vendredi)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
	}

	function mensuel($intervention, $ouvrage, $year)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Février - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mars - ' . $ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juin - ' . $ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Septembre - ' . $ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Decembre - ' . $ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	}

	function saisonnier($intervention, $ouvrage, $year, $i, $lundi, $vendredi)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Station - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
	}

	function annuel($intervention, $ouvrage, $year)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
	}

	function semestriel($intervention, $ouvrage, $year)
	{
        $database = new Database();
    $base = $database->connection();

		$base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Semestre - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2eme Semestre - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
    }


    function semaine2($intervention, $ouvrage, $year, $i, $lundi, $vendredi)
    {   
        $database = new Database();
    $base = $database->connection();
    
        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
    }               
?>