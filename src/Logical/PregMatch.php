<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * Matches regex.
 */
final class PregMatch implements Logical
{
    use CastText;

    /**
     * @var string|Text $pattern
     */
    private $pattern;

    /**
     * @var string|Text $subject
     */
    private $subject;

    /**
     * Ctor wrap.
     *
     * @param string|Text $pattern
     * @param string|Text $subject
     * @return self
     */
    public static function new($pattern, $subject): self
    {
        return new self($pattern, $subject);
    }

    /**
     * Ctor.
     *
     * @param string|Text $pattern
     * @param string|Text $subject
     */
    public function __construct($pattern, $subject)
    {
        $this->pattern = $pattern;
        $this->subject = $subject;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return (bool) preg_match(...$this->textsCast($this->pattern, $this->subject));
    }
}
