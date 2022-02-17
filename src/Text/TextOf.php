<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
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
     * @var string|Text $origin
     */
    private string|Text $origin;

    /**
     * Ctor wrap of string.
     * @param string|Text $str
     * @return TextOf
     */
    public static function new(string|Text $str): TextOf
    {
        return new self($str);
    }

    /**
     * Ctor.
     * @param string|Text $str
     */
    public function __construct(string|Text $str)
    {
        $this->origin = $str;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->firstTxtOverloaded($this->origin);
    }
}
