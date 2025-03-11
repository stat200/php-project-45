<?php
namespace BrainGames\Even;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function getRules()
{
    return RULES;
}

function getQuestion(): string
{
    return (string) rand(1, 100);
}

function getCorrectAnswer(string $question): string
{
    $answers = [
        'no',
        'yes'
    ];

    return $answers[(int) isEven((int) $question)];
}

function isEven(int $number): bool
{
    return !($number & 1);
}
