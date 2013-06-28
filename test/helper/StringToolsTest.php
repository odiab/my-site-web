<?php
class StringToolsTest extends PHPUnit_Framework_TestCase
{
  public function testStandardizeExtension() {
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

    // empty extension
    $ext = '';
    $this->assertEquals(NULL, StringTools::standardizeExtension($ext));
    $ext = '.';
    $this->assertEquals(NULL, StringTools::standardizeExtension($ext));
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testStandardizeExtensionNonstring()
  {
    StringTools::standardizeExtension(0);
  }

  /**
   * @depends testStandardizeExtension
   */
  public function testRemoveExtension()
  {
    // correct on normal input
    $path = 'test.php';
    $ext = '.php';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));
    $ext = 'php';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));

    // longer
    $path = 'test.meowlord';
    $ext = '.meowlord';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));
    $ext = 'meowlord';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));

    // multiple dots in extension
    $path = 'test.tar.gz';
    $ext = '.tar.gz';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));
    $ext = 'tar.gz';
    $this->assertEquals('test', StringTools::removeExtension($path, $ext));

    // different extensions
    $path = 'test.tar.gz';
    $ext = '.html';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));
    $ext = 'html';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));

    // partial extension
    $ext = 'ph';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));
    $ext = 'hp';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));
    $ext = '.ph';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));
    $ext = '.hp';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));

    // empty path
    $path = '';
    $ext = '.hp';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));

    // result: empty path
    $path = '.hp';
    $ext = '.hp';
    $this->assertEquals('', StringTools::removeExtension($path, $ext));

    // longer extension than file name
    $path = 'a.b';
    $ext = 'meowlord';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));
    // +1 than file name
    $ext = 'abc';
    $this->assertEquals($path, StringTools::removeExtension($path, $ext));

    // multiple path
    $path = '.hp.hp.hp';
    $ext = '.hp';
    $this->assertEquals('.hp.hp', StringTools::removeExtension($path, $ext));
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testRemoveExtensionNonstringPath()
  {
    StringTools::removeExtension(0, 'a');
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testRemoveExtensionNonstringExt()
  {
    StringTools::removeExtension('test.php', 0);
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testRemoveExtensionEmptyExt()
  {
    StringTools::removeExtension('test.php', '');
  }

  /**
   * @depends testStandardizeExtension
   */
  public function testAddExtension()
  {
    // not there
    $path = 'test';
    $ext = '.php';
    $this->assertEquals($path . $ext, StringTools::addExtension($path, $ext));
    $ext = 'php';
    $this->assertEquals("$path.$ext", StringTools::addExtension($path, $ext));

    // already there
    $path = 'test.php';
    $ext = '.php';
    $this->assertEquals($path, StringTools::addExtension($path, $ext));
    $ext = 'php';
    $this->assertEquals($path, StringTools::addExtension($path, $ext));

    // embedded extension (should add)
    $path = 'test.php.out';
    $ext = '.php';
    $this->assertEquals($path . $ext, StringTools::addExtension($path, $ext));
    $ext = 'php';
    $this->assertEquals("$path.$ext", StringTools::addExtension($path, $ext));

    // dot at end of path (should add)
    $path = 'test.php.';
    $ext = '.php';
    $this->assertEquals($path . $ext, StringTools::addExtension($path, $ext));
    $ext = 'php';
    $this->assertEquals("$path.$ext", StringTools::addExtension($path, $ext));

    // other extension
    $path = 'test';
    $ext = '.meowlord';
    $this->assertEquals($path . $ext, StringTools::addExtension($path, $ext));
    $ext = 'meowlord';
    $this->assertEquals("$path.$ext", StringTools::addExtension($path, $ext));
    $path = 'test.meowlord';
    $ext = '.meowlord';
    $this->assertEquals($path, StringTools::addExtension($path, $ext));
    $ext = 'meowlord';
    $this->assertEquals($path, StringTools::addExtension($path, $ext));
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testAddExtensionNonstringPath()
  {
    StringTools::addExtension(0, 'a');
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testAddExtensionNonstringExt()
  {
    StringTools::addExtension('test.php', 0);
  }

  /**
   * @depends testStandardizeExtension
   * @expectedException InvalidArgumentException
   */
  public function testAddExtensionEmptyExt()
  {
    StringTools::addExtension('test.php', '');
  }

  public function testStandardizeSlashes()
  {
    // empty string
    $path = '';
    $this->assertEquals($path, StringTools::standardizeSlashes($path));

    // root dir
    $path = '/';
    $this->assertEquals('', StringTools::standardizeSlashes($path));

    // slash slash
    $path = '//';
    $this->assertEquals('', StringTools::standardizeSlashes($path));

    // slash slash slash
    $path = '///';
    $this->assertEquals('/', StringTools::standardizeSlashes($path));

    // slash slash slash slash
    $path = '////';
    $this->assertEquals('//', StringTools::standardizeSlashes($path));

    // no leading or trailing
    $path = 'ab/cd/ef/g';
    $this->assertEquals($path, StringTools::standardizeSlashes($path));

    // only trailing
    $correct = 'ab/cd/ef/g';
    $path = 'ab/cd/ef/g/';
    $this->assertEquals($correct, StringTools::standardizeSlashes($path));

    // only leading
    $path = '/ab/cd/ef/g';
    $this->assertEquals($correct, StringTools::standardizeSlashes($path));

    // both
    $path = '/ab/cd/ef/g/';
    $this->assertEquals($correct, StringTools::standardizeSlashes($path));
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testStandardizeSlashesNonstring()
  {
    StringTools::standardizeSlashes(0);
  }

  public function testRemoveQueryString()
  {
    // empty string
    $path = '';
    $this->assertEquals($path, StringTools::removeQueryString($path));

    // no query
    $path = 'asdf.php';
    $this->assertEquals($path, StringTools::removeQueryString($path));

    // query
    $path = 'asdf.php?a=b';
    $this->assertEquals('asdf.php', StringTools::removeQueryString($path));

    // trailing slash, no query
    $path = 'asdf/';
    $this->assertEquals($path, StringTools::removeQueryString($path));

    // trailing slash, query
    $path = 'asdf/?a=b&c=d';
    $this->assertEquals('asdf/', StringTools::removeQueryString($path));

    // multiple query
    $path = 'asdf/?a=b?c=d';
    $this->assertEquals('asdf/', StringTools::removeQueryString($path));

    // only query
    $path = '?asdf&a=b&c=d';
    $this->assertEquals('', StringTools::removeQueryString($path));
    $path = '?asdf&asdf/?a=b?c=d';
    $this->assertEquals('', StringTools::removeQueryString($path));
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testRemoveQueryStringNonstring()
  {
    StringTools::removeQueryString(0);
  }

}
