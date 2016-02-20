<?php
    /*-----------------------------------*/
    /*         Intervention.php          */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*           "intervention"          */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Intervention
	{
		private $_idIntervention;
		private $_nomIntervention;
		private $_idOuvrage;
		private $_idCycle;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/
		public function __construct()
		{
			$this->_idCycle = '';
			$this->_nomCycle = $this->_idOuvrage = $this->_idCycle = '';
		}

		/*------------------------------------------------------*/
		/*    Listing de la totalité des cycles de la table   */
		/*------------------------------------------------------*/
		public function lister($base)
		{
			return $base->query('SELECT i.nomintervention nom_intervention, o.nomouvrage nom_ouvrage, c.nomcycle nom_cycle
									FROM intervention i
									INNER JOIN cycle c
									ON  i.idcycle = c.idcycle
									INNER JOIN ouvrage o
									ON  i.idouvrage = o.idouvrage
									');
		}
	}
?>