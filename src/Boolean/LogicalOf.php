<?php

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Boolean of.
 * @package Maxonfjvipon\Elegant_Elephant\Boolean
 */
final class LogicalOf implements Logical
{
    /**
     * @var bool $bool
     */
    private bool $bool;

    /**
     * Ctor wrap.
     * @param bool $bool
     * @return LogicalOf
     */
    public static function bool(bool $bool): LogicalOf
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
