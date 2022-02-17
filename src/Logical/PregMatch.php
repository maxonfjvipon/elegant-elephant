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
     * @var string|Text $pattern
     */
    private string|Text $pattern;

    /**
     * @var string|Text $subject
     */
    private string|Text $subject;

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
     * @param string|Text $pttrn
     * @param string|Text $sbjct
     */
    public function __construct(string|Text $pttrn, string|Text $sbjct)
    {
        $this->pattern = $pttrn;
        $this->subject = $sbjct;
    }

    public function asBool(): bool
    {
        return preg_match(...$this->txtOverloaded($this->pattern, $this->subject));
    }
}
