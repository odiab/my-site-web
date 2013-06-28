<?php
class Basic_StringTools extends PHPUnit_Framework_TestCase
{
  public function testStandardizeExtensionBasic() {
    // identity tests
    $ext = '.php';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));
    $ext = '.html';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));
    $ext = '.a';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));

    // adding . tests
    $ext = 'php';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));
    $ext = 'html';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));
    $ext = 'a';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));

    // multiple . identity tests
    $ext = '.php.out';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));
    $ext = '.html.o';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));
    $ext = '.a.o.i';
    $this->assertEquals($ext, StringTools::standardizeExtension($ext));

    // multiple . addition tests
    $ext = 'php.out';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));
    $ext = 'html.o';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));
    $ext = 'a.o.i';
    $this->assertEquals(".$ext", StringTools::standardizeExtension($ext));
  }
}
