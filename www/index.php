<?php
require_once(__DIR__ . '/bootstrap/bootstrap.php');
$path = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <?php
  Template::load('head');
  Template::load('body', array('path'=>$path));
  ?>
</html>
