<?php
  require_once("../model/source.php");
  require_once("../DAL/WURcURL.php");

  class WURDATAlogic {
    private $wurcurl;
    private $xml;

    function __construct(){
      $this->wurcurl = new WURcURL();
      $this->xml = $this->wurcurl->getXML("https://library.wur.nl/WebQuery/biokennis?q=vertical+farming");
    }

    function processXML(){
      $sources = [];
      $pageLeft = true;

      //loop to go through multiple pages of search results
      while($pageLeft){
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

        //check if there is a next page
        if(!isset($this->xml->next['href'])){
          $pageLeft = false;
        } else {
          //set xml to that of the next page
          $nextPageLink = (string)($this->xml->next['href']);
          $this->xml = $this->wurcurl->getXML($nextPageLink);
        }
      }

      return $sources;
    }
  }
?>
