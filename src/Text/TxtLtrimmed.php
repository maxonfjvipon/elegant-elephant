<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\OverloadedElephant\Overloadable;

final class TxtLtrimmed implements Text
{
    use Overloadable;

    /**
     * @var string|Text $origin
     */
    private string|Text $origin;

    /**
     * @param string|Text $text
     * @return TxtLtrimmed
     */
    public static function new(string|Text $text): TxtLtrimmed
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param string|Text $text
     */
    public function __construct(string|Text $text)
    {
        $this->origin = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return ltrim(...$this->overload([$this->origin], [[
            'string',
            Text::class => fn(Text $txt) => $txt->asString()
        ]]));
    }
}