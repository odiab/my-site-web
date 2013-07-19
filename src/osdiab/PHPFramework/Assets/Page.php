<?php
namespace osdiab\PHPFramework\Assets;

class Page extends Asset
{
  /**
   * Provided a path which represents a page, get the section it belongs
   * to. This would be the first subdirectory of the path.
   * @param $path string Path to analyze
   * @return string Section path is in. Empty string if no path provided.
   */
  public static function extractSectionFromPath($path)
  {
    $pieces = explode('/', $path);
    if (count($pieces) == 0) {
      return '';
    }
    return $pieces[0];
  }

  public static function load($path, $args=array())
  {
    if (!is_string($path)) {
      throw new InvalidCalledClassException(
        "Invalid name, must be a string"
      );
      return false;
    }

    return Template::load('page', array('path' => $path));
  }
}
