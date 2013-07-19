<?php
namespace osdiab\PHPFramework\Core;

class Router {
  /**
   * Formats paths to cooperate with the router. Removes query string and
   * leading and trailing slashes, as well as resolves empty path.
   */
  private static function formatPath($path, $options=array())
  {
    $path = StringTools::removeQueryString($path);
    $path = StringTools::standardizeSlashes($path);
    if ($path == '') {
      $path = 'home';
    }
    return $path;
  }

  /**
   * Ensures paths are not malformed. Currently, this just means no multiple
   * slashes in a row, and no symbols except /, -, and _.
   */
  private static function checkPathValidity($path)
  {
    $pattern = '/.*\/\/.*/'; // checks for two slashes in a row
    if (preg_match($pattern, $path)) {
      throw new InvalidArgumentException(
        'Page path cannot contain two or more slashes in a row.'
          . 'Received \'' . $path . '\''
      );
    }

    $pattern = '/[a-zA-Z0-9-_\/]*/';
    if (!preg_match($pattern, $path)) {
      throw new InvalidArgumentException(
        'Page path may only have -, _, and alphanumeric characters. '
          . 'Received \'' . $path . '\''
      );
    }
  }

  public static function load($path)
  {
    self::checkPathValidity($path);
    $path = self::formatPath($path);

    Page::load($path);
  }
}
