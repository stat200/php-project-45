<?php
namespace BrainGames\Cli;

use cli;

function line(string $message, ...$messages): null
{
    return cli\line($message, ...$messages);
}

function prompt(string $question): string
{
    return cli\prompt($question);
}

