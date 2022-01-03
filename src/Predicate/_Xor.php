<?php


namespace Maxonfjvipon\Elegant_Elephant\Predicate;


use ElegantBro\Interfaces\Predicate;
use Exception;

final class _Xor implements Predicate
{
    private array $predicates;

    public function __construct(...$predicates)
    {
        $this->predicates = $predicates;
    }

    // FIXME
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