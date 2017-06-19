<?php

include 'dz3_ini.php';

$double_animals=[]; // 2 массив с двойными названиями

// 1. массив из зверей с названиями из двух слов:
print_r("</br></br><h1>Массив названий, состоящх более из двух слов:</h1></br>");
foreach($animals as $key => $val) {
  $double_animals[$key]=[];
  foreach($val as $sub_key => $sub_val) {
    $new_arr=explode($delimiter,trim($sub_val)); 
    if (count($new_arr) == 2) {
      $double_animals[$key][]=$sub_val;
    }
  }
}
print_r($double_animals);

?>