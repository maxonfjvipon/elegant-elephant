<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical FALSE
 */
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
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return false;
    }
}