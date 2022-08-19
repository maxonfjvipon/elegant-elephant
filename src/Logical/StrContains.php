<?php

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtOverloadable;

/**
 * String contains.
 */
final class StrContains implements Logical
{
    use TxtOverloadable;

    /**
     * Ctor wrap.
     * @param string|Text $haystack
     * @param string|Text $needle
     * @return StrContains
     */
    public static function new(string|Text $haystack, string|Text $needle): StrContains
    {
        return new self($haystack, $needle);
    }

    /**
     * Ctor.
     * @param string|Text $haystack
     * @param string|Text $needle
     */
    public function __construct(private string|Text $haystack, private string|Text $needle)
    {
    }

    /**
     * @inheritDoc
     */
    public function asBool(): bool
    {
        return str_contains(...$this->txtOverloaded($this->haystack, $this->needle));
    }
}