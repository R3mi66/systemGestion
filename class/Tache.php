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
	}
?>