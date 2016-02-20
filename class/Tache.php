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
		private $_idOuvrage;
		private $_nomOuvrage;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/
		public function __construct()
		{
			$this->_idOuvrage = '';
			$this->_nomOuvrage = '';
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