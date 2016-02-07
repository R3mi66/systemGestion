<?php
    /*-----------------------------------*/
    /* traitement_formulaire_unique.php  */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement des données       */
    /*     envoyées par le formulaire    */
    /*           tache unique            */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Connection à la base de données
    $database = new Database();
    $base = $database->connection();

     //Année en cours
    $year = date("Y");

    $intervention_unique = $_POST['intervention_unique'];
    $ouvrage_unique = $_POST['ouvrage_unique'];
    $date_tache_unique = $_POST['date_tache_unique'];
    $date_max_unique = $_POST['date_max_unique'];

    //Detection des noms de stations
    if (($ouvrage_unique == "Camelas") OR ($ouvrage_unique == "Mascareil") OR ($ouvrage_unique == "Espira") OR ($ouvrage_unique == "Rivesaltes") OR ($ouvrage_unique == "Corbere") OR ($ouvrage_unique == "Saint Michel") OR ($ouvrage_unique == "Bouleternere") OR ($ouvrage_unique == "Latour") OR ($ouvrage_unique == "Station VDR"))
    {
        $intervention_unique = $intervention_unique .' ' . $ouvrage_unique;
        $ouvrage_unique = "Station";
    }  

    //Requête de récupération des données
    $base->query('INSERT INTO tache_' . $year . ' VALUES (NULL, \'' . $intervention_unique . ' - ' . $ouvrage_unique . '\', \'' . $date_tache_unique . ' 00:00:00\', \'' . $date_max_unique . ' 23:59:59\', NULL, NULL)');

	//Redirection vers la page principale
	header('location:../index.php');
?>