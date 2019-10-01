<?php 

$file = fopen("resultados.csv" , "r");

while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);