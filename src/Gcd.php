<?php

namespace BrainGames\Gcd;

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
    [$number1, $number2] = explode(' ', $question);
    if ((int) $number1 === 0 && (int) $number2 === 0) {
        return "0";
    }
    while ($number2 != 0) {
        $temp = $number2;
        $number2 = $number1 % $number2;
        $number1 = $temp;
    }
    return (string) abs($number1);
}
