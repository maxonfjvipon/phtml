<?php

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\IsAttributes;
use Maxonfjvipon\Phtml\Tag\TgUnpaired;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsAttributesTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function isAttributes(): void
    {
        $this->assertLogicThat(
            new IsAttributes(new Attributes([])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function isNotAttributes(): void
    {
        $this->assertLogicThat(
            new IsAttributes(new TgUnpaired('div')),
            new IsFalse()
        );
    }
}
