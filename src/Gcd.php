<?php
namespace BrainGames\Gcd;

const RULES = 'Find the greatest common divisor of given numbers.';

function getRules()
{
    return RULES;
}

function isAnswerCorrect(string $answer, string $correctAnswer): bool
{
    return $correctAnswer === $answer;
}

function getFinishMessage(string $answer, string $name, string $correctAnswer): string
{
    return "{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.\nLet's try again, {$name}!";
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
    return gmp_strval(gmp_gcd($number1, $number2));
}

