<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text encoded to JSON.
 */
final class TxtJsonEncoded implements Text
{
    use CastMixed;

    /**
     * @var string|int|float|array<mixed>|bool|Text|Numerable|Arrayable|Logical|Any $value;
     */
    private $value;

    /**
     * @param string|int|float|array<mixed>|bool|Text|Numerable|Arrayable|Logical|Any $value
     * @return static
     */
    public static function new($value): self
    {
        return new self($value);
    }

    /**
     * Ctor.
     *
     * @param string|int|float|array<mixed>|bool|Text|Numerable|Arrayable|Logical|Any $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return (string) json_encode($this->castMixed($this->value));
    }
}
