<?php

namespace Stopsopa\VarDumper;

use Symfony\Component\VarDumper\Dumper\HtmlDumper as BaseHtmlDumper;

class HtmlDumper extends BaseHtmlDumper {
    public static $jssent = false;
    public static function getJs() {

        $span = '<span class="_toggle_dumper" style="float: right; padding-right: 4px; cursor: pointer;">▶</span>';

        if (static::$jssent) {
            return $span;
        }

        static::$jssent = true;

        ob_start();
        echo $span;
?>
<script>
    (function (a, b) {
        document.addEventListener('DOMContentLoaded', function () {
            if (!window._toggle_dumper) {
                window._toggle_dumper = true;
                [].forEach.call(document.querySelectorAll('._toggle_dumper'), function (td) {
                    var open = true;
                    td.addEventListener('click', function () {
                        (function loop(l) {
                            l = td.parentNode.nextSibling.nextSibling.nextSibling;
                            if (l) {
                                l = l.querySelectorAll(open ? '.sf-dump-compact' : '.sf-dump-expanded');
                                td.innerHTML = open ? a : b;
                                if (l.length) {
                                    [].forEach.call(l, function (e) {
                                        e = e.previousSibling;
                                        if (e) {
                                            if (e.onclick) {
                                                e.onclick();
                                            } else if (e.click) {
                                                e.click();
                                            }
                                        }
                                    });
                                    loop();
                                }
                                else {
                                    open = !open;
                                }
                            }
                        }());
                    });
                });
            }
        })
    }('▼', '▶'));
</script>
<?php
        return ob_get_clean();
    }
    protected function style($style, $value, $attr = array())
    {
        return preg_replace(
            '#<abbr title="([^"]+)" class=[^>]*>[^<]+</abbr>#',
            '<abbr title="$1" class="sf-dump-note" style="cursor: default;">$1</abbr>',
            parent::style($style, $value, $attr)
        );
    }
}

