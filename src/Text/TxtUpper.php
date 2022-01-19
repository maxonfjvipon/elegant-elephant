<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text upper of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtUpper implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * Ctor wrap.
     * @param string $str
     * @return TxtUpper
     * @throws Exception
     */
    public static function ofString(string $str): TxtUpper
    {
        return TxtUpper::ofText(TextOf::string($str));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtUpper
     * @throws Exception
     */
    public static function ofText(Text $text): TxtUpper
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
        return strtoupper($this->text->asString());
    }
}
