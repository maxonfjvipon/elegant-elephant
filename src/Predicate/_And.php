<?php


namespace Maxonfjvipon\Elegant_Elephant\Predicate;


use ElegantBro\Interfaces\Predicate;
use Error;

final class _And implements Predicate
{
    /**
     * @var array Array of {@Predicate}
     */
    private array $predicates;

    /**
     * _And constructor.
     * @param $predicates
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
            if (!$predicate->asBool()) {
                return false;
            }
        }
        return true;
    }
}