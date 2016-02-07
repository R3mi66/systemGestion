<?php
    /*-----------------------------------*/
    /*             Cycle.php             */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*              "cycle"              */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Cycle
	{
		private $_idCycle;
		private $_nomCycle;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/
		public function __construct()
		{
			$this->_idCycle = '';
			$this->_nomCycle = '';
		}

		/*------------------------------------------------------*/
		/*    Listing de la totalité des cycles de la table   */
		/*------------------------------------------------------*/
		public function lister($base)
		{
			return $base->query('SELECT * FROM cycle');
		}
	}
?>