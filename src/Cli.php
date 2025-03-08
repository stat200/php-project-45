<?php
namespace BrainGames\Cli;

use cli;

function line(string $message): null
{
    return cli\line($message);
}

function prompt(string $question): string
{
    return cli\prompt($question);
}
