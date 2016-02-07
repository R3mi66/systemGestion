<?php
    /*-----------------------------------*/
    /*      formulaire_cyclique.php      */
    /*-----------------------------------*/
    /*                                   */
    /*      Formulaire d'ajout d'une     */
    /*            tache cyclique         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Récupération des informations nécessaires au formulaires
    //Liste des ouvrages
    $ouvrage = new Ouvrage();
    $list_ouvrage = $ouvrage->lister($base);
    //Liste des cycles
    $cycle = new Cycle();
    $list_cycle = $cycle->lister($base);
?>

    <!-- Formulaire d'ajout d'une tache cyclique -->
    <form method="post" action="./php/traitement_formulaire.php">
        <fieldset>
            <legend>Ajout d'une intervention cyclique</legend>
            <p>
                <label for="intervention">Intervention</label> : <input class="form-control" type="text" name="intervention" required />
            </p>
            <p>
                <label for="ouvrage">Ouvrage</label> : 
                <select class="form-control" name="ouvrage" id="ouvrage" required />
                    <?php
                        while ( $donnees_ouvrage = $list_ouvrage->fetch() )
                        {
                            echo '<option value="' . $donnees_ouvrage['nomouvrage'] .'">' . $donnees_ouvrage['nomouvrage'] . '</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="cycle">Cycle</label> : 
                <select class="form-control" name="cycle" id="cycle" required />
                    <?php
                        while ( $donnees_cycle = $list_cycle->fetch() )
                        {
                            echo '<option value="' . $donnees_cycle['nomcycle'] .'">' . $donnees_cycle['nomcycle'] . '</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <input class="btn" type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>
