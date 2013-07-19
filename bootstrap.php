<?php
define('SITE_ROOT', __DIR__);
require_once('vendor/autoload.php');

use osdiab\PHPFramework\Core\Config;
if (!file_exists('config.json')) {
  throw new RuntimeException('config.json missing.');
}

$config = json_decode(file_get_contents('config.json'));
if ($config === FALSE) {
  throw new RuntimeException('config.json contained malformed data.');
}

Config::init($config);
