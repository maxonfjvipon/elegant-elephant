<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Flatten array.
 */
final class ArrFlatten extends ArrEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arrayable<mixed> $arr
     * @param int $deep
     */
    public function __construct($arr, int $deep = 1)
    {
        parent::__construct(
            new ArrFromCallback(
                fn () => $this->flat($this->mixedCast($arr), [], $deep)
            )
        );
    }

    /**
     * @param array<mixed> $arr
     * @param array<mixed> $new
     * @param int $neededDeep
     * @param int $currentDeep
     * @return array<mixed>
     * @throws Exception
     */
    private function flat(array $arr, array $new, int $neededDeep, int $currentDeep = 0): array
    {
        foreach ($arr as $item) {
            if ($neededDeep !== $currentDeep && (is_array($item) || $item instanceof Arrayable)) {
                $new = $this->flat($this->mixedCast($item), $new, $neededDeep, $currentDeep + 1);
            } else {
                $new[] = $item;
            }
        }

        return $new;
    }
}
