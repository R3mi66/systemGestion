<?php
    /*-----------------------------------*/
    /*          function_cycle.php       */
    /*-----------------------------------*/
    /*                                   */
    /*       Fichier des fonctions       */
    /*             des annexes           */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
    //Fonction de calcul de la date du lundi et vendredi de chaque semaine de l'année
    function get_monday_friday_week($week, $year, $format = "Y-m-d")
    {
        $firstDayinYear = date("N", mktime(0, 0, 0, 1, 1, $year));

        if($firstDayinYear<5)
            $shift = (1 - $firstDayinYear)*86400;
        else
            $shift = (8 - $firstDayinYear)*86400;

        if ($week > 1)
            $weekInSeconds = ($week-1)*604800;
        else
            $weekInSeconds = 0;

        $timestamp_lundi = mktime(0, 0, 0, 1, 1, $year) + $weekInSeconds + $shift;
        $timestamp_vendredi = mktime(0, 0, 0, 1, 5, $year) + $weekInSeconds + $shift;

        return array(date($format, $timestamp_lundi), date($format, $timestamp_vendredi));
    }               
?>