<?php

namespace Maxonfjvipon\Phtml\Tests;

use Exception;
use Maxonfjvipon\Phtml\at;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;

use PHPUnit\Framework\Constraint\StringStartsWith;

use function Maxonfjvipon\Phtml\{text,
    unpaired,
    paired,
    a,
    abbr,
    address,
    article,
    aside,
    audio,
    b,
    bdi,
    ddo,
    blockquote,
    body,
    button,
    canvas,
    caption,
    cite,
    code,
    colgroup,
    data,
    datalist,
    dd,
    del,
    dfn,
    div,
    dl,
    dt,
    em,
    fieldset,
    figcaption,
    figure,
    footer,
    form,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    head,
    header,
    i,
    iframe,
    ins,
    kbd,
    label,
    legend,
    li,
    main,
    map,
    mark,
    meter,
    nav,
    noscript,
    object,
    ol,
    optgroup,
    option,
    output,
    p,
    pre,
    progress,
    q,
    rb,
    rp,
    rt,
    rtc,
    ruby,
    s,
    samp,
    script,
    section,
    select,
    small,
    span,
    strong,
    style,
    sub,
    sup,
    table,
    tbody,
    td,
    template,
    textarea,
    tfoot,
    th,
    thead,
    time,
    title,
    tr,
    u,
    ul,
    video,
    attr,
    tags,
    br,
    html5,
    area,
    base,
    col,
    command,
    embed,
    hr,
    img,
    input,
    link,
    meta,
    param,
    source,
    track,
    wbr,
    _var,
    xmp
};

final class PhtmlTagsTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function unpairedWithoutAttributes(): void
    {
        $this->assertTxtThat(
            unpaired("div"),
            new IsEqual("<div/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function unpairedWithAttributes(): void
    {
        $this->assertTxtThat(
            unpaired("div", attr(['class' => "base", 'id' => "42"])),
            new IsEqual("<div class='base' id='42'/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pairedWithoutAttributesAndInnerTags(): void
    {
        $this->assertTxtThat(
            paired("div"),
            new IsEqual("<div>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pairedWithAttributesWithoutInnerTags(): void
    {
        $this->assertTxtThat(
            paired("div", attr(['class' => 'base', 'id' => "21"])),
            new IsEqual("<div class='base' id='21'>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pairedWithAttributesWithInnerTags(): void
    {
        $this->assertTxtThat(
            paired("div", attr(['class' => 'base']), div(), a()),
            new IsEqual("<div class='base'>\n<div>\n</div>\n<a>\n</a>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pairedWithoutAttributesWithInnerTags(): void
    {
        $this->assertTxtThat(
            paired("div", div(), br()),
            new IsEqual("<div>\n<div>\n</div>\n<br/>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function emptyattr(): void
    {
        $this->assertTxtThat(
            attr(),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function notEmptyattr(): void
    {
        $this->assertTxtThat(
            attr(['class' => 'base', 'id' => 'jeff']),
            new IsEqual("class='base' id='jeff'")
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function emptyTags(): void
    {
        $this->assertTxtThat(
            tags(),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function notEmptyTags(): void
    {
        $this->assertTxtThat(
            tags(div(attr(['id' => 'div'])), a(), br()),
            new IsEqual("<div id='div'>\n</div>\n<a>\n</a>\n<br/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function html5Tag(): void
    {
        $this->assertTxtThat(
            html5(),
            new IsEqual("<!DOCTYPE html>\n<html>\n</html>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function aTag(): void
    {
        $this->assertTxtThat(
            a(),
            new IsEqual("<a>\n</a>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function abbrTag(): void
    {
        $this->assertTxtThat(
            abbr(),
            new IsEqual("<abbr>\n</abbr>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function addressTag(): void
    {
        $this->assertTxtThat(
            address(),
            new IsEqual("<address>\n</address>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function articleTag(): void
    {
        $this->assertTxtThat(
            article(),
            new IsEqual("<article>\n</article>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function asideTag(): void
    {
        $this->assertTxtThat(
            aside(),
            new IsEqual("<aside>\n</aside>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function audioTag(): void
    {
        $this->assertTxtThat(
            audio(),
            new IsEqual("<audio>\n</audio>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function bTag(): void
    {
        $this->assertTxtThat(
            b(),
            new IsEqual("<b>\n</b>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function bdiTag(): void
    {
        $this->assertTxtThat(
            bdi(),
            new IsEqual("<bdi>\n</bdi>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function ddoTag(): void
    {
        $this->assertTxtThat(
            ddo(),
            new IsEqual("<ddo>\n</ddo>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function blockquoteTag(): void
    {
        $this->assertTxtThat(
            blockquote(),
            new IsEqual("<blockquote>\n</blockquote>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function bodyTag(): void
    {
        $this->assertTxtThat(
            body(),
            new IsEqual("<body>\n</body>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function buttonTag(): void
    {
        $this->assertTxtThat(
            button(),
            new IsEqual("<button>\n</button>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function canvasTag(): void
    {
        $this->assertTxtThat(
            canvas(),
            new IsEqual("<canvas>\n</canvas>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function captionTag(): void
    {
        $this->assertTxtThat(
            caption(),
            new IsEqual("<caption>\n</caption>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function citeTag(): void
    {
        $this->assertTxtThat(
            cite(),
            new IsEqual("<cite>\n</cite>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function codeTag(): void
    {
        $this->assertTxtThat(
            code(),
            new IsEqual("<code>\n</code>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function colgroupTag(): void
    {
        $this->assertTxtThat(
            colgroup(),
            new IsEqual("<colgroup>\n</colgroup>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function dataTag(): void
    {
        $this->assertTxtThat(
            data(),
            new IsEqual("<data>\n</data>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function datalistTag(): void
    {
        $this->assertTxtThat(
            datalist(),
            new IsEqual("<datalist>\n</datalist>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function ddTag(): void
    {
        $this->assertTxtThat(
            dd(),
            new IsEqual("<dd>\n</dd>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function delTag(): void
    {
        $this->assertTxtThat(
            del(),
            new IsEqual("<del>\n</del>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function dfnTag(): void
    {
        $this->assertTxtThat(
            dfn(),
            new IsEqual("<dfn>\n</dfn>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function divTag(): void
    {
        $this->assertTxtThat(
            div(),
            new IsEqual("<div>\n</div>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function dlTag(): void
    {
        $this->assertTxtThat(
            dl(),
            new IsEqual("<dl>\n</dl>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function dtTag(): void
    {
        $this->assertTxtThat(
            dt(),
            new IsEqual("<dt>\n</dt>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function emTag(): void
    {
        $this->assertTxtThat(
            em(),
            new IsEqual("<em>\n</em>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function fieldsetTag(): void
    {
        $this->assertTxtThat(
            fieldset(),
            new IsEqual("<fieldset>\n</fieldset>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function figcaptionTag(): void
    {
        $this->assertTxtThat(
            figcaption(),
            new IsEqual("<figcaption>\n</figcaption>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function figureTag(): void
    {
        $this->assertTxtThat(
            figure(),
            new IsEqual("<figure>\n</figure>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function footerTag(): void
    {
        $this->assertTxtThat(
            footer(),
            new IsEqual("<footer>\n</footer>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function formTag(): void
    {
        $this->assertTxtThat(
            form(),
            new IsEqual("<form>\n</form>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h1Tag(): void
    {
        $this->assertTxtThat(
            h1(),
            new IsEqual("<h1>\n</h1>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h2Tag(): void
    {
        $this->assertTxtThat(
            h2(),
            new IsEqual("<h2>\n</h2>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h3Tag(): void
    {
        $this->assertTxtThat(
            h3(),
            new IsEqual("<h3>\n</h3>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h4Tag(): void
    {
        $this->assertTxtThat(
            h4(),
            new IsEqual("<h4>\n</h4>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h5Tag(): void
    {
        $this->assertTxtThat(
            h5(),
            new IsEqual("<h5>\n</h5>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function h6Tag(): void
    {
        $this->assertTxtThat(
            h6(),
            new IsEqual("<h6>\n</h6>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function headTag(): void
    {
        $this->assertTxtThat(
            head(),
            new IsEqual("<head>\n</head>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function headerTag(): void
    {
        $this->assertTxtThat(
            header(),
            new IsEqual("<header>\n</header>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function iTag(): void
    {
        $this->assertTxtThat(
            i(),
            new IsEqual("<i>\n</i>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function iframeTag(): void
    {
        $this->assertTxtThat(
            iframe(),
            new IsEqual("<iframe>\n</iframe>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function insTag(): void
    {
        $this->assertTxtThat(
            ins(),
            new IsEqual("<ins>\n</ins>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function kbdTag(): void
    {
        $this->assertTxtThat(
            kbd(),
            new IsEqual("<kbd>\n</kbd>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function labelTag(): void
    {
        $this->assertTxtThat(
            label(),
            new IsEqual("<label>\n</label>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function legendTag(): void
    {
        $this->assertTxtThat(
            legend(),
            new IsEqual("<legend>\n</legend>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function liTag(): void
    {
        $this->assertTxtThat(
            li(),
            new IsEqual("<li>\n</li>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mainTag(): void
    {
        $this->assertTxtThat(
            main(),
            new IsEqual("<main>\n</main>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mapTag(): void
    {
        $this->assertTxtThat(
            map(),
            new IsEqual("<map>\n</map>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function markTag(): void
    {
        $this->assertTxtThat(
            mark(),
            new IsEqual("<mark>\n</mark>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function meterTag(): void
    {
        $this->assertTxtThat(
            meter(),
            new IsEqual("<meter>\n</meter>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function navTag(): void
    {
        $this->assertTxtThat(
            nav(),
            new IsEqual("<nav>\n</nav>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function noscriptTag(): void
    {
        $this->assertTxtThat(
            noscript(),
            new IsEqual("<noscript>\n</noscript>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function objectTag(): void
    {
        $this->assertTxtThat(
            object(),
            new IsEqual("<object>\n</object>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function olTag(): void
    {
        $this->assertTxtThat(
            ol(),
            new IsEqual("<ol>\n</ol>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function optgroupTag(): void
    {
        $this->assertTxtThat(
            optgroup(),
            new IsEqual("<optgroup>\n</optgroup>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function optionTag(): void
    {
        $this->assertTxtThat(
            option(),
            new IsEqual("<option>\n</option>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function outputTag(): void
    {
        $this->assertTxtThat(
            output(),
            new IsEqual("<output>\n</output>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function pTag(): void
    {
        $this->assertTxtThat(
            p(),
            new IsEqual("<p>\n</p>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function preTag(): void
    {
        $this->assertTxtThat(
            pre(),
            new IsEqual("<pre>\n</pre>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function progressTag(): void
    {
        $this->assertTxtThat(
            progress(),
            new IsEqual("<progress>\n</progress>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function qTag(): void
    {
        $this->assertTxtThat(
            q(),
            new IsEqual("<q>\n</q>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function rbTag(): void
    {
        $this->assertTxtThat(
            rb(),
            new IsEqual("<rb>\n</rb>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function rpTag(): void
    {
        $this->assertTxtThat(
            rp(),
            new IsEqual("<rp>\n</rp>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function rtTag(): void
    {
        $this->assertTxtThat(
            rt(),
            new IsEqual("<rt>\n</rt>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function rtcTag(): void
    {
        $this->assertTxtThat(
            rtc(),
            new IsEqual("<rtc>\n</rtc>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function rubyTag(): void
    {
        $this->assertTxtThat(
            ruby(),
            new IsEqual("<ruby>\n</ruby>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function sTag(): void
    {
        $this->assertTxtThat(
            s(),
            new IsEqual("<s>\n</s>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function sampTag(): void
    {
        $this->assertTxtThat(
            samp(),
            new IsEqual("<samp>\n</samp>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function scriptTag(): void
    {
        $this->assertTxtThat(
            script(),
            new IsEqual("<script>\n</script>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function sectionTag(): void
    {
        $this->assertTxtThat(
            section(),
            new IsEqual("<section>\n</section>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function selectTag(): void
    {
        $this->assertTxtThat(
            select(),
            new IsEqual("<select>\n</select>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function smallTag(): void
    {
        $this->assertTxtThat(
            small(),
            new IsEqual("<small>\n</small>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function spanTag(): void
    {
        $this->assertTxtThat(
            span(),
            new IsEqual("<span>\n</span>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function strongTag(): void
    {
        $this->assertTxtThat(
            strong(),
            new IsEqual("<strong>\n</strong>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function styleTag(): void
    {
        $this->assertTxtThat(
            style(),
            new IsEqual("<style>\n</style>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function subTag(): void
    {
        $this->assertTxtThat(
            sub(),
            new IsEqual("<sub>\n</sub>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function supTag(): void
    {
        $this->assertTxtThat(
            sup(),
            new IsEqual("<sup>\n</sup>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tableTag(): void
    {
        $this->assertTxtThat(
            table(),
            new IsEqual("<table>\n</table>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tbodyTag(): void
    {
        $this->assertTxtThat(
            tbody(),
            new IsEqual("<tbody>\n</tbody>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tdTag(): void
    {
        $this->assertTxtThat(
            td(),
            new IsEqual("<td>\n</td>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function templateTag(): void
    {
        $this->assertTxtThat(
            template(),
            new IsEqual("<template>\n</template>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textareaTag(): void
    {
        $this->assertTxtThat(
            textarea(),
            new IsEqual("<textarea>\n</textarea>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tfootTag(): void
    {
        $this->assertTxtThat(
            tfoot(),
            new IsEqual("<tfoot>\n</tfoot>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function thTag(): void
    {
        $this->assertTxtThat(
            th(),
            new IsEqual("<th>\n</th>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function theadTag(): void
    {
        $this->assertTxtThat(
            thead(),
            new IsEqual("<thead>\n</thead>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function timeTag(): void
    {
        $this->assertTxtThat(
            time(),
            new IsEqual("<time>\n</time>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function titleTag(): void
    {
        $this->assertTxtThat(
            title(),
            new IsEqual("<title>\n</title>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function trTag(): void
    {
        $this->assertTxtThat(
            tr(),
            new IsEqual("<tr>\n</tr>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function uTag(): void
    {
        $this->assertTxtThat(
            u(),
            new IsEqual("<u>\n</u>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function ulTag(): void
    {
        $this->assertTxtThat(
            ul(),
            new IsEqual("<ul>\n</ul>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function varTag(): void
    {
        $this->assertTxtThat(
            _var(),
            new IsEqual("<var>\n</var>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function videoTag(): void
    {
        $this->assertTxtThat(
            video(),
            new IsEqual("<video>\n</video>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function xmpTag(): void
    {
        $this->assertTxtThat(
            xmp(),
            new IsEqual("<xmp>\n</xmp>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function areaTag(): void
    {
        $this->assertTxtThat(
            area(),
            new IsEqual("<area/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function baseTag(): void
    {
        $this->assertTxtThat(
            base(),
            new IsEqual("<base/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function brTag(): void
    {
        $this->assertTxtThat(
            br(),
            new IsEqual("<br/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function colTag(): void
    {
        $this->assertTxtThat(
            col(),
            new IsEqual("<col/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function commandTag(): void
    {
        $this->assertTxtThat(
            command(),
            new IsEqual("<command/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function embedTag(): void
    {
        $this->assertTxtThat(
            embed(),
            new IsEqual("<embed/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function hrTag(): void
    {
        $this->assertTxtThat(
            hr(),
            new IsEqual("<hr/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function imgTag(): void
    {
        $this->assertTxtThat(
            img(),
            new IsEqual("<img/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function inputTag(): void
    {
        $this->assertTxtThat(
            input(),
            new IsEqual("<input/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function linkTag(): void
    {
        $this->assertTxtThat(
            link(),
            new IsEqual("<link/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function metaTag(): void
    {
        $this->assertTxtThat(
            meta(),
            new IsEqual("<meta/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function paramTag(): void
    {
        $this->assertTxtThat(
            param(),
            new IsEqual("<param/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function sourceTag(): void
    {
        $this->assertTxtThat(
            source(),
            new IsEqual("<source/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function trackTag(): void
    {
        $this->assertTxtThat(
            track(),
            new IsEqual("<track/>")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function wbrTag(): void
    {
        $this->assertTxtThat(
            wbr(),
            new IsEqual("<wbr/>")
        );
    }

    /**
     * @group skip
     * @test
     * @return void
     * @throws Exception
     */
    public function simpleHtml(): void
    {
        $this->assertTxtThat(
            html5(
                attr([at::lang => 'en']),
                head(
                    meta(attr([at::http_equiv => 'Content-Type', at::content => 'text/html', at::charset => 'UTF-8'])),
                    title(text("Title")),
                    link(attr(["href" => "/css/custom.css", "rel" => "stylesheet"]))
                )
            ),
            new IsEqual("<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html' charset='UTF-8'/>
<title>
Title
</title>
<link href='/css/custom.css' rel='stylesheet'/>
</head>
</html>")
        );
    }

    /**
     * @group skip
     * @test
     * @return void
     * @throws Exception
     */
    public function complexHtml(): void
    {
        $this->assertTxtThat(
            html5(
                attr([at::lang => "ru"]),
                head(
                    meta(attr([at::http_equiv => "Content-Type", at::content => "text/html", at::charset => "UTF-8"])),
                    meta(attr([at::http_equiv => "X-UA-Compatible", at::content => "IE=edge"])),
                    meta(attr([at::name => 'viewport', at::content => "width=device-width, initial-scale=1"])),
                    title(text("Gentellela Alela!")),
                    link(attr([at::href => "/css/bootstrap.css", at::rel => "stylesheet"])),
                    link(attr([at::href => "/css/font-awesome.css", at::rel => "stylesheet"])),
                    link(attr([at::href => '/css/nprogress.css', at::rel => 'stylesheet'])),
                    link(attr([at::href => '/css/custom.css', at::rel => 'stylesheet']))
                ),
                body(
                    attr(['class' => "nav-md"]),
                    div(
                        attr(['class' => 'container-body']),
                        div(
                            attr(['class' => 'main-container']),
                            div(
                                attr(['class' => 'col-md-3 left_col']),
                                div(
                                    attr(['class' => 'left_col scroll-view']),
                                    div(
                                        attr(['class' => 'navbar nav_title', at::style => 'border: 0;']),
                                        a(
                                            attr([at::href => "xx", 'class' => "site_title"]),
                                            i(attr(["class" => "fa fa-paw"])),
                                            span(text("Gentellela Alela!"))
                                        )
                                    ),
                                    tags(...array_map(
                                        fn ($num) => div(attr(['class' => "item$num"])),
                                        [1, 2, 3, 4]
                                    )),
                                    div(attr(["class" => "clearfix"])),
                                    div(
                                        attr(['class' => 'profile']),
                                        div(
                                            attr(['class' => "profile_pic"]),
                                            img(attr([at::src => "/images/site/img.jpg", at::alt => '...', 'class' => 'img-circle profile_img']))
                                        ),
                                        div(
                                            attr(['class' => 'profile_info']),
                                            span(text("Welcome")),
                                            h2(text("John Doe"))
                                        )
                                    ),
                                    br(),
                                )
                            )
                        )
                    )
                )
            ),
            new StringStartsWith("<!DOCTYPE html>\n<html")
        );
    }
}
