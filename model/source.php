<?php
  class Source{
      private $ID;
      private $link;
      private $title;
      private $author;
      private $release_date;
      private $abstractNL;
      private $abstractEN;
      private $text;
      private $keywords;

  	  function __construct($link, $title, $author, $year, $abstractNL, $abstractEN, $keywords){
        $this->link = $link;
        $this->title = $title;
        $this->release_date = $year;
        $this->author = $author;
        $this->abstractNL = $abstractNL;
        $this->abstractEN = $abstractEN;
        $this->keywords = $keywords;
  	  }

      public function GetID(){
    		return $this->ID;
    	}
    	public function SetID($ID){
    		$this->ID = $ID;
    	}

    	public function GetLink(){
    		return $this->link;
    	}
    	public function SetLink($link){
    		$this->link = $link;
    	}

    	public function GetTitle(){
    		return $this->title;
    	}
    	public function SetTitle($title){
    		$this->title = $title;
    	}

    	public function GetAuthor(){
    		return $this->author;
    	}
    	public function SetAuthor($author){
    		$this->author = $author;
    	}

    	public function GetRelease_date(){
    		return $this->release_date;
    	}
    	public function SetRelease_date($release_date){
    		$this->release_date = $release_date;
    	}

    	public function GetAbstractNL(){
    		return $this->abstractNL;
    	}
    	public function SetAbstractNL($abstractNL){
    		$this->abstractNL = $abstractNL;
    	}

    	public function GetAbstractEN(){
    		return $this->abstractEN;
    	}
    	public function SetAbstractEN($abstractEN){
    		$this->abstractEN = $abstractEN;
    	}

    	public function GetText(){
    		return $this->text;
    	}
    	public function SetText($text){
    		$this->text = $text;
    	}

      public function GetKeywords(){
    		return $this->keywords;
    	}
    	public function SetKeywords($keywords){
    		$this->text = $keywords;
    	}

  }
?>
