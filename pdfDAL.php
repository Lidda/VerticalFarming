<?php
require_once 'database.php';
require_once 'source.php';

  class pdfDAL {

    private $db;
    private $connection;

    //makes database connection when instantiated
      function __construct(){
        $this->db = Database::getInstance();
        $this->connection = $this->db->getConnection();
      }

      function getSources(){
        $sql = "SELECT `ID`, `link`, `title`, `author`, `release_date`, `summary`, `type`, `category`, `text`
                  FROM `sources`";

        $sources = [];
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
                $source = new Source($row["ID"], $row["link"], $row["title"],
                    $row["author"], $row["summary"], $row["type"], $row["category"]);
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
  }

?>
