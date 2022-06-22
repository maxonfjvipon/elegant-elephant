<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Boolean of.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class LogicalOf implements Logical
{
    use LogicalOverloadable;

    /**
     * Ctor wrap.
     * @param bool $bool
     * @return LogicalOf
     */
    public static function bool(bool|Any $bool): LogicalOf
    {
        return new self($bool);
    }

    /**
     * Ctor.
     * @param bool $bool
     */
    private function __construct(private bool|Any $bool)
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return $this->firstLogicalOverloaded($this->bool);
    }
}
