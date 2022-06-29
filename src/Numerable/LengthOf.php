<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use TypeError;

/**
 * Length of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class LengthOf implements Numerable
{
    /**
     * @param Text|string|array|Arrayable $arg
     * @return LengthOf
     */
    public static function new(string|array|Text|Arrayable $arg): LengthOf
    {
        return new self($arg);
    }

    /**
     * Ctor.
     * @param Text|string|array|Arrayable $arg
     */
    public function __construct(private string|array|Text|Arrayable $arg)
    {
    }

    /**
     * @inheritDoc
     * @throws Exception|TypeError
     */
    public function asNumber(): float|int
    {
        if (is_string($this->arg)) {
            return strlen($this->arg);
        } elseif (is_array($this->arg)) {
            return count($this->arg);
        } elseif ($this->arg instanceof Text) {
            return strlen($this->arg->asString());
        } else {
            return count($this->arg->asArray());
        }
    }
}
