<?php
use osdiab\PHPFramework\Assets;
?>

<body>
  <div id="topContainer">
    <div id="sidebar">
      <span id="sidebarName">IAB</span>
    </div>

    <div id="content">
      <?php
      Assets\View::load($args['path']);
      ?>
    </div>
  </div>

  <div id="bottomContainer">
    <?php Assets\Template::load('titlebar', array('path' => $args['path'])); ?>
    <?php Assets\Template::load('footer'); ?>
  </div>
</body>
