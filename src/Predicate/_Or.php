<?php

namespace Maxonfjvipon\Elegant_Elephant\Predicate;

use ElegantBro\Interfaces\Predicate;
use Error;

final class _Or implements Predicate
{

    /**
     * @var array Predicates
     */
    private array $predicates;

    /**
     * _And constructor.
     * @param array $predicates
     */
    public function __construct(...$predicates)
    {
        $this->predicates = $predicates;
    }

    /**
     * @return bool
     * @throws Error
     */
    public function asBool(): bool
    {
        foreach ($this->predicates as $predicate) {
            if ($predicate->asBool()) {
                return true;
            }
        }
        return false;
    }
}