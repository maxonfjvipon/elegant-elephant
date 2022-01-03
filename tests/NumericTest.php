<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numeric\Decremented;
use Maxonfjvipon\Elegant_Elephant\Numeric\Divided;
use Maxonfjvipon\Elegant_Elephant\Numeric\Incremented;
use Maxonfjvipon\Elegant_Elephant\Numeric\Multiplied;
use Maxonfjvipon\Elegant_Elephant\Numeric\NumericOf;
use Maxonfjvipon\Elegant_Elephant\Numeric\Plused;
use Maxonfjvipon\Elegant_Elephant\Numeric\Subtracted;
use PHPUnit\Framework\TestCase;

final class NumericTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testNumericOf(): void
    {
        $this->assertEquals(
            5,
            (new NumericOf(5))->asNumber()
        );
        $this->expectError();
        $this->expectErrorMessage('Should be converted to numeric');
        $this->assertEquals(
            5,
            (new NumericOf('s'))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testPlused(): void
    {
        $this->assertEquals(
            7,
            (new Plused(
                new NumericOf(4),
                new NumericOf(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            10,
            (new Plused(
                new NumericOf(4),
                new NumericOf(3)
            ))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testSubtracted(): void
    {
        $this->assertEquals(
            3,
            (new Subtracted(
                new NumericOf(7),
                new NumericOf(4),
            ))->asNumber()
        );
        $this->assertNotEquals(
            3,
            (new Subtracted(
                new NumericOf(10),
                new NumericOf(5)
            ))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testMultiplied(): void
    {
        $this->assertEquals(
            6,
            (new Multiplied(
                new NumericOf(2),
                new NumericOf(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            25,
            (new Multiplied(
                new NumericOf(5),
                new NumericOf(4)
            ))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testDivided(): void
    {
        $this->assertEquals(
            2,
            (new Divided(
                new NumericOf(6),
                new NumericOf(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            5,
            (new Divided(
                new NumericOf(25),
                new NumericOf(4)
            ))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testIncremented(): void
    {
        $this->assertEquals(
            3,
            (new Incremented(
                new NumericOf(2)
            ))->asNumber()
        );
        $this->assertNotEquals(
            10,
            (new Incremented(
                new NumericOf(5)
            ))->asNumber()
        );
    }

    /**
     * @throws Exception
     */
    public function testDecremented(): void
    {
        $this->assertEquals(
            5,
            (new Decremented(
                new NumericOf(6)
            ))->asNumber()
        );
        $this->assertNotEquals(
            5,
            (new Decremented(
                new NumericOf(7)
            ))->asNumber()
        );
    }
}