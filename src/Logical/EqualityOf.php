<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Equality of.
 */
final class EqualityOf implements Logical
{
    use CastMixed;

    /**
     * @var mixed $first
     */
    private $first;

    /**
     * @var mixed $second
     */
    private $second;

    /**
     * Ctor wrap.
     *
     * @param mixed $arg1
     * @param mixed $arg2
     * @return self
     */
    public static function new($arg1, $arg2): self
    {
        return new self($arg1, $arg2);
    }

    /**
     * Ctor.
     *
     * @param mixed $arg1
     * @param mixed $arg2
     */
    public function __construct($arg1, $arg2)
    {
        $this->first = $arg1;
        $this->second = $arg2;
    }


    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return $this->castMixed($this->first) === $this->castMixed($this->second);
    }
}
