<?php
namespace osdiab\PHPFramework\Core;

/**
 * Stores application-wide configuration.
 */
class Config
{
  private static $initialized = false;
  private static $config;

  public function init($config)
  {
    if (self::$initialized) {
      return;
    }

    if (!is_object($config)) {
      throw new \InvalidArgumentException('Config argument must be an object');
    }

    self::$config = $config;
    self::$initialized = true;
  }

  public static function get($key)
  {
    if (!isset(self::$config[$key])) {
      throw new \OutOfBoundsException("Config does not contain key '$key'");
    }

    return self::$config[$key];
  }
}
