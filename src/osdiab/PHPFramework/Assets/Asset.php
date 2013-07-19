<?php
namespace osdiab\PHPFramework\Assets;

use osdiab\PHPFramework\Exceptions\InvalidCalledClassException;
use osdiab\PHPFramework\Exceptions\InvalidArgumentTypeException;
use osdiab\PHPFramework\Exceptions\ClassFileNotFoundException;
use osdiab\PHPFramework\Helpers\StringTools;

abstract class Asset {
  //***********
  //* HELPERS *
  //***********

  /**
   * Formats paths to cooperate with the loader. Removes query string,
   * Removes leading and trailing slashes, and optionally adds or removes
   * the extension.
   */
  public static function generateAssetPath($path)
  {
    $path = StringTools::removeQueryString($path);
    $path = StringTools::standardizeSlashes($path);

    // treat empty path separately
    if ($path != '') {
      $path = StringTools::addExtension($path, '.php');
    }

    $className = StringTools::removeNamespaceFromClass(get_called_class());
    $dir = SITE_ROOT . '/Assets/' . strToLower($className);
    return "$dir/$path";
  }

  //***********
  //* METHODS *
  //***********
  /**
   * Includes specified asset of type specified by the class.
   * @param $path string Path to include
   * @param $args array Arguments for the script at the path
   */
  public static function load($path, $args=array())
  {
    // validate
    $class = StringTools::removeNamespaceFromClass(get_called_class());

    if ($class == 'Asset') {
      throw new InvalidCalledClassException(
        'Can only call load on subclasses of Asset, not Asset itself'
      );
    }

    if (!is_string($path)) {
      $type = gettype($path);
      throw new InvalidArgumentTypeException('$path', 'string', $type);
    }

    // build full path
    $assetPath = self::generateAssetPath($path);

    if (!file_exists($assetPath)) {
      throw new ClassFileNotFoundException($class, $assetPath);
    } else {
      // act
      include ($assetPath);
    }

    return true;
  }
}
