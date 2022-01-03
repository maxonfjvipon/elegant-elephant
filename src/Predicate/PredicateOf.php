<?php


namespace Maxonfjvipon\Elegant_Elephant\Predicate;

use ElegantBro\Interfaces\Predicate;
use JetBrains\PhpStorm\Pure;

final class PredicateOf implements Predicate
{
    private $origin;

    public function __construct($origin)
    {
        $this->origin = $origin;
    }

    #[Pure] public function asBool(): bool
    {
        return boolval($this->origin);
    }
}