<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
      header('Location:login.php');
  } else {
      $user_id = $_SESSION['user_id'];
  }

  require_once('system/data.php');
  require_once('system/security.php');


$picture = get_pictures();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Kim Schläpfer, Luca Toneatti, Fabio Follador">

    <title>Tourismusbilder</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
  </head>
  <body>


    <div class="container">
      <div class="row">

        <h1>Alle Fotos</h1>
          <?php while($post = mysqli_fetch_array($picture)){ ?>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="<?php echo $post['title']?>" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=414e28999a4ae7e26c1cf4b4ac1f164f"></a></div>
          <?php } ?>

        <hr>
      </div>
    </div>
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
    		<button class="close" type="button" data-dismiss="modal">×</button>
    		<h3 class="modal-title"><?php echo $picture['title'] ?></h3>
    	</div>
    	<div class="modal-body">

    	</div>
    	<div class="modal-footer">
        <form id="picture-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
          <span class="button-checkbox">
              <button type="button" class="btn btn-default" data-color="success">Public</button>
              <input type="checkbox" class="hidden"/>
            </span>
            <span class="button-checkbox">
            <button type="button" class="btn btn-default" data-color="danger">DELETE</button>
            <input type="checkbox" class="hidden"/>
          </span>
            <button type="submit" name="picture-edit-submit" class="btn btn-primary">Save</button>
        </form>
    	</div>
       </div>
      </div>
    </div>















<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
  </body>
</html>
