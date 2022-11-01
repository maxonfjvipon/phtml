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

use Maxonfjvipon\ElegantElephant\Arr\ArrCond;
use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;
use Maxonfjvipon\ElegantElephant\Logic\IsNotEmpty;
use Maxonfjvipon\ElegantElephant\Logic\LogicSticky;
use Maxonfjvipon\ElegantElephant\Logic\Not;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtCond;
use Maxonfjvipon\ElegantElephant\Txt\TxtIf;
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtTrimmed;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;
use Maxonfjvipon\Phtml\Attributes;
use Maxonfjvipon\Phtml\IsAttributes;
use Maxonfjvipon\Phtml\Tag;

/**
 * Tag with closing tag.
 *
 * @author Max Trunnikov <mtrunnikov@gmail.com>
 * @since 0.0.1
 */
final class TgPaired extends TxtWrap implements Tag
{
    /**
     * Ctor.
     * @param string $name Tag name
     * @param string|Txt|Attributes|Tag|null $any Tag or Attributes
     * @param string|Tag|Txt ...$elements Tags or texts
     */
    final public function __construct(
        string $name,
        string|Attributes|Tag|Txt|null $any = null,
        string|Tag|Txt ...$elements
    ) {
        parent::__construct(
            new TxtJoined([
                "<",
                new TxtCond(
                    $isAttrs = new LogicSticky(
                        new IsAttributes($any)
                    ),
                    TxtOf::func(fn () => new TxtTrimmed(
                        new TxtJoined([
                            "$name ",
                            $any
                        ])
                    )),
                    $name
                ),
                ">\n",
                new TxtIf(
                    $any !== null,
                    TxtOf::func(fn () => new TxtIf(
                        new IsNotEmpty(
                            $arr = new ArrSticky(
                                new ArrCond(
                                    $isAttrs,
                                    $elements,
                                    [$any, ...$elements]
                                ),
                            )
                        ),
                        TxtOf::func(fn () => new TxtJoined(
                            new ArrMapped(
                                $arr,
                                fn (string|Tag|Txt $element) => new TxtIf(
                                    new Not(new IsAttributes($element)),
                                    new TxtJoined([$element, "\n"])
                                )
                            )
                        ))
                    ))
                ),
                "</$name>"
            ])
        );
    }
}
