<?php
define('PAGE', 0);
define('TEMPLATE', 1);
define('HELPER', 2);
define('MODEL', 3);
define('NUM_ASSETS', 4);

class Assets {

  private static $assets = null;

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

  //********
  //* INIT *
  //********
  private static function init()
  {
    $root = $_SERVER['DOCUMENT_ROOT'];
    self::$assets = array(
      $root . '/pages',
      $root . '/templates',
      $root . '/helpers',
      $root . '/models',
    );
  }

  //***********
  //* METHODS *
  //***********
  public static function load($type, $path, $args=array())
  {
    // validate
    if (!is_array(self::$assets)) {
      self::init();
    }

    if (!is_string($path)) {
      trigger_error("Invalid path '$path', must be a string", E_USER_WARNING);
      return -1;
    }

    if (!is_int($type) || $type < 0 || $type >= NUM_ASSETS) {
      trigger_error("Invalid asset type of '$type'", E_USER_WARNING);
      return -1;
    }

    // act
    $path = self::formatPath ($path);
    if ($type == PAGE && $path == '') {
      $path = 'home.php';
    }

    $val = self::$assets[$type];
    if (!file_exists ("$val/$path")) {
      trigger_error("Asset at path of '$val/$path' does not exist", E_USER_WARNING);
      return -1;
    } else {
      include ("$val/$path");
    }

    return 0;
  }
}
