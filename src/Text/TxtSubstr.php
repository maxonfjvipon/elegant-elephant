<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Substring.
 */
final class TxtSubstr implements Text
{
    use CastText;

    /**
     * @var string|Text $origin
     */
    private $origin;

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
     *
     * @param string|Text $text
     * @param int $offset
     * @param int|null $length
     * @return self
     */
    public static function new($text, int $offset, ?int $length = null): self
    {
        return new self($text, $offset, $length);
    }

    /**
     * Ctor.
     *
     * @param string|Text $text
     * @param int $offset
     * @param int|null $length
     */
    public function __construct($text, int $offset, ?int $length = null)
    {
        $this->origin = $text;
        $this->offset = $offset;
        $this->length = $length;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        if ($this->length != null) {
            return substr($this->textCast($this->origin), $this->offset, $this->length);
        }

        return substr($this->textCast($this->origin), $this->offset);
    }
}
