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
	//Chargement du fichier des options
	if (file_exists("./xml/option.xml"))
	{
		    $xml=simplexml_load_file("./xml/option.xml");
	}

	//Traitement des données
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

  //Sauvegarde des modifications du fichier d'option
  $fe = fopen("./xml/option.xml", "w+" );
	fwrite($fe, $xml->saveXML(), strlen($xml->saveXML()));

	fclose($fe);
?>