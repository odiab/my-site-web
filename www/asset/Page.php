<?php

class Page extends Asset
{
  public static function load($path, $args=array())
  {
    if (!is_string($path)) {
      $classname = get_called_class();
      trigger_error(
        "$classname::load(): Invalid name, must be a string", E_USER_WARNING
      );
      return false;
    }

    $path = self::formatPath($path);
    echo $path;

    if ($path == '') {
      $path = 'home';
    }

    return parent::load($path, $args);
  }
}
