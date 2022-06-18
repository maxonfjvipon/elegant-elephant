<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Imploded text.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtImploded implements Text
{
    use TxtOverloadable;

    /**
     * @var string|Text $separator
     */
    private string|Text $separator;

    /**
     * @var array<string|Text> $pieces
     */
    private array $pieces;

    /**
     * @param mixed ...$pieces
     * @return TxtImploded
     */
    public static function withComma(string|Text ...$pieces): TxtImploded
    {
        return TxtImploded::new(",", ...$pieces);
    }

    /**
     * @param string|Text $separator
     * @param string|Text ...$pieces
     * @return TxtImploded
     */
    public static function new(string|Text $separator, string|Text ...$pieces): TxtImploded
    {
        return new self($separator, ...$pieces);
    }

    /**
     * Ctor.
     * @param string|Text $separator
     * @param string|Text ...$pieces
     */
    public function __construct(string|Text $separator, string|Text ...$pieces)
    {
        $this->separator = $separator;
        $this->pieces = $pieces;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return implode(
            $this->firstTxtOverloaded($this->separator),
            $this->txtOverloaded(...$this->pieces)
        );
    }
}
