<?php
    /*-----------------------------------*/
    /*            Ouvrage.php            */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*             "ouvrage"             */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Ouvrage
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

		/*------------------------------------------------------*/
		/*    Listing de la totalité des ouvrages de la table   */
		/*------------------------------------------------------*/
		public function lister($base)
		{
			return $base->query('SELECT * FROM ouvrage');
		}
	}
?>