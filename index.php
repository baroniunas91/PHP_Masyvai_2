<?php
echo '1) ----------------------------------------------------------------------------------------------------';
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
echo '2) ----------------------------------------------------------------------------------------------------';
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
echo '3) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 
// iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. 
// Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).
$letters = range('A', 'Z');

$lettersArray = [];
foreach(range(1, 10) as $key => $arrayElement) {
    $rand = rand(2,18);
    foreach(range(1, $rand) as $value) {
        $lettersArray[$key][] = $letters[rand(0,25)];
    }
}
//Rūšiuojam
foreach($lettersArray as $key => $value) {
    sort($lettersArray[$key]);
}
echo 'Išrūšiuojame antro lygio masyvus pagal abėcėlę';
echo '<br>';
echo "<pre>";
print_r($lettersArray);
echo "</pre>";

echo '<br>';
echo '4) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.

for($i=0; $i < count($lettersArray)-1; $i++) {
    for($j=$i+1; $j<count($lettersArray); $j++) {
        if(count($lettersArray[$i]) > count($lettersArray[$j])) {
            $temp = $lettersArray[$i];
            $lettersArray[$i] = $lettersArray[$j];
            $lettersArray[$j] = $temp;
        }
    }
}
echo "<pre>";
print_r($lettersArray);
echo "</pre>";

echo '<br>';
echo '5) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] 
// user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. 
$userArray = [];
foreach(range(0, 29) as $key) {
    $userArray[$key] = ['user_id' => rand(1, 1000000), 'place_in_row' => rand(0, 100)];
}
echo "<pre>";
print_r($userArray);
echo "</pre>";

echo '<br>';
echo '6) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Išrūšiuokite 6 uždavinio masyvą pagal user_id didėjančia tvarka. 
// Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.
echo 'Išrūšiuojame masyva pagal user_id didėjančia tvarka.';
echo '<br>';
//Naudoju spaceship operatorių, nuo PHP 7 veikia.
usort($userArray, function($a, $b) {
    return $a['user_id'] <=> $b['user_id'];
});
echo "<pre>";
print_r($userArray);
echo "</pre>";

echo 'Išrūšiuojame masyva pagal place_in_row mažėjančia tvarka.';
echo '<br>';
usort($userArray, function($a, $b) {
    return $b['place_in_row'] <=> $a['place_in_row'];
});
echo "<pre>";
print_r($userArray);
echo "</pre>";

echo '<br>';
echo '7) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. 
// Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.

foreach($userArray as $key => $value) {
    $name = '';
    $surname = '';
    foreach(range(1, rand(5, 15)) as $letter) {
        $name .= $letters[rand(0,25)];
    }
    foreach(range(1, rand(5, 15)) as $letter) {
        $surname .= $letters[rand(0,25)];
    }
    $arr = ['name' => $name, 'surname' => $surname];
    $userArray[$key] = array_merge($userArray[$key], $arr);
}
echo "<pre>";
print_r($userArray);
echo "</pre>";

echo '<br>';
echo '8) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. 
// Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite 
// atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.

$masyvas = [];
foreach(range(0,9) as $key => $value) {
    $rand = rand(0, 5);
    foreach(range(0, $rand) as $vidinisMasyvas) {
        if(!($rand === 0)) {
            $masyvas[$key][] = rand(0,10);
        } else {
            $masyvas[$key] = rand(0,10);
        }
    }
}

echo "<pre>";
print_r($masyvas);
echo "</pre>";

echo '<br>';
echo '9) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai 
// eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.

foreach($masyvas as $key => $value) {
    if(is_array($value)) {
        $sum = 0;
        foreach($value as $elements) {
            $sum += $elements;
        }
        echo $key . ' masyvas suma ' . $sum;
        echo '<br>';
    } else {
        echo $key . ' skaicius ' . $value;
        echo '<br>';
    }
}

usort($masyvas, function($a, $b) {
    $sum1 = 0;
    $sum2 = 0;
    if(is_array($a)) {
        foreach($a as $element) {
            $sum1 += $element;
        }
    } else {
        $sum1 = $a;
    }
    if(is_array($b)) {
        foreach($b as $el) {
            $sum2 += $el;
        }
    } else {
        $sum2 = $b;
    }
    return $sum1 <=> $sum2;
});

echo "<pre>";
print_r($masyvas);
echo "</pre>";

echo '<br>';
echo '10) ----------------------------------------------------------------------------------------------------';
echo '<br>';