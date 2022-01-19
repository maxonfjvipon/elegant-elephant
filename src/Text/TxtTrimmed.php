<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text trimmed.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtTrimmed implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $string
     * @return TxtTrimmed
     */
    public static function ofString(string $string): TxtTrimmed
    {
        return TxtTrimmed::ofText(TextOf::string($string));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtTrimmed
     */
    public static function ofText(Text $text): TxtTrimmed
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
        return trim($this->text->asString());
    }
}