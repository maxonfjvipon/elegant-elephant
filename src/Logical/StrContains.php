<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;

/**
 * String contains.
 */
final class StrContains implements Logical
{
    use CastText;

    /**
     * @var string|Text $haystack
     */
    private $haystack;

    /**
     * @var string|Text $needle
     */
    private $needle;

    /**
     * Ctor wrap.
     *
     * @param string|Text $haystack
     * @param string|Text $needle
     * @return self
     */
    public static function new($haystack, $needle): self
    {
        return new self($haystack, $needle);
    }

    /**
     * Ctor.
     *
     * @param string|Text $haystack
     * @param string|Text $needle
     */
    public function __construct($haystack, $needle)
    {
        $this->haystack = $haystack;
        $this->needle = $needle;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return strpos(...$this->textsCast($this->haystack, $this->needle)) !== false;
    }
}
