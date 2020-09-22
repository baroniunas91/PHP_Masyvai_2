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