<?php

namespace Maxonfjvipon\Elegant_Elephant\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use TypeError;

/**
 * Numerable of.
 * @package Maxonfjvipon\Elegant_Elephant\Numerable
 */
final class NumerableOf implements Numerable
{
    /**
     * @var string $origin
     */
    private string $origin;

    /**
     * @param float $num
     * @return NumerableOf
     */
    public static function float(float $num): NumerableOf
    {
        return NumerableOf::string($num);
    }

    /**
     * @param int $num
     * @return NumerableOf
     */
    public static function int(int $num): NumerableOf
    {
        return NumerableOf::string($num);
    }

    /**
     * @param string $str
     * @return NumerableOf
     */
    public static function string(string $str): NumerableOf
    {
        return new self($str);
    }

    /**
     * Ctor.
     * @param string $str
     */
    private function __construct(string $str)
    {
        $this->origin = $str;
    }

    /**
     * @inheritDoc
     */
    public function asNumber(): string
    {
        return $this->origin;
    }
}