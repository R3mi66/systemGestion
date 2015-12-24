<?php
    /*-----------------------------------*/
    /*             index.php             */
    /*-----------------------------------*/
    /*                                   */
    /*  Page principal de l'application  */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Intégration des Fichiers de classes
    include_once('./class/include.class.php');
    include_once('./php/connexion_sql.php');

    //Intégration de fonctions annexes au serveur
    include_once('./php/creation_table_cyclique.php');

    //Intégration des Fonctions traitées au démarrage
    include('./php/demarrage.php');
?>

<!DOCTYPE html>
<html>
    <!--Entete de la page-->
    <head>
        <meta charset="utf-8" />
        <title>Système de gestion des interventions systématiques</title>
    </head>

    <!--Corps de la page-->
    <body>
        
    </body>
</html>
