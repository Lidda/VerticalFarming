<?php
  class WURcURL {
    function getXML($link){
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $link);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $output = curl_exec($ch);

      if($output === FALSE){
        echo "cURL error: " . curl_error($ch);
      }

      curl_close($ch);

      //convert output to xml
      $xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
      return $xml;
    }
  }

?>
