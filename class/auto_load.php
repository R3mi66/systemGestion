<?php
    /*-----------------------------------*/
    /*           auto_load.php           */
    /*-----------------------------------*/
    /*                                   */
    /*       Chargement automatique      */
    /*             des classes           */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	function autoLoad($classe)
	{
		require $classe .'.php';
	}

	spl_autoload_register('autoLoad');
?>