<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
      header('Location:login.php');
  } else {
      $user_id = $_SESSION['user_id'];
  }

  require_once('system/data.php');
  require_once('system/security.php');


  if(isset($_POST['picture-edit-submit'])){
    $title = filter_data($_POST['title']);
    $description = filter_data($_POST['description']);
    $lat = filter_data($_POST['lat']);
    $lng = filter_data($_POST['lng']);
    $picture_id = filter_data($_POST['picture_id']);

    $result = update_picture($picture_id, $title, $description, $lat, $lng);
  }

  if(isset($_POST['delete'])){
    $delete_id = $_POST['picture_id'];
    delete_picture($delete_id);
  }

  /* *********************************************************
  /* Foto publizieren
  /* ****************************************************** */

  if(isset($_POST['public'])){
    $public_id = $_POST['picture_id'];
    public_picture($public_id);
  }

  $picture_list = get_pictures();

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

    <div class="page-header">
      <h1 class="logo">Tourismusbilder</h1>
      <a href="home.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-home"></span></button></a>
      <a href="pictures.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-picture"></span></button></a>
      <a href="upload.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-camera"></span></button></a>
      <a href="create_poi.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-map-marker"></span></button></a>
      <a href="logout.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-eject"></span></button></a>
    </div>


    <div class="container">
      <div class="row">

        <h1>Alle Fotos</h1>

          <?php while ($picture = mysqli_fetch_assoc($picture_list)) { ?>
          <div class="col-lg-3 col-sm-4 col-xs-6 thumbnail-parent">
            <a title="<?php echo $picture['title']?>" href="#">
              <img class="thumbnail img-responsive" style="height:300px;width:auto;" src="img/<?php echo $picture['file_name']?>">
            </a>
            <div class="modal-title">
            <h3><?php echo $picture['title'] ?></h3>
            </div>

            <div class="thumbnail-modal">
                <form id="picture-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                  <div class="form-group row">
                    <div class="col-sm-5 col-xs-6">
                      <input  type="text" class="form-control form-control-sm"
                              id="title" placeholder="Titel"
                              name="title" value="<?php echo $picture['title']; ?>">
                      <input  type="text" class="form-control form-control-sm"
                              id="description" placeholder="Beschreibung"
                              name="description" value="<?php echo $picture['description']; ?>">
                      <input  type="text" class="form-control form-control-sm"
                              id="lat" placeholder="latitude"
                              name="lat" value="<?php echo $picture['lat']; ?>">
                      <input  type="text" class="form-control form-control-sm"
                              id="lng" placeholder="longitude"
                              name="lng" value="<?php echo $picture['lng']; ?>">
                      <input  type="hidden" name="picture_id" value="<?php echo $picture['picture_id']; ?>">
                          <button type="submit" name="public" class="btn btn-default" data-color="success" value="<?php echo $picture['picture_id']; ?>" >Public</button>
                          <button type="submit" name="delete" class="btn btn-default" data-color="danger" value="<?php echo $picture['picture_id']; ?>">DELETE</button>
                          <button type="submit" name="picture-edit-submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
    </div>
</div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">×</button>
      </div>
  <div class="modal-body">
  </div>
  <div class="modal-footer">
  </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
  </body>
</html>
