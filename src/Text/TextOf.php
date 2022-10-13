<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text of.
 */
final class TextOf implements Text
{
    use CastScalar;
    use StringableText;

    /**
     * @var string|Scalar $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string|Scalar $text
     */
    public function __construct($text)
    {
        $this->origin = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function value(): string
    {
        if ($this->origin instanceof Scalar) {
            if (!is_string($res = $this->origin->value())) {
                throw new Exception("Scalar object must be wrapper of string");
            }

            return $res;
        }

        return (string) $this->origin;
    }
}
