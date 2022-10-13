<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * First item.
 */
final class FirstOf implements Scalar
{
    use CastScalar;

    /**
     * @var string|array<mixed>|Text|Arrayable<mixed> $container
     */
    private $container;

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable<mixed> $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function value()
    {
        return $this->scalarCast($this->container)[0];
    }
}
