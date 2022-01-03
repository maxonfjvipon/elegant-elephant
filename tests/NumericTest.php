<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numeric\Decremented;
use Maxonfjvipon\Elegant_Elephant\Numeric\Divided;
use Maxonfjvipon\Elegant_Elephant\Numeric\Incremented;
use Maxonfjvipon\Elegant_Elephant\Numeric\Multiplied;
use Maxonfjvipon\Elegant_Elephant\Numeric\Just;
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
            (new Just(5))->asNumber()
        );
        $this->expectError();
        $this->expectErrorMessage('Should be converted to numeric');
        $this->assertEquals(
            5,
            (new Just('s'))->asNumber()
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
                new Just(4),
                new Just(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            10,
            (new Plused(
                new Just(4),
                new Just(3)
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
                new Just(7),
                new Just(4),
            ))->asNumber()
        );
        $this->assertNotEquals(
            3,
            (new Subtracted(
                new Just(10),
                new Just(5)
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
                new Just(2),
                new Just(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            25,
            (new Multiplied(
                new Just(5),
                new Just(4)
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
                new Just(6),
                new Just(3),
            ))->asNumber()
        );
        $this->assertNotEquals(
            5,
            (new Divided(
                new Just(25),
                new Just(4)
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
                new Just(2)
            ))->asNumber()
        );
        $this->assertNotEquals(
            10,
            (new Incremented(
                new Just(5)
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
                new Just(6)
            ))->asNumber()
        );
        $this->assertNotEquals(
            5,
            (new Decremented(
                new Just(7)
            ))->asNumber()
        );
    }
}