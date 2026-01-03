<?php

// Contoh 1
$input = [3, 0, 2, 4];
echo "Input 1 : " . implode(', ', $input) . PHP_EOL;
echo "Output  : " . implode(', ', findMissingNumber($input)) . PHP_EOL;

echo PHP_EOL;

// Contoh 2
$input2 = [3106, 3102, 3104, 3105, 3107];
echo "Input 2 : " . implode(', ', $input2) . PHP_EOL;
echo "Output  : " . implode(', ', findMissingNumber($input2)) . PHP_EOL;

echo PHP_EOL;

// Contoh 3
$input3 = [1001, 1002, 1003, 1005, 1007];
echo "Input 2 : " . implode(', ', $input3) . PHP_EOL;
echo "Output  : " . implode(', ', findMissingNumber($input3)) . PHP_EOL;


function findMissingNumber(array $numbers)
{
    sort($numbers);

    $missing = [];
    $start = $numbers[0];
    $end   = end($numbers);

    $set = array_flip($numbers);

    for ($i = $start; $i <= $end; $i++) {
        if (!isset($set[$i])) {
            $missing[] = $i;
        }
    }

    return $missing;
}
