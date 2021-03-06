﻿<?php
    /*-----------------------------------*/
    /*             index.php             */
    /*-----------------------------------*/
    /*                                   */
    /*  Page principal de l'application  */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Chargement de la fonction d'auto-chargement des classes
    include_once('./class/auto_load.php');

    //Connection à la base de données
    $database = new Database();
    $base = $database->connection();


    //Intégration des fonctions annexes
    include_once('./php/function_cycle.php');

    //Traitement effectué au chargement de l'application
    include_once('./php/demarrage.php');
?>

<!DOCTYPE html>
<html>
    <!-- Entete de la page -->
    <head>
        <meta charset="utf-8" />
        <title>Système de gestion des interventions systématiques</title>

        <!-- Icone dans onglet -->
        <link rel="shortcut icon" type="image/gif" href="./ressource/icone/iconbrl.gif" />

        <!-- Feuille de style -->
        <link rel="stylesheet" href="./css/style.css" />

        <!-- Lien vers Bootstrap -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    </head>

    <!-- Corps de la page-->
    <body>
        <div class="container-fluid" style="zoom:75%">
            <div class="entete">
                <!-- Barre de Navigation -->
                <div id='navigation'>
                    <?php include_once('./php/navigation.php'); ?>
                </div>

                <!-- Determination de l'affichage ou non de la barre formulaire -->
                <?php
                    if (!isset($_GET["page"]) OR ($_GET["page"]==1))
                    {
                ?>
                    <!-- Formulaire d'ajout d'une tache cyclique-->
                    <div id='formulaire_cyclique'>
                        <?php include_once('./php/formulaire_cyclique.php'); ?>
                    </div>
                    <!-- Formulaire d'ajout d'une tache cyclique-->
                    <div id='formulaire_unique'>
                        <?php include_once('./php/formulaire_unique.php'); ?>
                    </div>
                <?php
                    }
                ?>
            </div>

            <!-- Affichage principal -->
            <div id='affichage' class="text-center">
                <?php include_once('./php/affichage.php'); ?>
            </div>
        </div>
    </body>
</html>
