<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\CastLogical;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Ternary text.
 */
final class TxtTernary implements Text
{
    use CastText;
    use CastLogical;

    /**
     * @var bool|Logical $condition
     */
    private $condition;

    /**
     * @var string|callable|Text $origin
     */
    private $origin;

    /**
     * @var string|callable|Text $alt
     */
    private $alt;

    /**
     * Ctor wrap.
     *
     * @param bool|Logical $condition
     * @param string|callable|Text $original
     * @param string|callable|Text $alt
     * @return self
     */
    public static function new($condition, $original, $alt): self
    {
        return new self($condition, $original, $alt);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical $condition
     * @param string|callable|Text $original
     * @param string|callable|Text $alt
     */
    public function __construct($condition, $original, $alt)
    {
        $this->condition = $condition;
        $this->origin = $original;
        $this->alt = $alt;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->logicalCast($this->condition)
            ? $this->textOrCallableCast($this->origin)
            : $this->textOrCallableCast($this->alt);
    }
}
