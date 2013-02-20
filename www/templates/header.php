<div id="header">
  <div id="headerlogo">
    <div id="headertext" onclick="window.location = '/'">
      <h1>Omar Diab</h1>
      <h2>Test page!</h2>
    </div>
  </div>
  <?php Assets::load(TEMPLATE, 'navigation',
        array('path' => $args['path'])); ?>
</div>
