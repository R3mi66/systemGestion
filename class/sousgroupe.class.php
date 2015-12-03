<?php
    /*-----------------------------------*/
    /*        sousgroupe.class.php       */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*            "sousgroupe"           */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Sousgroupe
	{
		private $idsousgroupe;
		private $idgroupe;
		private $nomsousgroupe;
		private $onglet

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/

		public function __construct()
		{
			$this->idsousgroupe = '';
			$this->idgroupe = $this->nomsousgroupe = $this->onglet = '';
		}

		/*-------------------*/
		/* Fonctions setters */
		/*-------------------*/

		public function setIdSousGroupe($nouvelIdSousGroupe)
		{
			$this->idsousgroupe = $nouvelIdSousGroupe;
		}

		public function setIdGroupe($nouvelIdGroupe)
		{
			$this->idgroupe = $nouvelIdGroupe;
		}

		public function setNomSousGroupe($nouvelNomSousGroupe)
		{
			$this->nomsousgroupe = $nouvelNomSousGroupe;
		}

		public function setOnglet($nouvelOnglet)
		{
			$this->onglet = $nouvelOnglet;
		}

		/*-------------------*/
		/* Fonctions getters */
		/*-------------------*/

		public function getIdSousGroupe()
		{
			return $this->idsousgroupe;
		}

		public function getIdGroupe()
		{
			return $this->idgroupe;
		}

		public function getNomSousGroupe()
		{
			return $this->nomsousgroupe;
		}

		public function getOnglet()
		{
			return $this->onglet;
		}
	}?>