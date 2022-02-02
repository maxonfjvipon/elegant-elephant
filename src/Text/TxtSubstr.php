<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Substring of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtSubstr implements Text
{
    use Overloadable;

    /**
     * @var string|Text $text
     */
    private string|Text $text;

    /**
     * @var int $offset
     */
    private int $offset;

    /**
     * @var int|null $length
     */
    private ?int $length;

    /**
     * @param string|Text $txt
     * @param int $offset
     * @param int|null $length
     * @return TxtSubstr
     */
    public static function new(string|Text $txt, int $offset, int $length = null): TxtSubstr
    {
        return new self($txt, $offset, $length);
    }

    /**
     * Ctor.
     * @param string|Text $text
     * @param int $offset
     * @param int|null $length
     */
    public function __construct(string|Text $text, int $offset, int $length = null)
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
        return substr(self::overload([$this->text], [[
            'string',
            Text::class => fn(Text $txt) => $txt->asString()
        ]])[0], $this->offset, $this->length);
    }
}
