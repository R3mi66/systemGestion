<?php
    /*-----------------------------------*/
    /*           demarrage.php           */
    /*-----------------------------------*/
    /*                                   */
    /*      Traitement au démarrage      */
    /*          de l'application         */
    /*                                   */
    /*-----------------------------------*/
?>

<?php
  //Chargement et Action sur les différentes options de l'application transmises par le fichier option.xml
	//Vérification de l'existence du fichier des options
	if (file_exists("./xml/option.xml"))
	{
      //Chargement du fichier des options
		  $xml=simplexml_load_file("./xml/option.xml");
	}

	//Traitement des données de Date
	$day = date("d");
	$month = date("m");
	$year = date("Y");

	if($xml->datetime->year != $year)
	{
  	$xml->datetime->year = $year;
  }

  if($xml->datetime->month != $month)
	{
  	$xml->datetime->month = $month;
  }

  if($xml->datetime->day != $day)
	{
  	$xml->datetime->day = $day;
  }

  //Ouverture du fichier
  $fe = fopen("./xml/option.xml", "w+" );

	//Sauvegarde des modifications du fichier d'option
  fwrite($fe, $xml->saveXML(), strlen($xml->saveXML()));

  //Fermeture du fichier
	fclose($fe);


  //Vérification de l'existence de la table nécessaire au fonctionnement de l'application + Création si nécessaire
  //Vérification Existence de la table tache[xxxx]
  
?>