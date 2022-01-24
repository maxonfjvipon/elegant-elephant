<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Text;

final class TxtTernary implements Text
{
    /**
     * @var Logical $condition
     */
    private Logical $condition;

    /**
     * @var Text $original
     */
    private Text $original;

    /**
     * @var Text $alt
     */
    private Text $alt;

    /**
     * @param Logical $condition
     * @param string $original
     * @param string $alt
     * @return TxtTernary
     */
    public static function ofStrings(Logical $condition, string $original, string $alt): TxtTernary
    {
        return TxtTernary::ofTexts($condition, TextOf::string($original), TextOf::string($alt));
    }

    /**
     * @param Logical $condition
     * @param Text $original
     * @param Text $alt
     * @return TxtTernary
     */
    public static function ofTexts(Logical $condition, Text $original, Text $alt): TxtTernary
    {
        return new self($condition, $original, $alt);
    }

    /**
     * Ctor.
     * @param Logical $condition
     * @param Text $original
     * @param Text $alt
     */
    private function __construct(Logical $condition, Text $original, Text $alt)
    {
        $this->condition = $condition;
        $this->original = $original;
        $this->alt = $alt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return $this->condition->asBool() ? $this->original->asString() : $this->alt->asString();
    }
}