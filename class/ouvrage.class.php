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
		private $nomouvrage;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/

		public function __construct()
		{
			$this->idouvrage = '';
			$this->nomouvrage = '';
		}

		/*-------------------*/
		/* Fonctions setters */
		/*-------------------*/

		public function setIdOuvrage($nouvelIdOuvrage)
		{
			$this->idouvrage = $nouvelIdOuvrage;
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

		public function getNomOuvrage()
		{
			return $this->nomouvrage;
		}

		/*--------------------------*/
		/* Fonctions personnalisées */
		/*--------------------------*/

		//Ajout d'un groupe
		public function addOuvrage($nomOuvrage){
			global $base;

			if (($nomOuvrage != '') and (preg_match('#[^a-zA-Z]#', $idSousGroupe)))
			{
				//Requête de récupération des données
				$base->query('INSERT INTO ouvrage (nomouvrage) VALUES (\'' . htmlspecialchars($this->nomOuvrage) . '\')');
			}
			else
			{
				throw new Exception("Ajout de l'ouvrage non réalisé.", 1);
			}
		}

		//Supprimer un ouvrage
		public function deleteOuvrage($idOuvrage){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idOuvrage))
			{
				//Requête de récupération des données
				$base->query('DELETE FROM ouvrage WHERE idouvrage = \'' . $idOuvrage . '\'');
			}
			else
			{
				throw new Exception("Suppression de l'ouvrage non effectué. Id de l'ouvrage incorrect", 1);
			}
		}

		//Mise à jour d'un ouvrage
		public function updateOuvrage($idOuvrage, $nomOuvrage){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idOuvrage))
			{
				//Requête de mise à jour des données
				$base->query('UPDATE ouvrage SET nomouvrage = \'' . htmlspecialchars($nomOuvrage) . '\' WHERE idouvrage = \'' . $idOuvrage . '\'');
			}
			else
			{
				throw new Exception("Mise a jour de l'ouvrage non effectué. Id de l'ouvrage incorrect", 1);
			}
		}

		//Fiche d'un ouvrage
		public function recupDonneeOuvrage($idOuvrage)
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomouvrage FROM ouvrage WHERE idouvrage = \'' . htmlspecialchars($idOuvrage) . '\'');
			$donnees = $reponse->fetch();

			if ($donnees['nomouvrage'] != '')
			{
				//Affectation des données récupérées
				$this->nomouvrage = $donnees['nomouvrage'];
			}
			else
			{
				throw new Exception("Récupération impossible.", 1);
			}

			$reponse->closeCursor();
		}

		//Liste complète des ouvrages
		public function listeCompleteOuvrage()
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT nomouvrage FROM ouvrage');
			$listComplete = $reponse->fetchAll();

			//Retourne l'ensemble de la table
			return $listComplete;
		}
	}?>