<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;

final class TxtIf implements Text
{

    /**
     * @var bool|Logical $condition
     */
    private bool|Logical $condition;

    /**
     * @var string|Text $arr
     */
    private string|Text $text;

    /**
     * Ctor wrap.
     * @param bool|Logical $cond
     * @param string|Text $text
     * @return TxtIf
     */
    public static function new(bool|Logical $cond, string|Text $text): TxtIf
    {
        return new self($cond, $text);
    }

    /**
     * Ctor.
     * @param bool|Logical $cond
     * @param string|Text $text
     */
    public function __construct(bool|Logical $cond, string|Text $text)
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