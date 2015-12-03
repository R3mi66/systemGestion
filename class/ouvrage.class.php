<?php
    /*-----------------------------------*/
    /*         ouvrage.class.php         */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*              "groupe"             */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Ouvrage
	{
		private $idouvrage;
		private $idsousgroupe;
		private $nomouvrage;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/

		public function __construct()
		{
			$this->idouvrage = '';
			$this->idsousgroupe = $this->nomouvrage = '';
		}

		/*-------------------*/
		/* Fonctions setters */
		/*-------------------*/

		public function setIdOuvrage($nouvelIdOuvrage)
		{
			$this->idouvrage = $nouvelIdOuvrage;
		}

		public function setIdSousGroupe($nouvelIdSousGroupe)
		{
			$this->idsousgroupe = $nouvelIdSousGroupe;
		}

		public function setNomOuvrage($nouvelNomOuvrage)
		{
			$this->nomouvrage = $nouvelNomOuvrage;
		}

		/*-------------------*/
		/* Fonctions getters */
		/*-------------------*/

		public function getIdOuvrage()
		{
			return $this->idouvrage;
		}

		public function getIdSousGroupe()
		{
			return $this->idsousgroupe;
		}

		public function getNomOuvrage()
		{
			return $this->nomouvrage;
		}
	}?>