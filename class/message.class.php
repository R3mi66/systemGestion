<?php
    /*-----------------------------------*/
    /*          message.class.php        */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement de la classe      */
    /*             "message"             */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Message
	{
		private $idmessage;
		private $textmessage;
		private $datemessage;
		private $daterealisationmessage;

		/*-------------------*/
		/*    Constructeur   */
		/*-------------------*/

		public function __construct()
		{
			$this->idmessage = '';
			$this->textmessage = $this->datemessage = $this->daterealisationmessage = '';
		}

		/*-------------------*/
		/* Fonctions setters */
		/*-------------------*/

		public function setIdMessage($nouvelIdMessage)
		{
			$this->idmessage = $nouvelIdMessage;
		}

		public function setTextMessage($nouveauTextMessage)
		{
			$this->textmessage = $nouveauTextMessage;
		}

		public function setDateMessage($nouvelleDateMessage)
		{
			$this->datemessage = $nouvelleDateMessage;
		}

		public function setOnglet($nouvelleDateRealisationMessage)
		{
			$this->daterealisationmessage = $nouvelleDateRealisationMessage;
		}

		/*-------------------*/
		/* Fonctions getters */
		/*-------------------*/

		public function getIdSousGroupe()
		{
			return $this->idmessage;
		}

		public function getIdGroupe()
		{
			return $this->textmessage;
		}

		public function getNomSousGroupe()
		{
			return $this->datemessage;
		}

		public function getOnglet()
		{
			return $this->daterealisationmessage;
		}

		/*--------------------------*/
		/* Fonctions personnalisées */
		/*--------------------------*/

		//Ajout d'un message
		public function addMessage($textMessage){
			global $base;

			if ($textMessage != '')
			{
				//Requête de récupération des données
				$base->query('INSERT INTO message (textmessage) VALUES (\'' . htmlspecialchars($this->textMessage) . '\'');
			}
			else
			{
				throw new Exception("Ajout du message non réalisé.", 1);
			}
		}

		//Supprimer un message
		public function deleteMessage($idMessage){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idMessage))
			{
				//Requête de récupération des données
				$base->query('DELETE FROM message WHERE idmessage = \'' . $idMessage . '\'');
			}
			else
			{
				throw new Exception("Suppression du message non effectué. Id du message incorrect", 1);
			}
		}

		//Mise à jour d'un message
		public function updateMessage($idMessage, $textMessage, $dateMessage, $dateRealisationMessage){
			global $base;

			if (preg_match('#[^a-zA-Z]#', $idMessage))
			{
				//Requête de mise à jour des données
				$base->query('UPDATE message SET textmessage = \'' . htmlspecialchars($textMessage) . '\', datemessage = \'' . $dateMessage . '\', daterealisationmessage = \'' . $dateRealisationMessage . '\' WHERE idmessage = \'' . $idMessage . '\'');
			}
			else
			{
				throw new Exception("Mise a jour du message non effectué. Id du message incorrect", 1);
			}
		}

		//Fiche d'un message
		public function recupDonneeMessage($idMessage)
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT textmessage FROM message WHERE idmessage = \'' . htmlspecialchars($idMessage) . '\'');
			$donnees = $reponse->fetch();

			if ($donnees['textmessage'] != '')
			{
				//Affectation des données récupérées
				$this->textmessage = $donnees['textmessage'];
			}
			else
			{
				throw new Exception("Récupération impossible.", 1);
			}

			$reponse->closeCursor();
		}

		//Liste complète des message
		public function listeCompleteMessage()
		{
			global $base;

			//Requête de récupération des données
			$reponse = $base->query('SELECT textmessage, datemessage, daterealisationmessage FROM message');
			$listComplete = $reponse->fetchAll();

			//Retourne l'ensemble de la table
			return $listComplete;
		}
	}?>