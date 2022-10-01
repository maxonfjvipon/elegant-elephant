<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtPregReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithSingleValues(): void
    {
        Assert::assertThat(
            TxtPregReplaced::new("/{[a-z_]+}/", "[0-9]+", '/projects/{project}/update')->asString(),
            new IsEqual('/projects/[0-9]+/update')
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function pregReplacedWithArrays(): void
    {
        Assert::assertThat(
            TxtPregReplaced::new(["/{[a-z_]+}/", "/\//"], ["[0-9]+", "\/"], '/projects/{project}/update')->asString(),
            new IsEqual('\/projects\/[0-9]+\/update')
        );
    }
}
