<?php
  class Source{
      public $ID;
      public $link;
      public $title;
      public $author;
      public $release_date;
      public $summary;
      public $type;
      public $category;
      public $text;

  	  function __construct($ID, $link, $title, $author, $summary, $type, $category){
  		  $this->ID = $ID;
        $this->link = $link;
        $this->title = $title;
        $this->author = $author;
        $this->summary = $summary;
        $this->type = $type;
        $this->category = $category;
  	  }

  }
?>
