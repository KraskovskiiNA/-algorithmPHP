<?php

// Ex 1

function bracket($value) : bool
{
    $stack = [];

    for ($i = 0; $i < strlen($value); $i++) {
        
        if ($value[$i] == ')' || $value[$i] == '}' || $value[$i] == ']') {
            $lastElem = array_pop($stack);
            if ($value[$i] == ')' && $lastElem !== '(' || $value[$i] === '}' && $lastElem !== '{' || $value[$i] == ']' && $lastElem !== '[') 
                { return false; }
        } else {
                $stack[] = $value[$i];
            }
    }
    return true;
}

$res = bracket('([{}])');  // true
$res1 = bracket('([)');  // false

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
echo  $start - $end;

// Ex 3

// $dir = new DirectoryIterator('/');

// foreach ($dir as $items) {
//     echo $items . '<br>';
// }

