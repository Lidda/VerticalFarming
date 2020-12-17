<?php
require_once 'database.php';
require_once '../model/source.php';

  class sourceDAL {

    private $db;
    private $connection;

    //makes database connection when instantiated
      function __construct(){
        $this->db = Database::getInstance();
        $this->connection = $this->db->getConnection();
      }

      function getSources(){
        $sql = "SELECT `ID`, `link`, `title`, `author`, `release_date`, `abstractNL`, `abstractEN`, `type`, `category`, `text`
                  FROM `sources`";

        $sources = [];
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
                $source = new Source($row["ID"], $row["link"], $row["title"],
                    $row["author"], $row["release_date"], $row["abstractNL"], $row["abstractEN"]);
                $sources[] = $source;
          }
          return $sources;
        }
      }

      function savePDFText($text, $articleID){

        $text = mysqli_real_escape_string($this->connection, $text);

        $sql = "UPDATE sources
              SET `text` = '$text'
              WHERE `ID` = '$articleID'";
        $success = mysqli_query($this->connection, $sql);
        return $success; //returns true if query was executed
      }

      function saveSources($sources){
        foreach($sources as $s){
          $link = mysqli_real_escape_string($this->connection, $s->GetLink());
          $title = mysqli_real_escape_string($this->connection, $s->GetTitle());
          $author = mysqli_real_escape_string($this->connection, $s->GetAuthor());
          $year = mysqli_real_escape_string($this->connection, $s->GetRelease_date());
          $abstractNL = mysqli_real_escape_string($this->connection, $s->GetAbstractNL());
          $abstractEN = mysqli_real_escape_string($this->connection, $s->GetAbstractEN());
          $keywords = mysqli_real_escape_string($this->connection, $s->GetKeywords());

          $sql = "INSERT INTO sources (link, title, author, release_date, abstractNL, abstractEN, keywords)
  					VALUES ('$link', '$title', '$author', '$year', '$abstractNL', '$abstractEN', '$keywords');";
    			mysqli_query($this->connection, $sql);
        }
      }

  }

?>
