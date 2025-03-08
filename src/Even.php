<?php
namespace BrainGames\Even;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function getRules()
{
    return RULES;
}

function isAnswerCorrect(string $answer, string $correctAnswer): bool
{
    return $correctAnswer === $answer;
}

function getCorrectMessage():string
{
    return 'Correct!';
}

function getFinishMessage(string $answer, string $name, string $correctAnswer): string
{
    return "{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.\nLet's try again, {$name}!";
}

function getQuestion()
{
    return rand(1, 100);
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
    return $number % 2 === 0;
}
