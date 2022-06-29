<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TextOf implements Text
{
    use TxtOverloadable;

    /**
     * Ctor wrap of string.
     * @param string|Any $text
     * @return TextOf
     */
    public static function new(string|Any $text): TextOf
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Any $text
     */
    public function __construct(private string|Any $text)
    {
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        if ($this->text instanceof Any) {
            if (!is_array($res = $this->text->asAny())) {
                throw new Exception("Any object must return an array");
            }
            return $res;
        }
        return $this->text;
    }
}
