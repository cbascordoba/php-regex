<?php 

$file = fopen("resultados.csv" , "r");

$match =0;
$nomatch = 0;
while(!feof($file)){
  $line = fgets($file);

  // Encontrar todo los resultados en la historia 
  // 2018-01-30,Jamaica,Korea Republic,2,2,Friendly,Antalya,Turkey,TRUE
  // local, visitante, marcador local, marcador visitante

  if(preg_match(
    '/^(\d{4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i',
    $line,
    $m
  )){
    if($m[4]==$m[5]){
      echo "Empate:";
    }else if($m[4]>$m[5]){
      echo "Ganó Local:";
    }
    else{
      echo "Ganó Visitante: ";
    }
    $match++;
    printf("\t%s vs %s [%d-%d]\n", $m[2],$m[3],$m[4], $m[5]);
  
  }else{
    $nomatch++;
  }
}
fclose($file);

//estadistica final que me permite saber cuantos match hay 
printf("\n\nmatch: %d\n no match: %d\n",$match,$nomatch);