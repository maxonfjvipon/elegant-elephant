<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text lowered of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtLowered implements Text
{
    use TxtOverloadable;

    /**
     * Ctor wrap.
     * @param string|Text $text
     * @return TxtLowered
     */
    public static function new(string|Text $text)
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Text $text
     */
    public function __construct(private string|Text $text)
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strtolower($this->firstTxtOverloaded($this->text));
    }
}
