<?php

  // Include 'Composer' autoloader.
  include '../vendor/autoload.php';

  require_once '../DAL/sourceDAL.php';
  require_once '../model/source.php';

  $sourceDAL = new sourceDAL();
  $sources = $sourceDAL->getSources();

  //print_r($sources);

  foreach ($sources as $s){
    echo $s->GetTitle() . "</br>";
    echo "<i>". $s->GetAuthor() . "</i></br>";
    if(!$s->GetAbstractEN() == ""){
      echo $s->GetAbstractEN() . "</br>";
    }else if(!$s->GetAbstractNL() == ""){
      echo $s->GetAbstractNL() . "</br>";
    }
    echo "</br></br>";
  }

  /*foreach($sources as $s){
    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($s->link);

    $text = $pdf->getText();
    echo $pdfDAL->savePDFText($text, $s->ID);
  }*/

?>

<html>
  <head>
    <link rel = "stylesheet" type="text/css" href="../CSS/home.css"/>
  </head>
  <body>
  </body>
</html>
