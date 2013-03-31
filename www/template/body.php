<div id="topContainer">
  <div id="sidebar">
    <span id="sidebarName">IAB</span>
  </div>

  <div id="content">
    <?php
    if (Page::load($args['path']) != 0) {
      Page::load('404');
    }
    ?>
    <div id="bottomPush"></div>
  </div>
</div>

<div id="bottomContainer">
  <?php Template::load('titlebar', array('path' => $args['path'])); ?>
  <?php Template::load('footer'); ?>
</div>
