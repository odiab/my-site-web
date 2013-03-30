<?php
class Asset {

  //***********
  //* HELPERS *
  //***********

  /**
   * Removes trailing slashes and leading slashes for paths
   */
  private static function standardizeSlashes($path)
  {
    $len = strlen($path);
    if ($len == 0) {
      return $path;
    }

    if ($path[$len - 1] == '/') {
      if ($len == 1) {
        return '';
      }
      $path = substr($path, 0, $len - 1);
    }

    $len = strlen($path);
    if ($path[0] == '/') {
      $path = substr($path, 1, $len - 1);
    }

    return $path;
  }

  private static function removePHPExtension($path)
  {
    $len = strlen($path);
    if ($len < 4) {
      return $path;
    }

    if (substr($path, -4) == '.php') {
      $path = substr($path, 0, $len - 4);
    }
    return $path;
  }
  private static function addPHPExtension($path)
  {
    $len = strlen($path);
    if ($len == 0) {
      return $path;
    }

    if ($len < 4 || substr($path, -4) != '.php') {
      $path .= '.php';
    }
    return $path;
  }

  private static function removeQueryString($path)
  {
    $parts = explode('?', $path, 2);
    if ($parts != FALSE && count($parts) > 0) {
      $path = $parts[0];
      return $path;
    } else {
      return '';
    }
  }

  /**
   * Formats paths to cooperate with the loader
   */
  public static function formatPath($path, $options=array())
  {
    $path = self::removeQueryString($path);
    $path = self::standardizeSlashes($path);

    if ($path == '') return $path; // treat empty path separately

    if (isset($options['.php']) && !$options['.php']) {
      $path = self::removePHPExtension($path);
    } else {
      $path = self::addPHPExtension($path);
    }
    return $path;
  }

  //***********
  //* METHODS *
  //***********
  public static function load($path, $args=array())
  {
    $class = get_called_class();
    if (!is_string($path)) {
      trigger_error("Invalid name, must be a string", E_USER_WARNING);
      return -1;
    }

    $path = self::formatPath ($path);

    $dir = $_SERVER['DOCUMENT_ROOT'] . '/' . strToLower($class);
    if (!file_exists ("$dir/$path")) {
      trigger_error("Asset at name of '$dir/$path' does not exist", E_USER_WARNING);
      return -1;
    } else {
      include ("$dir/$path");
    }

    return 0;
  }
}
