<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * First item.
 */
final class FirstOf implements Scalar
{
    use CastMixed;

    /**
     * @var string|array<mixed>|Text|Arrayable<mixed> $container
     */
    private $container;

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable<mixed> $container
     */
    final public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    final public function value()
    {
        return $this->mixedCast($this->container)[0];
    }
}
