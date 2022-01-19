<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Boolean;

/**
 * Boolean of.
 * @package Maxonfjvipon\Elegant_Elephant\Boolean
 */
class BooleanOf implements Boolean
{
    /**
     * @var bool $bool
     */
    private bool $bool;

    /**
     * Ctor wrap.
     * @param bool $bool
     * @return BooleanOf
     */
    public static function bool(bool $bool): BooleanOf
    {
        return new self($bool);
    }

    /**
     * Ctor.
     * @param bool $bool
     */
    private function __construct(bool $bool)
    {
        $this->bool = $bool;
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->bool;
    }
}
