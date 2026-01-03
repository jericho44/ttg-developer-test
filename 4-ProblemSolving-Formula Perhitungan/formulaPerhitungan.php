<?php

$source = [1, 4, 5, 6];

echo "Source : " . implode(', ', $source) . PHP_EOL;

echo "Target 16 : " . findExpression($source, 16) . PHP_EOL;
echo "Target 18 : " . findExpression($source, 18) . PHP_EOL;
echo "Target 50 : " . findExpression($source, 50) . PHP_EOL;
echo "Target 120 : " . findExpression($source, 120) . PHP_EOL;


function findExpression(array $numbers, int $target)
{
    $permutations = permute($numbers);

    foreach ($permutations as $nums) {
        $result = dfsExpression(
            $nums,
            $target,
            1,
            $nums[0],
            (string) $nums[0]
        );

        if ($result !== null) {
            return $result;
        }
    }

    return null;
}


function dfsExpression(array $numbers, int $target, int $index, int $currentValue, string $expression)
{
    if ($index === count($numbers)) {
        return $currentValue === $target ? $expression : null;
    }

    $num = $numbers[$index];

    // Operator +
    $res = dfsExpression(
        $numbers,
        $target,
        $index + 1,
        $currentValue + $num,
        "$expression + $num"
    );
    if ($res !== null) return $res;

    // Operator -
    $res = dfsExpression(
        $numbers,
        $target,
        $index + 1,
        $currentValue - $num,
        "$expression - $num"
    );
    if ($res !== null) return $res;

    // Operator *
    $res = dfsExpression(
        $numbers,
        $target,
        $index + 1,
        $currentValue * $num,
        "($expression * $num)"
    );
    if ($res !== null) return $res;

    return null;
}

function permute(array $items)
{
    if (count($items) <= 1) {
        return [$items];
    }

    $result = [];

    foreach ($items as $key => $item) {
        $remaining = $items;
        unset($remaining[$key]);

        foreach (permute(array_values($remaining)) as $perm) {
            array_unshift($perm, $item);
            $result[] = $perm;
        }
    }

    return $result;
}
