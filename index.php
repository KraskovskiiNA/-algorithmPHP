<?php

// Ex 1

// - Поиск элемента массива с известным индексом  - O(logn)
// - Дублирование одномерного массива через foreach - O(n)
// - Рекурсивная функция нахождения факториала числа - O(n!)
// - Удаление элемента массива с известным индексом - O(1)

// Ex 2

$n = 10000;
$array[]= [];

for ($i = 0; $i < $n; $i++) {
  for ($j = 1; $j < $n; $j *= 2) {
    $array[$i][$j]= true;
    } 
}
// Итераций - 40000, сложность O(n^2);

///////////////////////////

$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) {
  for ($j = $i; $j < $n; $j++) {
    $array[$i][$j] = true;
    } 
}

// Итераций - 30000, сложность O(n^2);

/////////////////////////

$n = 10000;
$array[] = [];
foo($n);

function foo($n)
{
    $n = 10;
    while ($n > 0) {
        for ($j = sqrt($n); $j < $n; $j++) {
            $n--;
            foo($n);
        }
    }
}

// Итераций > 1 000 000 000, сложность O(2^n);

// Ex 3


$w = 5;
$h = 4;

$arr = range(1, $h * $w);
$arr2 = array_chunk($arr, $w);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php foreach ($arr2 as $num): ?>
        <tr>
            <?php foreach ($num as $item): ?>
            <td>
                <?php echo $item ?>
            </td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>





