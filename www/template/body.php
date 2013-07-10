<body>
  <div id="topContainer">
    <div id="sidebar">
      <span id="sidebarName">IAB</span>
    </div>

    <div id="content">
      <?php
      try {
        View::load($args['path']);
      } catch (ClassFileNotFoundException $e) {
        HTTPTools::setResponseCode(404);
        View::load('404');
      }
      ?>
    </div>
  </div>

  <div id="bottomContainer">
    <?php Template::load('titlebar', array('path' => $args['path'])); ?>
    <?php Template::load('footer'); ?>
  </div>
</body>
