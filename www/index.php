<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/php-loader/loader-bootstrap.php');
    $path = $_SERVER['REQUEST_URI'];

    Template::load('head');
  ?>

  <body>
    <div id="topContainer">
      <div id="sidebar">
        <span id="sidebarName">IAB</span>
      </div>

      <div id="content">
        <?php
        if (Page::load($path) != 0) {
          Page::load('404');
        }
        ?>
        <div id="bottomPush"></div>
      </div>
    </div>

    <div id="bottomContainer">
      <?php Template::load('titlebar', array('path' => $path)); ?>
      <?php Template::load('footer'); ?>
    </div>

  </body>
</html>
