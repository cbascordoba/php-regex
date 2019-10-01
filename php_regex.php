<?php 

$file = fopen("resultados.csv" , "r");

$match =0;
$nomatch = 0;
while(!feof($file)){
  $line = fgets($file);

  // Encontrar todos los juegos de enero de 2018
  if(preg_match(
    '/^2018\-01\-(\d\d),.*$/',
    $line,
    $m
  )){
    $match++;
    print_r($m);
  
  }else{
    $nomatch++;
  }
}
fclose($file);

//estadistica final que me permite saber cuantos match hay 
printf("\n\nmatch: %d\n no match: %d\n",$match,$nomatch);