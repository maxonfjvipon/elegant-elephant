<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text in upper case.
 */
final class TxtUpper implements Text
{
    use CastText;

    /**
     * @var string|Text $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string|Text $text
     * @return self
     */
    public static function new($text): self
    {
        return new self($text);
    }

    /**
     * Ctor.
     *
     * @param string|Text $text
     */
    public function __construct($text)
    {
        $this->origin = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return strtoupper($this->textCast($this->origin));
    }
}
