<?php
    /*-----------------------------------*/
    /*           database.php            */
    /*-----------------------------------*/
    /*                                   */
    /*        Classe permettant la       */
    /*         connection avec la        */
    /*           base de données         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	class Database{
		private $_hote;
		private $_databaseName;
		private $_user;
		private $_password;


		public function __construct(){
			$this->_hote = 'localhost';
			$this->_databaseName = 'vdr_system_gestion';
			$this->_user = 'root';
			$this->_password = 'ktz739fm5g68pb22';
		}


		public function connection()
		{
			//Connexion à la base de données
			try
			{
				$connect = new PDO('mysql:host=' . $this->_hote .'; dbname=' . $this->_databaseName . ';charset=utf8', '' . $this->_user . '', '' . $this->_password . '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				return $connect;
			}
			catch(Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
	}
?>