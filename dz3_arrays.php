<?php

include 'dz3_ini.php';

$double_animals=[]; // массив с названиями зверей из двух слов
$first_parts=[];    // первые части
$second_parts=[];   // вторые части

// 1. массив из зверей с названиями из двух слов:
print_r("</br></br><h1>Массив названий, состоящх более из двух слов:</h1></br><pre>");
foreach($animals as $key => $val) {
  $double_animals[$key]=[];
  foreach($val as $sub_key => $sub_val) {
    $new_arr=explode($delimiter,$sub_val); 
    if (count($new_arr) == 2) {
      $double_animals[$key][]=$sub_val;
      $second_parts[]=$new_arr[1];
      $first_parts[]=$new_arr[0];
    }
  }
}
print_r($double_animals);

shuffle($second_parts);
shuffle($first_parts);
print_r("</pre></br></br><h1>3. Фантастические звери:</h1></br><pre>");
foreach ($first_parts as $key => $val) {
  $first_parts[$key]=$val." ".$second_parts[$key];
}
print_r($first_parts);

// дополнительно:
print_r("</pre></br></br><h1>Дополнительно. Места обитания</h1></br>");
foreach ($animals as $key => $val) {
  print_r("<h2>{$key}:</h2><p>".implode($val,", ")."</p>");
}

?>