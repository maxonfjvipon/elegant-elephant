<?php

declare(strict_types=1);

namespace Maxonfjvipon\ElegantElephant\Any;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;

use function Maxonfjvipon\ElegantElephant\reduced;

/**
 * Array reduced.
 */
final class Reduced implements Any
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param  array<mixed>|Arr  $arr
     * @param  callable  $callback
     * @param  mixed  $init
     * @param  bool  $ensureInit
     */
    public function __construct(
        private array|Arr $arr,
        callable $callback,
        private mixed $init,
        private bool $ensureInit = false
    ) {
        $this->callback = $callback;
    }

    public function value(): mixed
    {
        return reduced($this->arr, $this->callback, $this->init, $this->ensureInit);
    }
}
