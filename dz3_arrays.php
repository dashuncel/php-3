<?php
$animals = [
"north-america"=>["Safary panthera lotus","Canada ursus maritimus","Canada erignathus barbatus","Canada monodon monoceros","North castor fiber","Arctic caribou","Arctic cingulata","Arctic mustela nigripes"],
"south-america"=>["Brasilia blastocerus dichotomus","Brasilia procyon cancrivorus","Chili vicugna","Safary leopardus pardalis","Chili cyclopes didactylus","Chili Felinae","Chili hydrochaeris","Brasilia Harpia","Brasilia Rhea"],
"africa"=>["South gazella","South macaca sylvanus","South scorpiones","North orycteropus afer","North chamaeleonidae","North colobus","North hippotigris"],
"europe"=>["Aquila chrysaetos","Germany ciconia","Germany meles","Germany ursus arctos","Skandinavien gulo","Skandinavien lynx","Skandinavien mustela lutreola","Russian sus scrofa domesticus","Skandinavien Cervidae","Skandinavien bubo"],
"asia"=>["Russian pusa sibirica","Russian bos mutus","indostan axis","North bos gaurus","Russian Elapidae","indostan Elephantidae","Russian Pongo","indostan Alligator","indostan Lophura ignita","indostan rupicapra"],
"australia"=>["South Dacelo","South Macropus","South Dromaius novaehollandiae","east Menura","North Canis lupus dingo","North Lemur catta","west Wallabia","west Sarcophilus harrisii","west Vombatidae","west Casuarius"],
"antarktida"=>["west Spheniscidae","west Physeter macrocephalus","east Balaenoptera musculus","west Hydrurga","east Leptonychotes","west Lobodon","east Ommatophoca","east Mirounga","west Eubalaena","east Odontoceti","east Delphinidae"] 
];

$double_animals=[]; // 2 массив с двойными названиями
$mystic_animals=[]; // 3 массив фантастических зверей
$delimiter=" "; // разделитель
$new_arr=[]; 
$list_used=[]; // список использованых индексов

print_r("<h1>Исходный массив:</h1></br>");
print_r($animals);

// 1. массив из зверей с названиями из двух слов:
print_r("</br></br><h1>2. Массив названий, состоящх более чем из одного слова:</h1></br>");
foreach($animals as $key => $val) {
  $double_animals[$key]=[];
  $list_used[$key]=[]; // инициализация массива для следующего задания
  foreach($val as $sub_key => $sub_val) {
    $new_arr=explode($delimiter,trim($sub_val)); 
    if (count($new_arr) == 2) {
      $double_animals[$key][]=$sub_val;
    }
    unset($new_arr);
  }
}
print_r($double_animals);

// 2. перемешиваем слова в Элементах':
print_r("</br></br><h1>3. Массив фантастических зверей:</h1></br>");
foreach($animals as $key => $val) {
  $mystic_animals[$key]=[];
  foreach($val as $sub_key => $sub_val) {
  	do {
  	    $ran_x=array_rand($animals); // первый именованный индекс
        $ran_y=array_rand($animals[$ran_x]); // второй индекс
        //print_r($sub_val.array_search($ran_y, $list_used[$ran_x])." ".$ran_y." ".$ran_x."</br>");
        if (! array_search($ran_y, $list_used[$ran_x])) { 
          $list_used[$ran_x][]=$ran_y; // записываем в массив найденный индекс
          $second_part=$animals[$ran_x][$ran_y]; // запоминаем случайно выбранный уникальный элемент
          break; 
        };
    } while(true);
    
    if (count(explode($delimiter,trim($second_part))) > 1) {
      $mystic_animals[$key][]=explode($delimiter,trim($sub_val))[0]." ".explode($delimiter,trim($second_part))[1]; // первое слово текущего элемента
    }
    else { 
      $mystic_animals[$key][]=explode($delimiter,trim($sub_val))[0];
    }
  }
}
print_r($mystic_animals);

// 3. вывод зверей с названием местности
$list_places=[]; // собранный многомерный массив "место" - "список животных"
foreach ($animals as $key => $value) {
  foreach($value as $sub_key => $sub_val) {
    $place=explode($delimiter,$sub_val)[0]; // место проживания
    $list_places[$place][]=trim(str_replace($place,"",$sub_val)); // удаляем место из зверя и пишем это в массив
  }  
}

print_r("</br></br><h1>Дополнительно. Места обитания</h1></br>");
foreach ($list_places as $key => $value) {
  print_r("<h2>{$key}:</h2><p>".implode($value,", ")."</p>");
}

?>