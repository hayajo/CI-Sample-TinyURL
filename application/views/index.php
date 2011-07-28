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
    <form method="post" action="<?php echo base_url() ?>create">
      <input type="text" name="url" />
      <input type="submit" value="tiny!" />
    </form>
  </body>
</html>
