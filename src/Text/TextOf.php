<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TextOf implements Text
{
    /**
     * @var string $origin
     */
    private string $origin;

    /**
     * Ctor wrap of string.
     * @param string $str
     * @return TextOf
     */
    public static function string(string $str): TextOf
    {
        return new self($str);
    }

    /**
     * Ctor.
     * @param string $text
     */
    private function __construct(string $text)
    {
        $this->origin = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->origin;
    }
}
