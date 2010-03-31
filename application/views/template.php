<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL::base(); ?>media/css/screen.css" />
  </head>
  <body>
    
    <div id="container">
      <h1><?php echo $title; ?></h1>

      <?php echo $content; ?>
    </div>
    
  </body>
</html>
