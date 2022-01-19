<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Text;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

/**
 * Text joined.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
class TxtJoined implements Text
{
    /**
     * @var string[] $args
     */
    private array $args;

    /**
     * Ctor wrap.
     * @param Text ...$texts
     * @return TxtJoined
     * @throws Exception
     */
    public static function ofTexts(Text ...$texts): TxtJoined
    {
        return TxtJoined::ofStrings(
            ...ArrMapped::ofArray(
                $texts,
                fn(Text $txt) => $txt->asString()
            )->asArray()
        );
    }

    /**
     * Ctor wrap.
     * @param string ...$strings
     * @return TxtJoined
     * @throws Exception
     */
    public static function ofStrings(string ...$strings): TxtJoined
    {
        return new self(...$strings);
    }

    /**
     * Ctor.
     * @param string ...$texts
     */
    private function __construct(string ...$texts)
    {
        $this->args = $texts;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return TxtImploded::withText(TxtBlank::new())
            ->ofStrings(...$this->args)
            ->asString();
    }
}
