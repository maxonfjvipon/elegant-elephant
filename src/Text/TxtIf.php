<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Closure;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;

final class TxtIf implements Text
{

    /**
     * @var bool|Logical $condition
     */
    private bool|Logical $condition;

    /**
     * @var string|Closure|Text $arr
     */
    private string|Closure|Text $text;

    /**
     * Ctor wrap.
     * @param bool|Logical $cond
     * @param string|callable|Text $text
     * @return TxtIf
     */
    public static function new(bool|Logical $cond, string|callable|Text $text): TxtIf
    {
        return new self($cond, $text);
    }

    /**
     * Ctor.
     * @param bool|Logical $cond
     * @param string|callable|Text $text
     */
    public function __construct(bool|Logical $cond, string|callable|Text $text)
    {
        $this->condition = $cond;
        $this->text = $text;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return (new TxtTernary(
            $this->condition,
            $this->text,
            new TxtBlank()
        ))->asString();
    }
}