<?php
/**
 * MIT License
 *
 * Copyright (c) 2022 Max Trunnikov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
declare(strict_types=1);

namespace Maxonfjvipon\Phtml\Tag;

use Maxonfjvipon\ElegantElephant\Txt\TxtCond;
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtTrimmed;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\Tag;

/**
 * Self-closing tag.
 *
 * @author Max Trunnikov <mtrunnikov@gmail.com>
 * @since 0.0.1
 */
final class TgUnpaired extends TxtWrap implements Tag
{
    /**
     * Ctor.
     * @param string $name Tag name
     * @param Attributes|null $attributes Attributes
     */
    final public function __construct(string $name, ?Attributes $attributes = null)
    {
        parent::__construct(
            new TxtJoined([
                "<",
                new TxtTrimmed(
                    new TxtCond(
                        !!$attributes,
                        TxtOf::func(fn () => new TxtJoined([ /** @phpstan-ignore-line */
                            "$name ",
                            $attributes
                        ])),
                        $name
                    )
                ),
                "/>"
            ])
        );
    }
}
