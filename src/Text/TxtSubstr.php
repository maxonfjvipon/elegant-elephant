<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Substring of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtSubstr implements Text
{
    /**
     * @var Text $text
     */
    private Text $text;

    /**
     * @var int $offset
     */
    private int $offset;

    /**
     * @var int|null $length
     */
    private ?int $length;

    /**
     * Ctor wrap.
     * @param string $str
     * @param int $offset
     * @param null $length
     * @return TxtSubstr
     */
    public static function ofString(string $str, int $offset, $length = null): TxtSubstr
    {
        return TxtSubstr::ofText(TextOf::string($str), $offset, $length);
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @param int $offset
     * @param null $length
     * @return TxtSubstr
     */
    public static function ofText(Text $text, int $offset, $length = null): TxtSubstr
    {
        return new self($text, $offset, $length);
    }

    /**
     * Ctor.
     * @param Text $text
     * @param int $offset
     * @param int|null $length
     */
    private function __construct(Text $text, int $offset, ?int $length)
    {
        $this->text = $text;
        $this->offset = $offset;
        $this->length = $length;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return substr($this->text->asString(), $this->offset, $this->length);
    }
}