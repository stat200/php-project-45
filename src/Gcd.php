<?php

namespace BrainGames\Gcd;

use function BrainGames\Helper\strToIntHelper;

const RULES = 'Find the greatest common divisor of given numbers.';

function getRules()
{
    return RULES;
}

function getQuestion(): string
{
    $number1 = rand(0, 100);
    $number2 = rand(0, 100);
    return "{$number1} {$number2}";
}

function getCorrectAnswer(string $question): string
{
    $numbers = explode(' ', $question);
    $numbers = strToIntHelper($numbers);
    [$number1, $number2] = $numbers;
    if ($number1 === 0 && $number2 === 0) {
        return "0";
    }
    while ($number2 != 0) {
        $temp = $number2;
        $number2 = $number1 % $number2;
        $number1 = $temp;
    }
    return (string) abs($number1);
}
