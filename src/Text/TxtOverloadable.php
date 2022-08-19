<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

trait TxtOverloadable
{
    use Overloadable;

    /**
     * @param string|Text ...$args
     * @return array
     * @throws Exception
     */
    private function txtOverloaded(string|Text ...$args): array
    {
        return array_map(
            fn(string|Text $arg) => is_string($arg) ? $arg : $arg->asString(),
            $args
        );
    }

    /**
     * @param string|callable|Text $arg
     * @return mixed
     * @throws Exception
     */
    private function firstTxtOverloaded(string|callable|Text $arg): string
    {
        if (is_callable($arg)) {
            $str = call_user_func($arg);
            if (is_string($str)) {
                return $str;
            }
            if ($str instanceof Text) {
                return $str->asString();
            }
            throw new Exception("Callback must return a string or instance of Text");
        }
        return is_string($arg) ? $arg : $arg->asString();
    }
}
