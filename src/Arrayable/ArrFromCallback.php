<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Array from callback
 */
final class ArrFromCallback extends ArrEnvelope
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param callable $callback
     * @return ArrFromCallback
     */
    public static function new(callable $callback): ArrFromCallback
    {
        return new self($callback);
    }

    /**
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        $arr = call_user_func($this->callback);
        if (is_array($arr)) {
            return $arr;
        }
        if ($arr instanceof Arrayable) {
            return $arr->asArray();
        }
        throw new Exception("Callback must return an array or Arrayable!");
    }
}
