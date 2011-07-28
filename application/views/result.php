<?php
$this->load->helper('url');
?>
<!doctype html>
<html>
  <head>
    <meta charst="utf-8">
    <title>TinyURL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <h1>TinyURL</h1>
    <div>
        <?php echo anchor($tinyurl, $tinyurl, array('target'=>'_blank')); ?>
    </div>
    <?php echo anchor('', 'back to top'); ?>
  </body>
</html>
