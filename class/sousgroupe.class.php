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
		private $onglet;

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

		/*--------------------------*/
		/* Fonctions personnalisées */
		/*--------------------------*/

		//Ajout d'un sous-groupe
		public function addSousGroupe($idGroupe, $nomSousGroupe){
			global $base;

			if (($nomSousGroupe != '') and (preg_match('#[^a-zA-Z]#', $idGroupe)))
			{
				//Requête de récupération des données
				$base->query('INSERT INTO sousgroupe (idgroupe, nomsousgroupe, onglet) VALUES (\'' . $idGroupe . '\', \'' . htmlspecialchars($this->nomSousGroupe) . '\', 0)');
			}
			else
			{
				throw new Exception("Ajout du sous-groupe non réalisé.", 1);
			}
		}

		//Supprimer un sous-groupe
		public function deleteSousGroupe($idSousGroupe){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idSousGroupe))
			{
				//Requête de récupération des données
				$base->query('DELETE FROM sousgroupe WHERE idsousgroupe = \'' . $idSousGroupe . '\'');
			}
			else
			{
				throw new Exception("Suppression du sous-groupe non effectué. Id du sous-groupe incorrect", 1);
			}
		}

		//Mise à jour d'un groupe
		public function updateSousGroupe($idSousGroupe, $idGroupe, $nomSousGroupe, $onglet){
			global $base;

			if ((preg_match('#[^a-zA-Z]#', $idSousGroupe)) and (preg_match('#[^a-zA-Z]#', $idSousGroupe)))
			{
				//Requête de mise à jour des données
				$base->query('UPDATE sousgroupe SET nomsousgroupe = \'' . htmlspecialchars($nomGroupe) . '\', idgroupe = \'' . $idGroupe . '\', onglet = \'' . $onglet . '\' WHERE idsousgroupe = \'' . $idSousGroupe . '\'');
			}
			else
			{
				throw new Exception("Mise a jour du sous-groupe non effectué. Id du sous-groupe incorrect", 1);
			}
		}

		//Fiche d'un groupe
		public function recupDonneeSousGroupe($idSousGroupe)
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomsousgroupe FROM sousgroupe WHERE idsousgroupe = \'' . htmlspecialchars($idSousGroupe) . '\'');
			$donnees = $reponse->fetch();

			if ($donnees['nomsousgroupe'] != '')
			{
				//Affectation des données récupérées
				$this->nomgroupe = $donnees['nomsousgroupe'];
			}
			else
			{
				throw new Exception("Récupération impossible.", 1);
			}

			$reponse->closeCursor();
		}

		//Liste complète des groupes
		public function listeCompleteSousGroupe()
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomsousgroupe FROM sousgroupe');
			$listComplete = $reponse->fetchAll();

			//Retourne l'ensemble de la table
			return $listComplete;
		}
	}?>