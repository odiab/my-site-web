<?php
use osdiab\PHPFramework\Core\Router;

require_once('bootstrap.php');
Router::load($_SERVER['REQUEST_URI']);
