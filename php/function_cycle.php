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
	function trimestriel($intervention, $ouvrage, $year)
	{
		global $base;

		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mars - ' . $ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juin - ' . $ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Septembre - ' . $ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Decembre - ' . $ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	}

	function mois3($intervention, $ouvrage, $year)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Fevrier - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
	}

	function hebdomadaire($intervention, $ouvrage, $year, $i, $lundi, $vendredi)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
	}

	function mensuel_station($intervention, $station, $ouvrage, $year)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Février - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Mars - ' . $ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Juin - ' . $ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Septembre - ' . $ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' ' . $station . ' - Mois de Decembre - ' . $ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	}

	function mensuel($intervention, $ouvrage, $year)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Février - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mars - ' . $ouvrage . '\', \'' . $year . '-03-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juin - ' . $ouvrage . '\', \'' . $year . '-06-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Septembre - ' . $ouvrage . '\', \'' . $year . '-09-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Decembre - ' . $ouvrage . '\', \'' . $year . '-12-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	}

	function saisonnier($intervention, $station, $ouvrage, $year, $i, $lundi, $vendredi)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Station' . $station .' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
	}

	function annuel($intervention, $ouvrage, $year)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
	}

	function semestriel($intervention, $ouvrage, $year)
	{
		global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Semestre - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
        $requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2eme Semestre - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
    }


    function semaine2($intervention, $ouvrage, $year, $i, $lundi, $vendredi)
    {   
        global $base;
		
		$requete = $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
    }
?>