<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Closure;
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
        return $this->overload($args, [[
            'string',
            Text::class => fn(Text $text) => $text->asString()
        ]]);
    }

    /**
     * @throws Exception
     */
    private function txtOrCallableOverloaded(string|callable|Text ...$args): array
    {
        return $this->overload($args, [[
            'string',
            Text::class => fn(Text $text) => $text->asString(),
            'callable' => fn(callable $callback) => $this->firstTxtOverloaded(call_user_func($callback)),
            Closure::class => fn(Closure $closure) => $this->firstTxtOverloaded(call_user_func($closure))
        ]]);
    }

    /**
     * @param string|callable|Text $arg
     * @return mixed
     * @throws Exception
     */
    private function firstTxtOverloaded(string|callable|Text $arg): string
    {
        if (is_callable($arg)) {
            $str = $this->txtOrCallableOverloaded($arg)[0];
            if (!is_string($str)) {
                throw new Exception("Callback must return a string or instance of Text");
            }
            return $str;
        }
        return $this->txtOverloaded($arg)[0];
    }
}
