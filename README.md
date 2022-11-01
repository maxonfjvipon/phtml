# phtml

phtml is pure object-oriented HTML construction templating library for PHP with functional interface, inspired by [JavaTags](https://github.com/manlioGit/javatags) and [ScalaTags](https://github.com/lihaoyi/scalatags). 

This fragment:

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr, head, meta, title, link, text};

html5(attr([at::lang => 'en']),
  head(
    meta(attr([at::http_equiv => 'Content-Type', at::content => 'text/html', at::charset => 'UTF-8'])),
    title(text("Title")),
    link(attr(["href" => "/css/custom.css", "rel" => "stylesheet"]))
  )
)->asString();
```

will be turned into this html:

```html
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <title>Title</title>
    <link href='/css/custom.css' rel='stylesheet'/>
 </head>
</html>
```

## Getting started:

### Requirements

- PHP >= 8.0

### Installation

```
composer require maxonfjvipon/phtml
```

## Examples


### basic:

Library provides all html tags as functions with only one exception - `<var></var>`. PHP does not allow you to create function named `var` since as this word is reserved. So to create `<var></var>` tag use `_var` function.

This code

```php
use function Maxonfjvipon\Phtml\{html5, head, body, div, _var, text};

html5(
  head(),
  body(
    div(
      _var(text("Hello world!"))
    )
  )
)->asString();
```

will render you this html:
```html
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div>
      <var>Hello world!</var>
    </div>
  </body>
</html>
```

### Attributes:

To add attributes to your tag you should use `attr` function. Function accepts an array with arguments.
Array may has `'key' => 'value'` and just `'value'` elements:

```php
use function Maxonfjvipon\Phtml\{a, attr};

a(attr(['href' => '/some/url', "download"]))->asString(); // <a href='/some/url' download></a>
```

Attributes will render only if they are at the first place. Other attributes on other places will be ignored.
```php
use function Maxonfjvipon\Phtml\{a, attr};

div(attr(['class' => 'div']), div())->asString(); // <div class='div'><div></div></div>
div(div(), attr(['class' => 'div']))->asString(); // <div><div></div></div>
```

Library provides helper class `at` that contains all existed html attributes as consts.
You can use it in this way:

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr};

html5(attr([at::lang => "en"]))->asString(); // <!DOCTYPE html><html lang='en'></html>
```

#### Note!
`at::class` will return you `\Maxonfjvipon\Phtml\at` instead of expected `'class'`.

To get `'class'` string from `at` you can do `at::_class` or `at::$class`. Or you can just write it manually

```php
use Maxonfjvipon\Phtml\at;
use function Maxonfjvipon\Phtml\{html5, attr};

attr(['class' => 'main'])->asString(); // class='main'
attr([at::$class => 'main'])->asString(); // class='main'
attr([at::_class => 'main'])->asString(); // class='main'
```

### Helpers:
So if you want to use all available tags and functions you have to add this import 

**If you know how to make this import shorter - please let me know**.

Keep in mind that some tag functions have the same name as built php functions (like `\header()`, `\time()`, etc). 
So make sure that you have imported these functions before using them.
```php
use function Maxonfjvipon\Phtml\{
    text,
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
```
