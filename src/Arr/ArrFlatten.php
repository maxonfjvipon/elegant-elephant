<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;

/**
 * Flatten array.
 */
final class ArrFlatten extends ArrWrap
{
    use EnsureArr;

    /**
     * Ctor.
     *
     * @param array<mixed>|Arr $arr
     * @param int              $deep
     */
    final public function __construct(array|Arr $arr, int $deep = 1)
    {
        parent::__construct(
            ArrOf::func(fn () => $this->flat($this->ensuredArray($arr), [], $deep))
        );
    }

    /**
     * @param  array<mixed> $arr
     * @param  array<mixed> $new
     * @param  int          $neededDeep
     * @param  int          $currentDeep
     * @return array<mixed>
     * @throws Exception
     */
    private function flat(array $arr, array $new, int $neededDeep, int $currentDeep = 0): array
    {
        foreach ($arr as $item) {
            if ($neededDeep !== $currentDeep && (is_array($item) || $item instanceof Arr)) {
                $new = $this->flat($this->ensuredArray($item), $new, $neededDeep, $currentDeep + 1);
            } else {
                $new[] = $item;
            }
        }

        return $new;
    }
}