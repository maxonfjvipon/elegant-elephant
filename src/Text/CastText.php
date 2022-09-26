<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text cast.
 */
trait CastText
{
    /**
     * @param string|Text ...$args
     * @return array<string>
     * @throws Exception
     */
    private function textsCast(...$args): array
    {
        return array_map(
            fn ($arg) => $this->textCast($arg),
            $args
        );
    }

    /**
     * @param string|callable|Text $arg
     * @return string
     * @throws Exception
     */
    private function textOrCallableCast($arg): string
    {
        if (is_callable($arg)) {
            return $this->textOrCallableCast(call_user_func($arg));
        }

        return $this->textCast($arg);
    }

    /**
     * @param string|Text $arg
     * @return string
     * @throws Exception
     */
    private function textCast($arg): string
    {
        return is_string($arg) ? $arg : $arg->asString();
    }
}
