<?php

namespace Maxonfjvipon\Elegant_Elephant\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;

/**
 * Array exploded
 * @package Maxonfjvipon\Elegant_Elephant\Arrayable
 */
final class ArrExploded
{
    /**
     * Exploded by string
     * @param string $separator
     * @return ArrExplodedBy
     */
    public static function byString(string $separator): ArrExplodedBy
    {
        return ArrExploded::byText(TextOf::string($separator));
    }

    /**
     * Exploded by comma
     * @return ArrExplodedBy
     */
    public static function byComma(): ArrExplodedBy
    {
        return ArrExploded::byText(TextOf::string(","));
    }

    /**
     * Exploded by text
     * @param Text $separator
     * @return ArrExplodedBy
     */
    public static function byText(Text $separator): ArrExplodedBy
    {
        return new class($separator) implements ArrExplodedBy
        {
            /**
             * @var Text $separator
             */
            private Text $separator;

            /**
             * Ctor.
             * @param Text $separator
             */
            public function __construct(Text $separator)
            {
                $this->separator = $separator;
            }

            /**
             * Exploded of string
             * @param string $str
             * @return Arrayable
             */
            public function ofString(string $str): Arrayable
            {
                return $this->ofText(TextOf::string($str));
            }

            /**
             * Exploded of text
             * @param Text $text
             * @return Arrayable
             */
            public function ofText(Text $text): Arrayable
            {
                return new class($this->separator, $text) implements Arrayable
                {
                    /**
                     * @var Text $separator
                     */
                    private Text $separator;

                    /**
                     * @var Text $text
                     */
                    private Text $text;

                    /**
                     * Ctor.
                     * @param Text $separator
                     * @param Text $text
                     */
                    public function __construct(Text $separator, Text $text)
                    {
                        $this->separator = $separator;
                        $this->text = $text;
                    }

                    /**
                     * @inheritDoc
                     */
                    public function asArray(): array
                    {
                        return explode($this->separator->asString(), $this->text->asString());
                    }
                };
            }
        };
    }
}
