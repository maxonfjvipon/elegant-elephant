<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

/**
 * Text replaced.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtReplaced implements Text
{
    use TxtOverloadable;

    /**
     * @var Text|string $search
     */
    private string|Text $search;

    /**
     * @var Text|string $replace
     */
    private string|Text $replace;

    /**
     * @var Text|string $subject
     */
    private string|Text $subject;

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
    public function __construct(string|Text $search, string|Text $replace, string|Text $subject)
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
        return str_replace(...$this->txtOverloaded($this->search, $this->replace, $this->subject));
    }
}
