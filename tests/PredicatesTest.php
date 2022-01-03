<?php


namespace Maxonfjvipon\Elegant_Elephant\Tests;

use Error;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Numeric\NumericOf;
use Maxonfjvipon\Elegant_Elephant\Predicate\_And;
use Maxonfjvipon\Elegant_Elephant\Predicate\_False;
use Maxonfjvipon\Elegant_Elephant\Predicate\_Or;
use Maxonfjvipon\Elegant_Elephant\Predicate\_True;
use PHPUnit\Framework\TestCase;

class PredicatesTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testTrue(): void
    {
        $this->assertEquals(
            true,
            (new _True())->asBool()
        );
        $this->assertNotEquals(
            false,
            (new _True())->asBool()
        );
    }

    /**
     * @throws Exception
     */
    public function testFalse(): void
    {
        $this->assertEquals(
            false,
            (new _False())->asBool()
        );
        $this->assertNotEquals(
            true,
            (new _False())->asBool()
        );
    }

    /**
     * @throws Error
     * @throws Exception
     */
    public function testAnd(): void
    {
        $this->assertEquals(
            true,
            (new _And(
                new _True(),
                new _True(),
                new _And(
                    new _True(),
                    new _True(),
                )
            ))->asBool()
        );
        $this->assertNotEquals(
            true,
            (new _And(
                new _True(),
                new _False(),
            ))->asBool()
        );
        $this->expectError();
        $this->assertEquals(
            true,
            (new _And(
                new _True(),
                new NumericOf(5)
            ))->asBool()
        );
    }

    /**
     * @throws Error
     */
    public function testOr(): void
    {
        $this->assertEquals(
            true,
            (new _Or(
                new _True(),
                new _False(),
            ))->asBool()
        );
        $this->assertNotEquals(
            true,
            (new _Or(
                new _False(),
                new _False(),
            ))->asBool()
        );
        // check expectsError above
        $this->assertEquals(
            true,
            (new _Or(
                new _True(),
                new NumericOf(5)
            ))->asBool()
        );
    }
}