<?php
require_once(__DIR__ . '/bootstrap/bootstrap.php');
Router::load($_SERVER['REQUEST_URI']);
