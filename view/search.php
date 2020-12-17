<?php


?>

<html>
  <head>
    <link rel = "stylesheet" type="text/css" href="../CSS/search.css"/>
    <link rel = "stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <section id = "content">
      <header> Search database </header>

      <form action="http://localhost/VerticalFarming/view/results.php?" method="get">
        <input type="text" name="searchTerm"> </input>
        <input type="submit" value="search"/>
      </form>
    </section>
  </body>
</html>
