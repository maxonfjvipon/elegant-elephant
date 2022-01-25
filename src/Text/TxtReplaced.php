<?php

namespace Maxonfjvipon\Elegant_Elephant\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Text replaced.
 * @package Maxonfjvipon\Elegant_Elephant\Text
 */
final class TxtReplaced
{
    /**
     * @param string $search
     * @return TxtReplacedWhat
     */
    public static function string(string $search): TxtReplacedWhat
    {
        return TxtReplaced::text(TextOf::string($search));
    }

    /**
     * @param Text $search
     * @return TxtReplacedWhat
     */
    public static function text(Text $search): TxtReplacedWhat
    {
        return new class($search) implements TxtReplacedWhat {
            /**
             * @var Text $search
             */
            private Text $search;

            /**
             * Ctor.
             * @param Text $search
             */
            public function __construct(Text $search)
            {
                $this->search = $search;
            }

            /**
             * @param string $replace
             * @return TxtReplacedTo
             */
            public function toString(string $replace): TxtReplacedTo
            {
                return $this->toText(TextOf::string($replace));
            }

            /**
             * @param Text $replace
             * @return TxtReplacedTo
             */
            public function toText(Text $replace): TxtReplacedTo
            {
                return new class($this->search, $replace) implements TxtReplacedTo {
                    /**
                     * @var Text $search
                     */
                    private Text $search;

                    /**
                     * @var Text $replace
                     */
                    private Text $replace;

                    /**
                     * Ctor.
                     * @param Text $search
                     * @param Text $replace
                     */
                    public function __construct(Text $search, Text $replace)
                    {
                        $this->search = $search;
                        $this->replace = $replace;
                    }

                    /**
                     * @param string $subject
                     * @return Text
                     */
                    public function inString(string $subject): Text
                    {
                        return $this->inText(TextOf::string($subject));
                    }

                    /**
                     * @param Text $subject
                     * @return Text
                     */
                    public function inText(Text $subject): Text
                    {
                        return new class($this->search, $this->replace, $subject) implements Text {
                            /**
                             * @var Text $search
                             */
                            private Text $search;

                            /**
                             * @var Text $replace
                             */
                            private Text $replace;

                            /**
                             * @var Text $subject
                             */
                            private Text $subject;

                            /**
                             * Ctor.
                             * @param Text $search
                             * @param Text $replace
                             * @param Text $subject
                             */
                            public function __construct(Text $search, Text $replace, Text $subject)
                            {
                                $this->search = $search;
                                $this->replace = $replace;
                                $this->subject = $subject;
                            }

                            /**
                             * @return string
                             */
                            public function asString(): string
                            {
                                return str_replace(
                                    $this->search->asString(),
                                    $this->replace->asString(),
                                    $this->subject->asString()
                                );
                            }
                        };
                    }
                };
            }
        };
    }
}