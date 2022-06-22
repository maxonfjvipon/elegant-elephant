<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TextOf implements Text
{
    use TxtOverloadable;

    /**
     * Ctor wrap of string.
     * @param string|Text|Any $str
     * @return TextOf
     */
    public static function new(string|Text|Any $str): TextOf
    {
        return new self($str);
    }

    /**
     * Ctor.
     * @param string|Text|Any $origin
     */
    public function __construct(private string|Text|Any $origin)
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->firstTxtOverloaded($this->origin);
    }
}
