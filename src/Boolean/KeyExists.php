<?php

declare(strict_types=1);

namespace Maxonfjvipon\Elegant_Elephant\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastScalar;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Key exists.
 */
final class KeyExists implements Boolean
{
    use CastScalar;

    /**
     * @var int|string|Number|Text $key
     */
    private $key;

    /**
     * @var array<mixed>|Arrayable<mixed> $arr
     */
    private $arr;

    /**
     * Ctor.
     *
     * @param int|string|Number|Text $key
     * @param array<mixed>|Arrayable<mixed> $arr
     */
    public function __construct($key, $arr)
    {
        $this->key = $key;
        $this->arr = $arr;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function value(): bool
    {
        return array_key_exists($this->scalarCast($this->key), (array) $this->scalarCast($this->arr));
    }
}
