<?php

include 'dz3_ini.php';

$mystic_animals=[]; // массив фантастических зверей
$list_used=[];      // список использованых индексов
$list_places=[];    // собранный многомерный массив "место" - "список животных"

// строим массив зверей с названием местности
foreach ($animals as $key => $value) {
  foreach($value as $sub_key => $sub_val) {
    $place=explode($delimiter,$sub_val)[0]; // место проживания
    $list_places[$place][]=trim(str_replace($place,"",$sub_val)); // удаляем место из зверя и пишем это в массив
  }  
}

// вывод мест обитания:
print_r("</br></br><h1>Дополнительно. Места обитания</h1></br>");
foreach ($list_places as $key => $value) {
  $list_used[$key]=[]; // инициализация массива использованных многомерных индексов
  print_r("<h2>{$key}:</h2><p>".implode($value,", ")."</p>");
}

// перемешиваем слова в Элементах:
print_r("</br></br><h1>3. Массив фантастических зверей:</h1></br>");
foreach($animals as $key => $val) {
  $mystic_animals[$key]=[];
  foreach($val as $sub_val) {
    $second_part='';
    do {
      $ran_x=array_rand($list_places); // первый сучайный именованный ключ
      $ran_y=array_rand($list_places[$ran_x]); // второй порядковый ключ
      $result=array_search($ran_y, $list_used[$ran_x]); // результат поиска индекса в массиве использованных

      if ($result == false and is_bool($result)) { // если индекс не найден, или элемент не использован
        $list_used[$ran_x][]=$ran_y; // записываем в массив найденный индекс
        $second_part=$list_places[$ran_x][$ran_y]; // запоминаем случайно выбранный уникальный элемент
        //echo($sub_val."-".$second_part."</br>");
      };
    } while ($second_part=='');

    $mystic_animals[$key][]=explode($delimiter,trim($sub_val))[0]." ".$second_part; // первое слово текущего элемента
  }
}
print_r($mystic_animals);

?>

 