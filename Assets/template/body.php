<?php
use osdiab\PHPFramework as FW;
?>

<body>
  <div id="topContainer">
    <div id="sidebar">
      <span id="sidebarName">IAB</span>
    </div>

    <div id="content">
      <?php
      try {
        FW\Assets\View::load($args['path']);
      } catch (ClassFileNotFoundException $e) {
        FW\Helpers\HTTPTools::setResponseCode(404);
        FW\Assets\View::load('404');
      }
      ?>
    </div>
  </div>

  <div id="bottomContainer">
    <?php FW\Assets\Template::load('titlebar', array('path' => $args['path'])); ?>
    <?php FW\Assets\Template::load('footer'); ?>
  </div>
</body>
