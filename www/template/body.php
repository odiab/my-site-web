<body>
  <div id="topContainer">
    <div id="sidebar">
      <span id="sidebarName">IAB</span>
    </div>

    <div id="content">
      <?php
      try {
        View::load($_SERVER['REQUEST_URI']);
      } catch (ClassFileNotFoundException $e) {
        HTTPTools::setResponseCode(404);
        View::load('404');
      }
      ?>
    </div>
  </div>

  <div id="bottomContainer">
    <?php Template::load('titlebar'); ?>
    <?php Template::load('footer'); ?>
  </div>
</body>
