<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text from callback
 */
final class TxtFromCallback implements Text
{
    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @param callable $callback
     * @return TxtFromCallback
     */
    public static function new(callable $callback): TxtFromCallback
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
     * @inheritDoc
     */
    public function asString(): string
    {
        $str = call_user_func($this->callback);
        if (is_string($str)) {
            return $str;
        }
        if ($str instanceof Text) {
            return $str->asString();
        }
        throw new Exception("Callback must return a string or Text!");
    }
}
