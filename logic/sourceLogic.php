<?php
  require_once("../model/source.php");
  require_once("../DAL/sourceDAL.php");

  class sourceLogic {
    private $sourceDAL;

    function __construct(){
      $this->sourceDAL = new sourceDAL();
    }

    function SaveSources($sources){
      $sourceDAL = new sourceDAL();
      $dbSources = $sourceDAL->GetSources();

      $sourcesToAdd = [];
      foreach($sources as $s){
        $found = false;
        foreach($dbSources as $sdb){
          if($s->GetTitle() == $sdb->GetTitle() || $s->getLink() == $sdb->GetLink()){
            $found = true;
          }
        }
        if(!$found){
          $sourcesToAdd[] = $s;
        }
      }

      $sourceDAL->saveSources($sourcesToAdd);
    }

  }

?>
