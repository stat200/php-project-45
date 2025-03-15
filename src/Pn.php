<?php

namespace BrainGames\Pn;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getRules()
{
    return RULES;
}

function getQuestion(): string
{
    return (string) rand(0, 100);
}

function getCorrectAnswer(string $question): string
{
    $answers = [
        'no',
        'yes'
    ];

    return $answers[(int) isPn((int) $question)];
}
function isPn( int $number): bool
{
    if ( $number <= 1) {
        return false;
    }

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
