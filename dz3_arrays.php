<?php

include 'dz3_ini.php';

$double_animals=[]; // массив с названиями зверей из двух слов
$mystic_animals=[]; // массив фантастических зверей
$list_used=[];      // список использованых индексов
$list_places=[];    // собранный многомерный массив "место" - "список животных"

// 1. массив из зверей с названиями из двух слов:
print_r("</br></br><h1>Массив названий, состоящх более из двух слов:</h1></br>");
foreach($animals as $key => $val) {
  $double_animals[$key]=[];
  $list_used[$key]=[];
  foreach($val as $sub_key => $sub_val) {
    $new_arr=explode($delimiter,trim($sub_val)); 
    if (count($new_arr) == 2) {
      $double_animals[$key][]=$sub_val;
    }
  }
}
print_r($double_animals);

// перемешиваем слова в Элементах:
print_r("</br></br><h1>3. Массив фантастических зверей:</h1></br>");
foreach($double_animals as $key => $val) {
  $mystic_animals[$key]=[];
  foreach($val as $sub_val) {
    $second_part='';
    do {
      $ran_x=array_rand($double_animals); // первый сучайный именованный ключ
      $ran_y=array_rand($double_animals[$ran_x]); // второй порядковый ключ
      $result=array_search($ran_y, $list_used[$ran_x]); // результат поиска индекса в массиве использованных

      if ($result == false and is_bool($result)) { // если индекс не найден, или элемент не использован
        $list_used[$ran_x][]=$ran_y; // записываем в массив найденный индекс
        $second_part=explode($delimiter,trim($double_animals[$ran_x][$ran_y]))[1]; // запоминаем случайно выбранный уникальный элемент
      };
    } while ($second_part=='');

    $mystic_animals[$key][]=explode($delimiter,trim($sub_val))[0]." ".$second_part; // первое слово текущего элемента
  }
}
print_r($mystic_animals);

// дополнительно:
print_r("</br></br><h1>Дополнительно. Места обитания</h1></br>");
foreach ($animals as $key => $val) {
  print_r("<h2>{$key}:</h2><p>".implode($val,", ")."</p>");
}

?>