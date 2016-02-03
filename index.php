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

    //Intégration des fonctions
    include_once('./php/function_cycle.php');

    //Intégration de fonctions annexes au serveur
    include_once('./php/creation_table_cyclique.php');

    //Intégration des fonctions traitées au démarrage
    include_once('./php/demarrage.php');
?>

<!DOCTYPE html>
<html>
    <!-- Entete de la page -->
    <head>
        <meta charset="utf-8" />
        <title>Système de gestion des interventions systématiques</title>

        <!-- Feuille de style -->
        <link rel="stylesheet" href="./css/style.css" />
    </head>

    <!-- Corps de la page-->
    <body>
        <!-- Barre de Navigation -->
        <div id='navigation'>
            <?php include_once('./php/navigation.php'); ?>
        </div>

        <!-- Determination de l'affichage ou non de la barre formulaire -->
        <?php
            if (!isset($_GET["page"]) OR ($_GET["page"]==1))
            {
        ?>
            <!-- Formulaire d'ajout d'une tache -->
            <div id='formulaire'>
                <?php include_once('./php/formulaire.php'); ?>
            </div>
        <?php
            }
        ?>

        <!-- Affichage principal -->
        <div id='affichage'>
            <?php include_once('./php/affichage.php'); ?>
        </div>
    </body>
</html>
