<?php
class Page extends Asset
{
  public static function load($path, $args=array())
  {
    if (!is_string($path)) {
      $classname = get_called_class();
      throw new InvalidCalledClassException(
        "Invalid name, must be a string"
      );
      return false;
    }

    $path = self::formatPath($path);

    if ($path == '') {
      $path = 'home';
    }

    return parent::load($path, $args);
  }
}
