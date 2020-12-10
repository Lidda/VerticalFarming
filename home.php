<?php

  // Include 'Composer' autoloader.
  include 'vendor/autoload.php';

  require_once 'pdfDAL.php';
  require_once 'source.php';

  // Parse pdf file and build necessary objects.
  $parser = new \Smalot\PdfParser\Parser();
  $pdf    = $parser->parseFile('https://edepot.wur.nl/533244');

  $text = $pdf->getText();
  //echo $text;

  $pdfDAL = new pdfDAL();
  $sources = $pdfDAL->getSources();
  echo $sources[1]->title;

  echo $pdfDAL->savePDFText($text, 2);

?>

<html>
  <head>

  </head>
  <body>
    <p> hello! </p>
  </body>
</html>
