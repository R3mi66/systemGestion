<?php
    /*-----------------------------------*/
    /*           navigation.php          */
    /*-----------------------------------*/
    /*                                   */
    /*      Lien de navigation entre     */
    /*             les pages             */
    /*                                   */
    /*-----------------------------------*/
?>

<ul class="nav nav-tabs">
	<li <?php if((!isset($_GET["page"]) OR ($_GET["page"]==1))){?>class="active"<?php } ?>><a href="?page=1">Taches en cours</a></li>
	<li <?php if((isset($_GET["page"]) AND ($_GET["page"]==2))){?>class="active"<?php } ?>><a href="?page=2">Liste complete</a></li>
</ul>
