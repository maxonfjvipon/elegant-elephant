<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;

/**
 * Not.
 */
final class Not implements Logical
{
    use CastLogical;

    /**
     * @var bool|Logical $origin
     */
    private $origin;

    /**
     * @param bool|Logical $origin
     * @return self
     */
    public static function new($origin): self
    {
        return new self($origin);
    }

    /**
     * Ctor.
     *
     * @param bool|Logical $origin
     */
    public function __construct($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function asBool(): bool
    {
        return !$this->logicalCast($this->origin);
    }
}
