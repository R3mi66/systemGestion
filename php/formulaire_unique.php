<?php
    /*-----------------------------------*/
    /*       formulaire_unique.php       */
    /*-----------------------------------*/
    /*                                   */
    /*      Formulaire d'ajout d'une     */
    /*             tache unique          */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Récupération des informations nécessaires au formulaires
    //Liste des ouvrages
     //Liste des ouvrages
    $ouvrage = new Ouvrage();
    $list_ouvrage = $ouvrage->lister($base);
?>

    <!-- Formulaire d'ajout d'une tache ponctuelle -->
    <form method="post" action="./php/traitement_formulaire_unique.php">
        <fieldset>
            <legend>Ajout d'une intervention ponctuelle</legend>
            <p>
                <label for="intervention_unique">Intervention</label> : <input class="form-control" type="text" name="intervention_unique" required />
            </p>
            <p>
                <label for="ouvrage_unique">Ouvrage</label> : 
                <select class="form-control" name="ouvrage_unique" id="ouvrage_unique" required />
                    <?php
                        while ( $donnees_ouvrage = $list_ouvrage->fetch() )
                        {
                            echo '<option value="' . $donnees_ouvrage['nomouvrage'] .'">' . $donnees_ouvrage['nomouvrage'] . '</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="date_tache_unique">Date de la tache</label> : <input class="form-control" type="date" name="date_tache_unique" required />
            </p>
            <p>
                <label for="date_max_unique">Date Limite de réalisation</label> : <input class="form-control" type="date" name="date_max_unique" required />
            </p>
            <p>
                <input class="btn" type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>
