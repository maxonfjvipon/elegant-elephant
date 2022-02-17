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
        return $this->overload($args, [[
            'string',
            Text::class => fn(Text $text) => $text->asString()
        ]]);
    }

    /**
     * @param string|Text $arg
     * @return mixed
     * @throws Exception
     */
    private function firstTxtOverloaded(string|Text $arg): string
    {
        return $this->txtOverloaded($arg)[0];
    }
}
