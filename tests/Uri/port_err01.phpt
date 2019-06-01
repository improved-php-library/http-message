--TEST--
Uri::withPort() error: invalid argument
--FILE--
<?php
try {
    (new HttpMessage\Uri)->withPort(['port' => 80]);
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
?>
--EXPECT--
HttpMessage\Uri::withPort() expects parameter 1 to be integer, array given