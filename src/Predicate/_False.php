<?php


namespace Maxonfjvipon\Elegant_Elephant\Predicate;

use ElegantBro\Interfaces\Predicate;

final class _False implements Predicate
{
    public function asBool(): bool
    {
        return false;
    }
}