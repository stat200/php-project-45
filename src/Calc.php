<?php

namespace BrainGames\Calc;

use function BrainGames\Helper\strToIntHelper;

const RULES = 'What is the result of the expression?';
const OPERATIONS = [
    '+',
    '-',
    '*'
];

function getRules()
{
    return RULES;
}

function getQuestion(): string
{
    $number1 = rand(0, 100);
    $number2 = rand(0, 100);
    $key = array_rand(OPERATIONS);
    return "{$number1} " . OPERATIONS[$key] . " {$number2}";
}

/**
 * @throws \Exception
 */
function getCorrectAnswer(string $question): string
{
    $expression = explode(' ', $question);
    $operation = array_values(array_intersect($expression, OPERATIONS))[0];

    $members = array_values(array_filter($expression, fn($item) => $item !== $operation));
    $members = strToIntHelper($members);

    switch ($operation) {
        case '+':
            return (string) array_sum($members);

        case '*':
            return (string) array_product($members);

        case '-':
            if ("{$members[0]} {$operation} {$members[1]}" === $question) {
                return (string) ($members[0] - $members[1]);
            }

            if ("{$members[1]} {$operation} {$members[0]}" === $question) {
                return (string) ($members[1] - $members[0]);
            }
        //no break

        default:
            throw new \Exception('Expressions aren\'t identical');
    }
}
