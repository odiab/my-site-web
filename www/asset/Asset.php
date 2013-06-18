<?php
class Asset {
  const LANG_EXT = '.php';
  //***********
  //* HELPERS *
  //***********

  /**
   * Formats paths to cooperate with the loader
   */
  public static function formatPath($path, $options=array())
  {
    $path = StringTools::removeQueryString($path);
    $path = StringTools::standardizeSlashes($path);

    if ($path == '') return $path; // treat empty path separately

    if (isset($options[self::LANG_EXT]) && !$options[self::LANG_EXT]) {
      $path = StringTools::removeExtension($path, self::LANG_EXT);
    } else {
      $path = StringTools::addExtension($path, self::LANG_EXT);
    }
    return $path;
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
    $class = get_called_class();
    if ($class == 'Asset') {
      trigger_error(
        "Asset::load(): Can only call load on subclasses of Asset",
          E_USER_ERROR
      );
      return false;
    }

    if (!is_string($path)) {
      $className = get_called_class();
      trigger_error(
        "$classname::load(): Invalid path '$path', must be a string",
          E_USER_WARNING
      );
      return false;
    }

    // build full path
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/' . strToLower($class);
    $path = self::formatPath($path);
    $completePath = "$dir/$path";

    if (!file_exists($completePath)) {
      $classname = get_called_class();
      trigger_error(
        "$classname::load(): $classname at name of '$completePath'
          does not exist", E_USER_WARNING
      );
      return false;
    } else {
      // act
      include ($completePath);
    }

    return true;
  }
}
