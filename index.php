<!DOCTYPE html>
<html lang="en">
  <title>Google's Bouncing Balls | HTML5 Canvas </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <?php if (!$_POST['explodey_string'] && !$_FILES['explodey_image']): ?>

  <body>    
    <h1>Text Explodifier</h1>
    <form method="post" action="" >
      <input type="text" name="explodey_string">
      <input type="submit" value="Explodify Text">
    </form>
    <form method="post" action="" enctype="multipart/form-data">
      <input type="file" name="explodey_image">
      <input type="submit" value="Explodify Image">
    </form>


    <?php else: ?>
    <?php 
       if ($_FILES) {
       $target_path = str_replace('/index.php','',$_SERVER['SCRIPT_FILENAME'])."/uploads/";
       $target_path = $target_path . basename( $_FILES['explodey_image']['name']); 
       if(move_uploaded_file($_FILES['explodey_image']['tmp_name'], $target_path)) {
       $imsize = getimagesize($target_path);
       }
       }
       ?>

    <script type="text/javascript">
      var text_to_draw = <?= $_POST['explodey_string'] ? '"'.$_POST['explodey_string'].'"' : 'false' ?>;
      var image_to_draw = <?= $_FILES ? '"uploads/'.$_FILES['explodey_image']['name'].'"' : 'false' ?>;
    </script>
    
    <script type="text/javascript" src="js/main.js"></script>

  <body >
    <img id="i" src="<?= 'uploads/'.$_FILES['explodey_image']['name'] ?>" style="display:none">
    <canvas id="c" width="400" height="400"></canvas>
    <canvas id="buffercan" width="1000" height="1000" style="display:none"></canvas>

    <?php endif; ?>
    <p id="attribution">Originally made by <a href="http://github.com/robhawkes/google-bouncing-balls">Rob Hawkes</a> modified by <a href="http://github.com/clawtros/google-bouncing-balls">Adam Benzan</a></p>
  </body>
</html>
