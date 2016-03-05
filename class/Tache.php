<?php
    /*-----------------------------------*/
    /*             Tache.php             */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*              "tache"              */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Tache
	{
		private $_idTache;
		private $_nomTache;
		private $_dateTache;
		private $_dateMaxTache;
		private $_dateRealisationTache;
		private $_commentaire;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/
		public function __construct()
		{
			$this->_idTache = '';
			$this->_nomTache = $this->_dateTache = $this->_dateMaxTache = $this->_dateRealisationTache = $this->_commentaire = '';
		}

		/*-------------------------------------------------*/
		/*    Creation d'une nouvelle table 'tache[xxxx]   */
		/*-------------------------------------------------*/
		public function creer($base)
		{
			$year = date("Y");
			
			//Creation de la table annuelle
        	$creation = $base->query('CREATE TABLE tache_' . $year . '(idtache INT UNSIGNED AUTO_INCREMENT, nomtache VARCHAR(255) NOT NULL, datetache DATETIME NOT NULL, datemaxtache DATETIME NOT NULL, daterealisationtache DATETIME, commentaire VARCHAR(258), PRIMARY KEY (idtache)) ENGINE=INNODB');
		}

		/*-------------------------------------------------*/
		/*    Creation d'une intervention trimestrielle    */
		/*-------------------------------------------------*/
		public function trimestriel($base, $intervention, $ouvrage, $year)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Trimestre - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-03-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2nd Trimestre - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 3eme Trimestre - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-09-30 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 4eme Trimestre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
		}

		/*-------------------------------------------*/
		/*    Creation d'une intervention 2mois/3    */
		/*-------------------------------------------*/
		public function mois3($base, $intervention, $ouvrage, $year)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Janvier - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-01-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Fevrier - ' . $ouvrage . '\', \'' . $year . '-02-01 00:00:00\', \'' . $year . '-02-28 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Avril - ' . $ouvrage . '\', \'' . $year . '-04-01 00:00:00\', \'' . $year . '-04-30 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Mai - ' . $ouvrage . '\', \'' . $year . '-05-01 00:00:00\', \'' . $year . '-05-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Juillet - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-07-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Aout - ' . $ouvrage . '\', \'' . $year . '-08-01 00:00:00\', \'' . $year . '-08-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Octobre - ' . $ouvrage . '\', \'' . $year . '-10-01 00:00:00\', \'' . $year . '-10-31 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Mois de Novembre - ' . $ouvrage . '\', \'' . $year . '-11-01 00:00:00\', \'' . $year . '-11-30 23:59:59\', NULL, NULL)');
		}

		/*------------------------------------------------*/
		/*    Creation d'une intervention hebdomadaire    */
		/*------------------------------------------------*/
		
		public function hebdomadaire($base, $intervention, $ouvrage, $year, $i, $lundi, $vendredi)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
		}

		/*---------------------------------------------*/
		/*    Creation d'une intervention mensuelle    */
		/*---------------------------------------------*/
		
		public function mensuel($base, $intervention, $ouvrage, $year)
		{
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

		/*-----------------------------------------------*/
		/*    Creation d'une intervention saisonniere    */
		/*-----------------------------------------------*/
		
		public function saisonnier($base, $intervention, $ouvrage, $year, $i, $lundi, $vendredi)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'Visite Station - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
		}

		/*--------------------------------------------*/
		/*    Creation d'une intervention annuelle    */
		/*--------------------------------------------*/
		public function annuel($base, $intervention, $ouvrage, $year)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Année ' . $year . ' - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-12-10 23:59:59\', NULL, NULL)');
		}

		/*------------------------------------------------*/
		/*    Creation d'une intervention semestrielle    */
		/*------------------------------------------------*/
		public function semestriel($base, $intervention, $ouvrage, $year)
		{
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 1er Semestre - ' . $ouvrage . '\', \'' . $year . '-01-01 00:00:00\', \'' . $year . '-06-30 23:59:59\', NULL, NULL)');
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - 2eme Semestre - ' . $ouvrage . '\', \'' . $year . '-07-01 00:00:00\', \'' . $year . '-12-31 23:59:59\', NULL, NULL)');
	    }

	    /*----------------------------------------------*/
		/*    Creation d'une intervention 1semaine/2    */
		/*----------------------------------------------*/
	    public function semaine2($base, $intervention, $ouvrage, $year, $i, $lundi, $vendredi)
	    {   
	        $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention . ' - Semaine ' . $i . ' - ' . $ouvrage . '\', \'' . $lundi . ' 00:00:00\', \'' . $vendredi  . ' 23:59:59\', NULL, NULL)');
	    }
	}
?>