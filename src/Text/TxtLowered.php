<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text lowered of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtLowered implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $str
     * @return TxtLowered
     */
    public static function ofString(string $str): TxtLowered
    {
        return TxtLowered::ofText(TextOf::string($str));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtLowered
     */
    public static function ofText(Text $text): TxtLowered
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
