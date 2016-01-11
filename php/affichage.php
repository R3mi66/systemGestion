<?php
    /*-----------------------------------*/
    /*            affichage.php          */
    /*-----------------------------------*/
    /*                                   */
    /*    Gestion des pages affichées    */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
	global $base;

  //Récupération du numero de la page dans l'adresse de la page
  if (isset($_GET["page"])){
		$page_aff=$_GET["page"];
	}
	elseif(isset($_POST["page"])){
		$page_aff=$_POST["page"];
	}
	else{
		$page_aff=0;
	}
	
	$mois=date("m");
	$annee=date("Y");
	
	//Affichage d'un élément suivant le numero de page récupéré
	switch($page_aff){
		case 1:include("./php/tache_en_cours.php");break;
		case 2:include("./php/liste_complete.php");break;
		
		default:include("./php/tache_en_cours.php");break;
		
	}
?>
