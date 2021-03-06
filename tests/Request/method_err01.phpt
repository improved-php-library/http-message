--TEST--
Request::withMethod() with invalid arguments
--FILE--
<?php
$request = new HttpMessage\Request();

try {
    $request->withMethod();
} catch (ArgumentCountError $e) {
    echo $e->getMessage(), "\n";
}

try {
    $request->withMethod(['foo', 'bar']);
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}

?>
--EXPECTF--
HttpMessage\Request::withMethod() expects exactly 1 %s, 0 given
HttpMessage\Request::withMethod()%sstring, array given
