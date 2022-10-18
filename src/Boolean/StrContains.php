<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * String contains.
 */
final class StrContains implements Boolean
{
    use CastMixed;

    /**
     * @var string|Text $haystack
     */
    private $haystack;

    /**
     * @var string|Text $needle
     */
    private $needle;

    /**
     * Ctor.
     *
     * @param string|Text $haystack
     * @param string|Text $needle
     */
    final public function __construct($haystack, $needle)
    {
        $this->haystack = $haystack;
        $this->needle = $needle;
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return strpos(...$this->mixedArrCast($this->haystack, $this->needle)) !== false;
    }
}
