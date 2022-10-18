<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Not.
 */
final class Not implements Boolean
{
    use CastMixed;

    /**
     * @var bool|Boolean $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param bool|Boolean $origin
     */
    final public function __construct($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return bool
     * @throws Exception
     */
    final public function asBool(): bool
    {
        return !(bool) $this->mixedCast($this->origin);
    }
}
