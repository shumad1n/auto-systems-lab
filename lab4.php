<?php

$count = 10;
$array[$count];

echo "Масив: ";
for ($i = 0; $i < $count; $i++) {
    $array[] = rand(1,10);
    echo "$array[$i] ";
}

function findSum(array $array, int $arr_size): int
{
    $sum = 0;
    for ($i = 0; $i < $arr_size; $i++) {
        if ($array[$i]%5 == 0) {
            $sum += $array[$i];
            $count++;
        }
    }

    // echo "\nСума елементів, кратних п'яти: $sum\n";
    echo "\n\nКількість елементів, кратних п'яти: ";
    return $count;
}

$res = findSum($array, $count);
echo $res;

?>