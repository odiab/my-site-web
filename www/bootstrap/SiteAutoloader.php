<?php
class SiteAutoloader {
  private static $TYPES = array(
    "asset", "model", "helper", "exception",
  );
  private static $loaded = false;

  /**
   * Generates generic path format for files in nested dir structures
   * @param $class string Name of class to load
   * @param $dir string Root directory of file
   */
  private static function createPath($class, $dir)
  {
    return SITE_ROOT . "/$dir/$class.php";
  }

  /**
   * Autoloads missing classes by searching through directories for appropriate
   * file.
   * @param $class string Class to check for.
   */
  private function autoloader($class)
  {
    foreach (self::$TYPES as $type) {
      $path = self::createPath($class, $type);
      if (file_exists($path)) {
        require_once($path);
        break;
      }
    }
  }

  /**
   * Initializes autoloader. All future calls to init() are ignored.
   */
  public static function init() {
    if (!self::$loaded) {
      self::$loaded = true;
      spl_autoload_register(array(new self(), 'autoloader'));
    }
  }
}

SiteAutoloader::init();
