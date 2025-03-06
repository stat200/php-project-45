<?php

namespace BrainGames\Game;

use function BrainGames\Cli\line;
use function BrainGames\Cli\prompt;

const STARTMESSAGE = "Welcome to the Brain Games!\nMay I have your name?";

function greeting($rule): string
{
    $name = prompt(STARTMESSAGE);
    $greeting = "Hello, {$name}!";
    line($greeting);

    return $name;
}

function getGame($game): string
{
    return "\\BrainGames\\{$game}";
}

function playGame($gameName)
{
    $game = getGame($gameName);
    game($game);
}

function game($game)
{

}
