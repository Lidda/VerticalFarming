<?php
  require_once("../model/source.php");

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://library.wur.nl/WebQuery/biokennis?q=vertical+farming');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $output = curl_exec($ch);

  if($output === FALSE){
    echo "cURL error: " . curl_error($ch);
  }

  curl_close($ch);
  //print_r($output);

  //convert XML output to array
  $xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($xml);
  $array = json_decode($json,TRUE);

  //print_r($array);
  //TODO: foreach loop to get all elements and convert them to objects

  $sourceArray = $array['bron'];
  $s = $sourceArray[0];

  $title = ($s['titel']);
  $author = ($s['auteur']);
  $year = ($s['jaar']);
  $link = ($s['link']['@attributes']['href']);

  $abstractEN;
  $abstractNL;
  if (isset($s['abstract']['engels'])){
    $abstractEN = ($s['abstract']['engels']);
  } else if (isset($s['abstract']['nederlands'])){
    $abstractNL = ($s['abstract']['nederlands']);
  }

  $keytermsEN;
  $keytermsNL;
  if (isset($s['trefwoorden']['engels'])){
    $keytermsEN= ($s['trefwoorden']['engels']);
  } else if (isset($s['trefwoorden']['nederlands'])){
    $keytermsNL= ($s['trefwoorden']['nederlands']);
  }

  $source1 = new Source(1, $link, $title, $author, $year, $abstractEN, "");

  print_r($source1);
?>
