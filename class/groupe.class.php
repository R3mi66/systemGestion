<?php
    /*-----------------------------------*/
    /*          groupe.class.php         */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*              "groupe"             */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Groupe
	{
		private $idgroupe;
		private $nomgroupe;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/

		public function __construct()
		{
			$this->idgroupe = '';
			$this->nomgroupe = '';
		}

		/*-------------------*/
		/* Fonctions setters */
		/*-------------------*/

		public function setIdGroupe($nouvelIdGroupe)
		{
			$this->idgroupe = $nouvelIdGroupe;
		}

		public function setNomGroupe($nouvelNomGroupe)
		{
			$this->nomgroupe = $nouvelNomGroupe;
		}

		/*-------------------*/
		/* Fonctions getters */
		/*-------------------*/

		public function getIdGroupe()
		{
			return $this->idgroupe;
		}

		public function getNomGroupe()
		{
			return $this->nomgroupe;
		}
	}?>