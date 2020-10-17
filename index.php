<?php

// Ex 1

// function bracket($value) : bool
// {
//     $stack = [];

//     for ($i = 0; $i < strlen($value); $i++) {
//         if ($value[$i] == ')' || $value[$i] == '}' || $value[$i] == ']') {
//             $lastElem = array_pop($stack);
//             if ($value[$i] == ')' && $lastElem !== '(' || $value[$i] === '}' && $lastElem !== '{' || $value[$i] == ']' && $lastElem !== '[') 
//                 { return false; }
//         } else {
//                 $stack[] = $value[$i];
//             }
//     }
//     return true;
// }
// $res = bracket('([{}])');  // true


$values = ['((a + b)/ c) - 2', '"([ошибка)"', '"(")', '{[][()]}'];
$result = [];
$test = [')' => '(', ']' => '[', '}' => '{'];

foreach ($values as $value) {
    $stack = new SplStack();
    foreach (str_split($value) as $str) {
        if ($stack->valid() && $stack->top() == '"') {
            if ($str == '"') {
                $stack->pop();
            }
            continue;
        }
        if ($stack == '"') {
            $stack->push($str);
            continue;
        }
        if (in_array($str, $test)) {
            $stack->push($str);
        }
        if (key_exists($str, $test)) {
            if ($test[$str] != $stack->top()) {
                break;
            }
        $stack->pop();
        }
    }
    $result[] = $stack->isEmpty();
}

for ($i = 0; $i < count($values); $i++) {
    echo $values[$i] . '=>' . ($result[$i] ? 'True' : 'False') . '<br>';
}


//  Ex 2

$start = microtime(true);

function maxInt($value)
{
    $i = 2;
    while ($i * $i < $value) {
        while ($value % $i == 0) {
            $value /= $i;
        
        }
        $i++;
    }
    return $value;
}
$end = microtime(true);
$result = maxInt(600851475143); // 6857
echo $result . '<br>';  


// Ex 3

$path = empty($_GET["dir"]) ? 'C:\\' : $_GET["dir"];
$dirs = [];
$files =[];

foreach (new DirectoryIterator($path) as $item) {
    if ($item->isDot()) {
        continue;
    }
    if ($item->isDir()) {
        $dirs[] = $item->getFilename();
    } else {
        $files[] = $item->getFilename();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (dirname($path) != $path) : ?>
        <a href="?">Up<?php dirname($path) ?></a><br>
    <?php endif; ?>
    <?php foreach ($dirs as $dir) : ?>
        <a href="?dir=<?= $path . '/' . $dir ?>"><?= $dir ?></a><br>
    <?php endforeach; ?>
    <?php foreach ($files as $file) : ?>
        <p><?= $file ?></p><br>
    <?php endforeach; ?>
</body>
</html>

