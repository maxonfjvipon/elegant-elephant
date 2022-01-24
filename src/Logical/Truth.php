<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
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
     * Ctor.
     */
    private function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return true;
    }
}