<?php
  require_once '../DAL/sourceDAL.php';
  require_once '../model/source.php';

  if(isset($_GET["searchTerm"])){
    $searchTerm = $_GET["searchTerm"];

    $sourceDAL = new sourceDAL();
    $sources = [];
    $sources = $sourceDAL->GetSourcesBySearchTerm($searchTerm);

    /*foreach ($sources as $s){
      echo $s->GetTitle() . "</br>";
      echo "<i>". $s->GetAuthor() . "</i></br>";
      echo $s->GetLink() . "</br>";
      echo $s->GetAbstract();
      echo "</br></br>";
    }*/
  }
?>

<html>
  <head>
    <link rel = "stylesheet" type="text/css" href="../CSS/results.css"/>
    <link rel = "stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <section id='content'>
      <?php
      echo '<header><i>'.$searchTerm.'</i> search results:</header>';

      if($sources != null){
        foreach($sources as $s){
          echo '
            <article>
              <title>'.$s->GetTitle().'</title>
              <label><i>'.$s->GetAuthor().'</i></label>
              <label> <a href="'.$s->GetLink().'" target="_blank" rel="noopener noreferrer">'.$s->GetLink().'</a></label>
              <label id="abstractLabel"><b>ABSTRACT</b></label>
              <label>'.$s->GetAbstract().'</label>
            </article>
          ';
        }
      }
    ?>
    </section>
  </body>
</html>
