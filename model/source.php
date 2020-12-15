<?php
  class Source{
      public $ID;
      public $link;
      public $title;
      public $author;
      public $release_date;
      public $abstract;
      public $text;

  	  function __construct($ID, $link, $title, $author, $year, $abstract){
  		  $this->ID = $ID;
        $this->link = $link;
        $this->title = $title;
        $this->release_date = $year;
        $this->author = $author;
        $this->abstract = $abstract;
  	  }

  }
?>
