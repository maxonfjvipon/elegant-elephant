<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Imploded text.
 */
final class TxtImploded implements Text
{
    use CastText;

    /**
     * @var array<string|Text> $pieces
     */
    private array $pieces;

    /**
     * @var string|Text $separator
     */
    private $separator;

    /**
     * @param string|Text ...$pieces
     * @return self
     */
    public static function withComma(...$pieces): self
    {
        return new self(",", ...$pieces);
    }

    /**
     * Ctor wrap.
     *
     * @param string|Text $separator
     * @param string|Text ...$pieces
     * @return self
     */
    public static function new($separator, ...$pieces): self
    {
        return new self($separator, ...$pieces);
    }

    /**
     * Ctor.
     *
     * @param string|Text $separator
     * @param string|Text ...$pieces
     */
    public function __construct($separator, ...$pieces)
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
            $this->textCast($this->separator),
            $this->textsCast(...$this->pieces)
        );
    }
}
