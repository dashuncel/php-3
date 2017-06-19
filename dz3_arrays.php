<?php
$animals = [
"north-america"=>["Panthera","Ursus maritimus","Erignathus barbatus","Monodon monoceros","Castor fiber","Caribou"," Cingulata","Mustela nigripes"],
"south-america"=>["Blastocerus dichotomus","Procyon cancrivorus","Vicugna","Leopardus pardalis","Cyclopes didactylus","Felinae","hydrochaeris","Harpia","Rhea"],
"africa"=>["gazella","Macaca sylvanus","Scorpiones","Orycteropus afer","Chamaeleonidae","Colobus","Hippotigris"],
"europe"=>["Aquila chrysaetos","ciconia","meles","Ursus arctos","gulo","lynx","mustela lutreola","Sus scrofa domesticus","Cervidae","bubo"],
"asia"=>["Pusa sibirica","Bos mutus","axis","Bos gaurus","Elapidae","Elephantidae","Pongo","Alligator","Lophura ignita","rupicapra"],
"australia"=>["Dacelo","Macropus","Dromaius novaehollandiae","Menura","Canis lupus dingo","Lemur catta","Wallabia","Sarcophilus harrisii","Vombatidae","Casuarius"],
"antarktida"=>["Spheniscidae","Physeter macrocephalus","Balaenoptera musculus","Hydrurga","Leptonychotes","Lobodon","Ommatophoca","Mirounga","Eubalaena","Odontoceti","Delphinidae"] 
];

$animals_withreg = [
"north-america"=>["Safary panthera","Canada ursus maritimus","Canada erignathus barbatus","Canada monodon monoceros","North castor fiber","Arctic caribou","Arctic cingulata","Arctic mustela nigripes"],
"south-america"=>["Brasilia blastocerus dichotomus","Brasilia procyon cancrivorus","Chili vicugna","Safary leopardus pardalis","Chili cyclopes didactylus","Chili Felinae","Chili hydrochaeris","Brasilia Harpia","Brasilia Rhea"],
"africa"=>["South gazella","South macaca sylvanus","South scorpiones","North orycteropus afer","North chamaeleonidae","North colobus","North hippotigris"],
];

$double_animals=[]; // 2 массив
$mystic_animals=[]; // 3 массив
$delimiter=" "; // разделитель
$new_arr=[]; 

print_r("<h1>Исходный массив:</h1></br>");
print_r($animals);

// 1. массив из зверей с названиями из двух слов:
print_r("</br></br><h1>2. Массив названий, состоящх более чем из одного слова:</h1></br>");
foreach($animals as $key => $val) {
  $double_animals[$key]=[];
  foreach($val as $sub_key => $sub_val) {
    $pos = strpos(trim($sub_val), " ");
    if ($pos > 0) {
      $double_animals[$key][]=$sub_val;
    }
  }
}
print_r($double_animals);

// 2. перемешиваем слова/части слов в названиях:

print_r("</br></br><h1>3. Массив фантастических зверей:</h1></br>");
foreach($animals as $key => $val) {
  $mystic_animals[$key]=[];
  foreach($val as $sub_key => $sub_val) {
    $pos = strpos($sub_val,$delimiter);
    if ($pos > 0) {
      $new_arr=explode($delimiter,lcfirst($sub_val),3); // разбиваем строку по разделителю 
      krsort($new_arr); // обратная сортировка слов по ключам
      $mystic_animals[$key][]=implode($new_arr, $delimiter); // склеиваем в массив через разделитель
    }
    else {
      $new_arr=str_split(lcfirst($sub_val)); // разбиваем строку посимвольно
      krsort($new_arr); // обратная сортировка символов по ключам
      $mystic_animals[$key][]=implode($new_arr); // склеиваем в массив без разделителя
    }
  }
}
print_r($mystic_animals);

// 3. вывод зверей с названием местности
$list_places=[]; // собранный многомерный массив "место" - "список животных"

foreach ($animals_withreg as $key => $value) {
  foreach($value as $sub_key => $sub_val) {
    $place=explode($delimiter,$sub_val)[0]; // место проживания
    $list_places[$place][]=trim(str_replace($place,"",$sub_val)); // удаляем место из зверя и пишем это в массив
  }  
}

print_r("</br></br><h1>"."Дополнительно. Места обитания."."</h1></br>");
foreach ($list_places as $key => $value) {
  print_r("<h2>{$key}:</h2><p>");
  foreach($value as $sub_key => $sub_val) {
    print_r($sub_val);		
    if ($sub_key < count($value)) {
      print_r(", ");
    } 
  }
  print_r("</p>");
}
?>