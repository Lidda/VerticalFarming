<?php

  // Include 'Composer' autoloader.
  include '../vendor/autoload.php';

  require_once '../DAL/sourceDAL.php';
  require_once '../model/source.php';

  $pdfDAL = new sourceDAL();
  $sources = $sourceDAL->getSources();

  foreach ($sources as $pdf){
    echo $pdf->GetTitle . "</br>";
    echo "<i>". $pdf->GetAuthor . "</i></br>";
    echo $pdf->GetAbstract . "</br></br>";
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
