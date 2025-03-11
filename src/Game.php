<?php

namespace BrainGames\Game;

use function BrainGames\Cli\line;
use function BrainGames\Cli\prompt;

const STARTMESSAGE = "Welcome to the Brain Games!\nMay I have your name?";
const ATTEMPTS = 3;

function isAnswerCorrect(string $answer, string $correctAnswer): bool
{
    return $correctAnswer === $answer;
}

function getFinishMessage(string $answer, string $name, string $correctAnswer): string
{
    return "{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.\nLet's try again, {$name}!";
}

function getName(): string
{
    return prompt(STARTMESSAGE);
}

function getAnswer(): string
{
    return prompt('Your answer: ');
}

function getGame($game): string
{
    return "BrainGames\\{$game}";
}

function playGame($gameName): void
{
    $game = getGame($gameName);
    game($game);
}

function getCorrectMessage($counter, $name):string
{
    if ($counter === ATTEMPTS-1) {
        return "Congratulations, {$name}!";
    }
    return 'Correct!';
}

function game($game)
{
    $name = getName();
    line("Hello, {$name}!");
    line(call_user_func("{$game}\\getRules"));
    for ($i = 0; $i < ATTEMPTS; $i++) {
        $question = call_user_func("{$game}\\getQuestion");
        line("Question: {$question}");
        $answer = getAnswer();
        $correctAnswer = call_user_func("{$game}\\getCorrectAnswer", $question);
        if (isAnswerCorrect($answer, $correctAnswer)) {
            line(getFinishMessage($answer, $name, $correctAnswer));
            break;
        }
        line(getCorrectMessage($i, $name));
    }
}
