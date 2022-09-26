<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced.
 */
final class TxtReplaced implements Text
{
    use CastText;

    /**
     * @var string|Text $search
     */
    private $search;

    /**
     * @var string|Text $replace
     */
    private $replace;

    /**
     * @var string|Text $subject
     */
    private $subject;

    /**
     * Ctor wrap.
     *
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     * @return self
     */
    public static function new($search, $replace, $subject): self
    {
        return new self($search, $replace, $subject);
    }

    /**
     * Ctor.
     *
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     */
    public function __construct($search, $replace, $subject)
    {
        $this->search = $search;
        $this->replace = $replace;
        $this->subject = $subject;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        $cast = $this->textsCast($this->search, $this->replace, $this->subject);

        return str_replace($cast[0], $cast[1], $cast[2]);
    }
}
