<?php
  require_once("../logic/WURDATAlogic.php");
  require_once("../logic/sourceLogic.php");
  require_once("../DAL/sourceDAL.php");
  $wurdataLogic = new WURDATAlogic();
  $sourceDAL = new sourceDAL();
  $sourceLogic = new sourceLogic();

  $sources = $wurdataLogic->processXML();
  $sourceLogic->saveSources($sources);

?>
