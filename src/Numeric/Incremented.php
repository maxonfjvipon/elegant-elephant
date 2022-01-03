<?php


namespace Maxonfjvipon\Elegant_Elephant\Numeric;


use ElegantBro\Interfaces\Numeric;
use Exception;

final class Incremented implements Numeric
{
    private Numeric $origin;

    public function __construct(Numeric $origin)
    {
        $this->origin = $origin;
    }

    public function asNumber(): string
    {
        return +$this->origin->asNumber() + 1;
    }
}