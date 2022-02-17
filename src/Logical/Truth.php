<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

final class Truth implements Logical
{
    /**
     * @return Truth
     */
    public static function new(): Truth
    {
        return new self();
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return true;
    }
}