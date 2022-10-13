<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;

/**
 * Not.
 */
final class Not implements Boolean
{
    use CastScalar;

    /**
     * @var bool|Boolean $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param bool|Boolean $origin
     */
    public function __construct($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function value(): bool
    {
        return !(bool) $this->scalarCast($this->origin);
    }
}
