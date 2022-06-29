<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Matches regex.
 * @package Maxonfjvipon\Elegant_Elephant\Logical
 */
final class PregMatch implements Logical
{
    use TxtOverloadable;

    /**
     * @param string|Text $pttrn
     * @param string|Text $sbjct
     * @return PregMatch
     */
    public static function new(string|Text $pttrn, string|Text $sbjct): PregMatch
    {
        return new self($pttrn, $sbjct);
    }

    /**
     * Ctor.
     * @param string|Text $pattern
     * @param string|Text $subject
     */
    public function __construct(private string|Text $pattern, private string|Text $subject)
    {
    }

    public function asBool(): bool
    {
        return preg_match(...$this->txtOverloaded($this->pattern, $this->subject));
    }
}
