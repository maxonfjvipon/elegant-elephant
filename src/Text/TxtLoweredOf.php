<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text lowered of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtLoweredOf implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $str
     * @return TxtLoweredOf
     */
    public static function string(string $str): TxtLoweredOf
    {
        return TxtLoweredOf::text(TextOf::string($str));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtLoweredOf
     */
    public static function text(Text $text): TxtLoweredOf
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param Text $txt
     */
    private function __construct(Text $txt)
    {
        $this->text = $txt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return strtolower($this->text->asString());
    }
}
