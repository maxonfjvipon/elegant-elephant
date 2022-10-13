<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Scalar;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Last of.
 */
final class LastOf extends SclEnvelope
{
    use CastScalar;

    /**
     * Ctor.
     *
     * @param string|array<mixed>|Text|Arrayable<mixed> $container
     */
    public function __construct($container)
    {
        parent::__construct(
            new SclTernary(
                is_array($container) || $container instanceof Arrayable,
                function () use ($container) {
                    $arr = (array) $this->scalarCast($container);

                    return $arr[count($arr) - 1];
                },
                fn () => substr($this->scalarCast($container), -1)
            )
        );
    }
}