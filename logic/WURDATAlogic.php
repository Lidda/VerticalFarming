<?php
  require_once("../model/source.php");
  require_once("../DAL/WURcURL.php");

  class WURDATAlogic {
    private $wurcurl;
    private $xml;

    function __construct(){
      $this->wurcurl = new WURcURL();
      $this->xml = $this->wurcurl->getXML();
    }

    function processXML(){
      $sources = [];
      foreach($this->xml->bron as $s){
        $title = "";
        $author = "";
        $year = "";
        $link = "";
        $abstractEN = "";
        $abstractNL = "";
        $keytermsEN = "";
        $keytermsNL = "";

        if (isset($s->titel)){
          $title = ((string)$s->titel);
        }
        if (isset($s->auteur)){
          $author = ((string)$s->auteur);
        }
        if (isset($s->jaar)){
          $year = ((string)$s->jaar);
        }
        if (isset($s->link['href'])){
          $link = ((string)$s->link['href']);
        }

        if (isset($s->abstract->engels)){
          $abstractEN = ((string)$s->abstract->engels);
        }
        if (isset($s->abstract->nederlands)){
          $abstractNL = ((string)$s->abstract->nederlands);
        }

        if (isset($s->trefwoorden->engels)){
          $keytermsEN= ((string)$s->trefwoorden->engels);
        }
        if (isset($s->trefwoorden->nederlands)){
          $keytermsNL= ((string)$s->trefwoorden->nederlands);
        }

        $keywords = $keytermsEN."- ".$keytermsNL;
        $source = new Source($link, $title, $author, $year, $abstractNL, $abstractEN, $keywords);
        $sources[] = $source;
      }

      //print_r($sources);
      return $sources;
    }
  }
?>
