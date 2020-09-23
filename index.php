<?php
echo '1) ----------------------------------------------------------------------------------------------------';
echo '<br>';
echo 'Sugeneruotas masyvas iš 10 elementų, kurio elementai yra masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25';
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
echo 'Išrūšiuojame trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje';
echo '<br>';
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
echo 'Sukurtas masyvas iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100.';
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
echo 'Prie 6 uždavinio masyvo antro lygio masyvų pridedame dar du elementus: name ir surname.';
echo '<br>';
echo 'Elementai užpildyti stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15';
echo '<br>';
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
echo 'Sukurtas masyvas iš 10 elementų. Masyvo reikšmės užpildytos pagal taisyklę: generuokite skaičių nuo 0 iki 5.';
echo '<br>';
echo 'Ir sukuriame tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekuriame. Antro lygio masyvo reikšmes užpildome';
echo '<br>';
echo 'atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėme reikšmę nuo 0 iki 10 įrašome tiesiogiai.';
echo '<br>';
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
echo 'Paskaičiuojame 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuojame masyvą taip, kad pirmiausiai';
echo '<br>';
echo 'eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.';
echo '<br>';
echo '<br>';
foreach($masyvas as $key => $value) {
    if(is_array($value)) {
        $sum = 0;
        foreach($value as $elements) {
            $sum += $elements;
        }
        // echo $key . ' masyvas suma ' . $sum;
        // echo '<br>';
    } else {
        // echo $key . ' skaicius ' . $value;
        // echo '<br>';
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
// Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su 
// dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: 
// #%+*@%, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite 
// “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.
$colorsArray = [];
foreach(range(0, 9) as $key => $values) {
    foreach(range(0, 9) as $value) {
        // Generuoju value
        $value = '#%+*@%';
        $value = str_split($value);
        $rand = rand(0, 5);
        // Generuoju spalvos koda
        $generateColorArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
        $color = '#';
        foreach(range(0, 5) as $randomSymbol) {
            $color .= $generateColorArray[rand(0, 15)];
        }
        $colorsArray[$key][] = ['value' => $value[$rand], 'color' => $color];
    }
}

// echo "<pre>";
// print_r($colorsArray);
// echo "</pre>";
echo 'Sugeneruotas iš masyvo kilimas:';
echo '<br>';
foreach($colorsArray as $value) {
    foreach($value as $innerValue) {
        $color = $innerValue['color'];
        echo "<div style=\"display: inline-block; width: 30px; height: 30px; background-color: $color\"></div>";
    }
    echo '<br>';
}

echo '<br>';
echo '11) ----------------------------------------------------------------------------------------------------';
echo '<br>';

// Duotas kodas, generuojantis masyvą:
// do {
//     $a = rand(0, 1000);
//     $b = rand(0, 1000);
// } while ($a == $b);
// $long = rand(10,30);
// $sk1 = $sk2 = 0;
// echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
// $c = [];
// for ($i=0; $i<$long; $i++) {
//     $c[] = array_rand(array_flip([$a, $b]));
// }
// echo '<h4>Masyvas:</h4>';
// echo '<pre>';
// print_r($c);
// echo '</pre>';
// Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
// NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
// NEGALIMA! naudoti jokių regex ir string funkcijų.
// GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

// Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.

// Atsakymą reikia pateikti formatu:
// echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';

// Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.

