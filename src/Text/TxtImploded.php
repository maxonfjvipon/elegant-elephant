<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Imploded text.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtImploded
{
    /**
     * @var Text $separator
     */
    private Text $separator;

    /**
     * Imploded with string
     * @param string $separator
     * @return TxtImplodedWith
     */
    public static function withString(string $separator): TxtImplodedWith
    {
        return TxtImploded::withText(TextOf::string($separator));
    }

    /**
     * Imploded with comma
     * @return TxtImplodedWith
     */
    public static function withComma(): TxtImplodedWith
    {
        return TxtImploded::withString(",");
    }

    /**
     * Imploded with text
     * @param Text $separator
     * @return TxtImplodedWith
     */
    public static function withText(Text $separator): TxtImplodedWith
    {
        return new class($separator) implements TxtImplodedWith
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
             * Imploded of texts
             * @param Text ...$texts
             * @return Text
             */
            public function ofTexts(Text ...$texts): Text
            {
                return self::ofStrings(
                    ...ArrMapped::ofArray(
                        $texts,
                        fn(Text $txt) => $txt->asString()
                    )->asArray()
                );
            }

            /**
             * Imploded of strings
             * @param string ...$strings
             * @return Text
             */
            public function ofStrings(string ...$strings): Text
            {
                return new class($this->separator, ...$strings) implements Text
                {
                    /**
                     * @var Text $separator
                     */
                    private Text $separator;

                    /**
                     * @var string[] $texts
                     */
                    private array $pieces;

                    /**
                     * Ctor.
                     * @param Text $separator
                     * @param string ...$pieces
                     */
                    public function __construct(Text $separator, string ...$pieces)
                    {
                        $this->separator = $separator;
                        $this->pieces = $pieces;
                    }

                    /**
                     * @inheritDoc
                     */
                    public function asString(): string
                    {
                        return implode(
                            $this->separator->asString(),
                            $this->pieces
                        );
                    }
                };
            }
        };
    }
}
