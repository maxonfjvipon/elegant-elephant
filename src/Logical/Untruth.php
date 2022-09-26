<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Logical FALSE
 */
final class Untruth implements Logical
{
    /**
     * Ctor wrap.
     *
     * @return self
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @return bool
     */
    public function asBool(): bool
    {
        return false;
    }
}
