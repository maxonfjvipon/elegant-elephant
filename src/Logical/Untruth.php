<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

final class Untruth implements Logical
{
    /**
     * @return Untruth
     */
    public static function new(): Untruth
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
        return false;
    }
}