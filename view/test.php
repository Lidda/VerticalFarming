<?php
  require_once("../logic/WURDATAlogic.php");
  require_once("../DAL/sourceDAL.php");
  $wurdataLogic = new WURDATAlogic();
  $sourceDAL = new sourceDAL();

  $sources = $wurdataLogic->processXML();
  $sourceDAL->saveSources($sources);

?>
