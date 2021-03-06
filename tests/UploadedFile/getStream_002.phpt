--TEST--
UploadedFile::getStream() after failed move
--FILE--
<?php
$path = sys_get_temp_dir() . '/uploadedfile';
file_put_contents($path, "foo");

$upload = new HttpMessage\UploadedFile($path);

try {
    @$upload->moveTo(sys_get_temp_dir() . '/nosuchdir/movedfile');
} catch (RuntimeException $e) {
    // expected
}

$stream = $upload->getStream();

var_dump($stream);
var_dump($stream->getMetadata('uri'));
var_dump((string)$stream);
var_dump($stream == $upload->getStream());

?>
--CLEAN--
<?php
if (file_exists(sys_get_temp_dir() . '/uploadedfile') {
    unlink(sys_get_temp_dir() . '/uploadedfile');
}
?>
--EXPECTF--
object(HttpMessage\Stream)#%d (1) {
  ["stream":"HttpMessage\Stream":private]=>
  resource(%d) of type (stream)
}
string(%d) "%s/uploadedfile"
string(3) "foo"
bool(true)