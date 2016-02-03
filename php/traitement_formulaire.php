<?php
    /*-----------------------------------*/
    /*     traitement_formulaire.php     */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement des données       */
    /*     envoyées par le formulaire    */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    echo $_POST['intervention'];
    echo $_POST['ouvrage'];
    echo $_POST['cycle'];

	//Redirection vers minichat.php
	//header('location:index.php');
?>