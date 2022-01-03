<?php

namespace Maxonfjvipon\Elegant_Elephant\Predicate;

use ElegantBro\Interfaces\Predicate;

final class _True implements Predicate
{
    public function asBool(): bool
    {
        return true;
    }
}