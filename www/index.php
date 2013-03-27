<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/php-loader/Assets.php');
    Assets::load(TEMPLATE, 'head');
    $path = $_SERVER['REQUEST_URI'];
  ?>

  <body>
    <div id="topContainer">
      <div id="sidebar">
        <span id="sidebarName">IAB</span>
      </div>

      <div id="content">
        <?php
        if (Assets::load(PAGE, $path) != 0) {
          Assets::load(PAGE, '404');
        }
        ?>
        <div id="bottomPush"></div>
      </div>
    </div>

    <div id="bottomContainer">
      <?php Assets::load(TEMPLATE, 'titlebar', array('path' => $path)); ?>
      <?php Assets::load(TEMPLATE, 'footer'); ?>
    </div>

  </body>
</html>
