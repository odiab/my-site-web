<?php
namespace osdiab\PHPFramework\Assets;

use osdiab\PHPFramework\Helpers\HTTPTools;
use osdiab\PHPFramework\Exceptions\ClassFileNotFoundException;

class View extends Asset
{
  public static function load($path, $args=array())
  {
    try {
      parent::load($path, $args);
    } catch (ClassFileNotFoundException $e) {
      HTTPTools::setResponseCode(404);
      parent::load('404');
    }
  }
}
