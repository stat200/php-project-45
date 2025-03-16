<?php

namespace BrainGames\Helper;

function strToIntHelper(array $members): array
{
    array_walk($members, fn($member) => (int) $member);
    return $members;
}
