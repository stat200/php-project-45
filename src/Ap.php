<?php
namespace BrainGames\Ap;

const RULES = 'What number is missing in the progression?';
const APLENGTH = 10;
const TEMPLATE = '..';

function getRules()
{
    return RULES;
}

function getQuestion(): string
{
    $apStart = rand(0, 100);
    $apStep = rand(1, 10);
    $apLength = rand(5, 10) - 1;
    $ap = range($apStart, $apStart + $apStep * $apLength, $apStep);
    $key = array_rand($ap);
    $ap[$key] = TEMPLATE;
    return implode(' ', $ap);
}

function getCorrectAnswer(string $question): string
{
    $ap = explode(' ', $question);
    $apFiltered = array_filter($ap, fn($item) => $item !== '..');
    sort($apFiltered);
    $apFilteredLength = count($apFiltered);
    $step = $apFiltered[1] - $apFiltered[0];
    $diff = $apFiltered[2] - $apFiltered[1];

    if ($step > $diff) {
        return (string) $apFiltered[1] - $step / 2;
    }
    if ($diff > $step) {
        return (string) ($apFiltered[1] + $step);
    }

    for ($i = 2; $i < $apFilteredLength - 1; $i++) {
        $diff = $apFiltered[$i + 1] - $apFiltered[$i];

        if ($step === $diff) {
            continue;
        };

        return (string) ($apFiltered[$i] + $step);
    }

    $strPos = strpos($question, TEMPLATE);
    if ($strPos === 0) {
        return (string) $apFiltered[0] - $step;
    }

    return (string) ($apFiltered[$apFilteredLength - 1] + $step);
}

