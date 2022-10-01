<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Preg replaced text.
 */
final class TxtPregReplaced implements Text
{
    use CastMixed;

    /**
     * @var string|array<string>|Text|Arrayable $pattern
     */
    private $pattern;

    /**
     * @var string|array<string>|Text|Arrayable $replacement
     */
    private $replacement;

    /**
     * @var string|array<string>|Text|Arrayable $subject
     */
    private $subject;

    /**
     * Ctor wrap.
     *
     * @param string|array<string>|Text|Arrayable $pattern
     * @param string|array<string>|Text|Arrayable $replacement
     * @param string|array<string>|Text|Arrayable $subject
     * @return self
     */
    public static function new($pattern, $replacement, $subject): self
    {
        return new self($pattern, $replacement, $subject);
    }

    /**
     * Ctor.
     *
     * @param string|array<string>|Text|Arrayable $pattern
     * @param string|array<string>|Text|Arrayable $replacement
     * @param string|array<string>|Text|Arrayable $subject
     */
    public function __construct($pattern, $replacement, $subject)
    {
        $this->pattern = $pattern;
        $this->replacement = $replacement;
        $this->subject = $subject;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return (string) preg_replace(
            $this->castMixed($this->pattern),
            $this->castMixed($this->replacement),
            $this->castMixed($this->subject)
        );
    }
}
