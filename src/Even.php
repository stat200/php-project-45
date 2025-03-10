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

function getFinishMessage(string $answer, string $name, string $correctAnswer): string
{
    return "{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.\nLet's try again, {$name}!";
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
