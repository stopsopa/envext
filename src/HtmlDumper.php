<?php

namespace Stopsopa\VarDumper;

use Symfony\Component\VarDumper\Dumper\HtmlDumper as BaseHtmlDumper;

class HtmlDumper extends BaseHtmlDumper {
    protected function style($style, $value, $attr = array())
    {
        return preg_replace(
            '#<abbr title="([^"]+)" class=[^>]*>[^<]+</abbr>#',
            '<abbr title="$1" class=sf-dump-note>$1</abbr>',
            parent::style($style, $value, $attr)
        );
    }
}

