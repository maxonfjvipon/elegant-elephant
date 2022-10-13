<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMappedKeyValue;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\LogicalAnd;


final class ArrMappedKeyValueTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function mappedWithKeyAndValue(): void
    {
        $given = [
            'foo' => 1,
            'bar' => 2,
            'baz' => 3
        ];
        $result = [
            'foo' => 'foo1',
            'bar' => 'bar2',
            'baz' => 'baz3',
        ];
        $this->assertScalarThat(
            ArrMappedKeyValue(
                $given,
                fn ($key, $value) => $key . $value
            )->value(),
            new IsEqual($result)
        );
    }
}
