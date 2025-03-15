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
    $gcd = function ($a, $b) use (&$gcd){
        return $b ? $gcd($b, $a % $b) : $a;
    };

    $numbers = explode(' ', $question);
    return array_reduce($numbers, $gcd);
}
