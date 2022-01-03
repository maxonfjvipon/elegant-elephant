<?php

namespace Maxonfjvipon\Elegant_Elephant\Numeric;

use ElegantBro\Interfaces\Numeric;
use TypeError;

final class NumericOf implements Numeric
{
    private $origin;

    public function __construct($origin)
    {
        $this->origin = $origin;
    }

    public function asNumber(): string
    {
        if (is_numeric($this->origin)) {
            return $this->origin;
        }
        throw new TypeError('Should be converted to numeric'); // todo
    }
}