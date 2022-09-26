<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text of.
 */
final class TextOf implements Text
{
    use CastText;

    /**
     * @var string|Any $origin
     */
    private $origin;

    /**
     * Ctor wrap.
     *
     * @param string|Any $text
     * @return self
     */
    public static function new($text): self
    {
        return new self($text);
    }

    /**
     * Ctor.
     *
     * @param string|Any $text
     */
    public function __construct($text)
    {
        $this->origin = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        if ($this->origin instanceof Any) {
            if (!is_string($res = $this->origin->asAny())) {
                throw new Exception("Any object must be wrapper of string");
            }

            return $res;
        }

        return (string) $this->origin;
    }
}
