<?php
echo '1) -------------------------------------------';
echo '<br>';
// Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.
$arr = [];
foreach(range(0,9) as $value) {
    $innerArr = [];
    foreach(range(0,4) as $value) {
        $innerArr[] = rand(5, 25);
    }
    $arr[] = $innerArr;
}
echo "<pre>";
print_r($arr);
echo "</pre>";

echo '<br>';
echo '2) -------------------------------------------';
echo '<br>';
// Naudodamiesi 1 uždavinio masyvu:
// Suskaičiuokite kiek masyve yra elementų didesnių už 10;
// Raskite didžiausio elemento reikšmę;
// Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)
// Visus masyvus “pailginkite” iki 7 elementų
// Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai 
$count = 0;
$max = 0;
foreach($arr as $value) {
    foreach($value as $int) {
        if($int > 10) {
            $count++;
        }
        if($int > $max) {
            $max = $int;
        }
    }
}
echo "Masyve yra $count elementų(-ai) didesnių už 10";
echo '<br>';
echo "Masyve didžiausias elementas yra $max";
echo '<br>';
echo '<br>';
echo 'Suskaičiuojam kiekvieno antro lygio masyvų su vienodais indeksais sumas';
$sumArr = [0, 0, 0, 0, 0];

foreach($arr as $key => $value) {
    foreach($value as $innerKey => $innerValue) {
        $sumArr[$innerKey] += $innerValue;
    }
}

echo "<pre>";
print_r($sumArr);
echo "</pre>";
echo '<br>';
echo 'Visus masyvus prailginame iki 7 elementų';
echo '<br>';
foreach($arr as $key => $value) {
    foreach(range(1,2) as $int) {
        $arr[$key][] = rand(5, 25);
    }
}

echo "<pre>";
print_r($arr);
echo "</pre>";

echo '<br>';
echo 'Suskaičiuojame kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudojame kaip reikšmes sukuriant naują masyvą';
echo '<br>';

$newArray = [];
foreach($arr as $value) {
    $newArray[] = array_sum($value);
}
echo "<pre>";
print_r($newArray);
echo "</pre>";

echo '<br>';
echo '3) -------------------------------------------';
echo '<br>';