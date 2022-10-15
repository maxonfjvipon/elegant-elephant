<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrCast;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Boolean\Not;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrCastTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrCastWorks(): void
    {
        $this->assertMixedCastThat(
            new ArrCast([
                42, // int
                12.5, // float
                'hello there', // string
                ['foo', 'bar'], // array
                true, // boolean
                new SumOf(2, 3), // Number
                new TxtUpper("foo"), // Text
                new ArrObject('key', 'value'), // Arrayable
                new BooleanOf(true), // Boolean
                new FirstOf([1, 2, 3]), // Scalar
            ]),
            new IsEqual([
                42,
                12.5,
                'hello there',
                ['foo', 'bar'],
                true,
                5,
                'FOO',
                ['key' => 'value'],
                true,
                1
            ])
        );
    }
}
