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

		/*--------------------------*/
		/* Fonctions personnalisées */
		/*--------------------------*/

		//Ajout d'un groupe
		public function addGroupe($nomGroupe){
			global $base;

			if ($nomGroupe != '')
			{
				//Requête de récupération des données
				$base->query('INSERT INTO groupe (nomgroupe) VALUES (\'' . htmlspecialchars($this->nomGroupe) . '\')');
			}
			else
			{
				throw new Exception("Ajout du groupe non réalisé.", 1);
			}
		}

		//Supprimer un groupe
		public function deleteGroupe($idGroupe){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idGroupe))
			{
				//Requête de récupération des données
				$base->query('DELETE FROM groupe WHERE idgroupe = \'' . $idGroupe . '\'');
			}
			else
			{
				throw new Exception("Suppression du groupe non effectué. Id du groupe incorrect", 1);
			}
		}

		//Mise à jour d'un groupe
		public function updateGroupe($idGroupe, $nomGroupe){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idGroupe))
			{
				//Requête de mise à jour des données
				$base->query('UPDATE groupe SET nomgroupe = \'' . htmlspecialchars($nomGroupe) . '\' WHERE idgroupe = \'' . $idGroupe . '\'');
			}
			else
			{
				throw new Exception("Mise a jour du groupe non effectué. Id du groupe incorrect", 1);
			}
		}

		//Fiche d'un groupe
		public function recupDonneeGroupe($idGroupe)
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomgroupe FROM groupe WHERE idgroupe = \'' . htmlspecialchars($idGroupe) . '\'');
			$donnees = $reponse->fetch();

			if ($donnees['nomgroupe'] != '')
			{
				//Affectation des données récupérées
				$this->nomgroupe = $donnees['nomgroupe'];
			}
			else
			{
				throw new Exception("Récupération impossible.", 1);
			}

			$reponse->closeCursor();
		}

		//Liste complète des groupes
		public function listeCompleteGroupe()
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomgroupe FROM groupe');
			$listComplete = $reponse->fetchAll();

			//Retourne l'ensemble de la table
			return $listComplete;
		}
	}
?>