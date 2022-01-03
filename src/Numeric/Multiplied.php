<?php


namespace Maxonfjvipon\Elegant_Elephant\Numeric;


use ElegantBro\Interfaces\Numeric;

final class Multiplied implements Numeric
{
    private Numeric $first;
    private Numeric $second;

    public function __construct(Numeric $first, Numeric $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function asNumber(): string
    {
        return +$this->first->asNumber() * +$this->second->asNumber();
    }
}