<?php
namespace BrainGames\Even;

use function BrainGames\makeLine;
use function BrainGames\makePrompt;

function isEven($number): bool
{
    return $number % 2 === 0;
}

function greeting(): string
{
    makeLine('Welcome to the Brain Games!');
    $name = makePrompt('May I have your name?');
    makeLine("Hello, %s!", $name);
    return $name;
}

function Finish($name)
{
    makeLine("Congratulations, %s!", $name);
}

function getCorrectAnswer($number): string
{
    $correctAnswers = [
        'no',
        'yes'
    ];

    return $correctAnswers[(int) isEven($number)];
}
function startGame(): string
{
    $name = greeting();
    makeLine('Answer "yes" if the number is even, otherwise answer "no".');
    return $name;
}
function game()
{
    $name = startGame();
    for ($i = 0; $i < ANSWERS; $i++) {
        $randNumber = rand(1, 100);
        $correctAnswer = getCorrectAnswer($randNumber);
        makeLine('Question: %s', (string) $randNumber);
        $answer = makePrompt('Your answer');
        if ($correctAnswer === $answer) {
            makeLine('Correct!');
            if ($i === ANSWERS -1) {
                Finish($name);
            }
        } else {
            makeLine('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $correctAnswer);
            break;
        }
    }
}
