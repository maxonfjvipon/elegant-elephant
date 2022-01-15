<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMappedOf;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text joined of.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtJoinedOf implements Text
{
    /**
     * @var array $array
     */
    private array $array;

    /**
     * @var Text $separator
     */
    private Text $separator;

    /**
     * Ctor.
     * @param Text $separator
     * @param Text ...$array
     */
    private function __construct(Text $separator, Text ...$array)
    {
        $this->separator = $separator;
        $this->array = $array;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return join(
            $this->separator->asString(),
            ArrMappedOf::array(
                $this->array,
                fn(Text $text) => $text->asString()
            )->asArray()
        );
    }
}
