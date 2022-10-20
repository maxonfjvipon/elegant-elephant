<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Stringable;

/**
 * Text of.
 */
final class TextOf implements StringableText
{
    use CastMixed;
    use TextToString;

    /**
     * @var string|float|int|Number|Scalar|Stringable $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string|float|int|Number|Scalar|Stringable $text
     */
    final public function __construct($text)
    {
        $this->origin = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    final public function asString(): string
    {
        $res = $this->mixedCast($this->origin);

        if (!is_string($res) && !is_numeric($res)) {
            throw new Exception("Encapsulated object must be wrapper of numeric or string");
        }

        return (string) $res;
    }
}
