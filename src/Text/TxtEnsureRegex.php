<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Maxonfjvipon\Elegant_Elephant\Logical\EqualityOf;
use Maxonfjvipon\Elegant_Elephant\Logical\Negation;
use Maxonfjvipon\Elegant_Elephant\Numerable\Decremented;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Ensure regex text.
 * Adds slashes before and after origin text if requires.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtEnsureRegex implements Text
{
    /**
     * @var Text $origin
     */
    private Text $origin;


    /**
     * Ctor wrap.
     * @param string $string
     * @return TxtEnsureRegex
     */
    public static function ofString(string $string): TxtEnsureRegex
    {
        return TxtEnsureRegex::ofText(TextOf::string($string));
    }

    /**
     * Ctor wrap.
     * @param Text $text
     * @return TxtEnsureRegex
     */
    public static function ofText(Text $text): TxtEnsureRegex
    {
        return new self($text);
    }

    /**
     * Ctor.
     * @param Text $txt
     */
    private function __construct(Text $txt)
    {
        $this->origin = $txt;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        $slash = TextOf::string("/");
        $blank = TxtBlank::new();
        return TxtJoined::ofTexts(
            TxtTernary::ofTexts(
                Negation::new(
                    EqualityOf::texts(
                        TxtSubstr::ofText($this->origin, 0, 1),
                        $slash
                    )
                ),
                $slash,
                $blank
            ),
            $this->origin,
            TxtTernary::ofTexts(
                Negation::new(
                    EqualityOf::texts(
                        TxtSubstr::ofText(
                            $this->origin,
                            Decremented::new(
                                LengthOf::text($this->origin)
                            )->asNumber(),
                            1),
                        $slash
                    ),
                ),
                $slash,
                $blank
            )
        )->asString();
    }
}