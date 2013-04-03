<?php

class Page extends Asset
{
  public static function load($name, $args=array())
  {
    if (!is_string($name)) {
      trigger_error("Invalid name, must be a string", E_USER_WARNING);
      return -1;
    }

    $name = self::formatPath($name);
    if ($name == '') {
      $name = 'home';
    }

    return parent::load($name, $args);
  }
}
