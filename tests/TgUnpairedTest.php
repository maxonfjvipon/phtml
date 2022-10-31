<?php

declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\Tag\TgUnpaired;
use PHPUnit\Framework\Constraint\IsEqual;

final class TgUnpairedTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    final public function withoutAttributes(): void
    {
        $this->assertTxtThat(
            new TgUnpaired("html"),
            new IsEqual("<html/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    final public function withAttributes(): void
    {
        $this->assertTxtThat(
            new TgUnpaired(
                "html",
                new Attributes([
                    'class' => "main-html",
                    'id' => 'lmth'
                ])
            ),
            new IsEqual("<html class='main-html' id='lmth'/>")
        );
    }


}
