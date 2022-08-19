<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtReplaced implements Text
{
    use TxtOverloadable;

    /**
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     * @return TxtReplaced
     */
    public static function new(string|Text $search, string|Text $replace, string|Text $subject): TxtReplaced
    {
        return new self($search, $replace, $subject);
    }

    /**
     * Ctor.
     * @param string|Text $search
     * @param string|Text $replace
     * @param string|Text $subject
     */
    public function __construct(
        private string|Text $search,
        private string|Text $replace,
        private string|Text $subject
    )
    {
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return str_replace(...$this->txtOverloaded($this->search, $this->replace, $this->subject));
    }
}
