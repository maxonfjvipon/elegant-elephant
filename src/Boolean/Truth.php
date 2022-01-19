<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;

class Truth implements Boolean
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