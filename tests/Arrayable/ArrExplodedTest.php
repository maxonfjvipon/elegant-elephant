<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

class ArrExplodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $arr = ['foo', 'bar'];
        $separator = "-";
        $string = "foo-bar";
        $this->assertEquals(
            $arr,
            ArrExploded::byText(TextOf::string($separator))->ofText(TextOf::string($string))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrExploded::byText(TextOf::string($separator))->ofString($string)->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrExploded::byString($separator)->ofText(TextOf::string($string))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrExploded::byString($separator)->ofString($string)->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrExploded::byString(",")->ofString($string)->asArray()
        );
    }

    /**
     * @throws Exception
     */
    public function testByComma(): void
    {
        $arr = ['foo', 'bar'];
        $string = "foo,bar";
        $this->assertEquals(
            $arr,
            ArrExploded::byComma()->ofText(TextOf::string($string))->asArray()
        );
        $this->assertEquals(
            $arr,
            ArrExploded::byComma()->ofString($string)->asArray()
        );
        $this->assertNotEquals(
            $arr,
            ArrExploded::byComma()->ofString("foo-bar")->asArray()
        );
    }
}