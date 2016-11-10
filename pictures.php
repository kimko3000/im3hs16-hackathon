



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

          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1476231682828-37e571bc172f?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=414e28999a4ae7e26c1cf4b4ac1f164f"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1475439242971-afb6fcc1ba22?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=c221a5935a8ea54887ae7178aeff7725"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1462663608395-404cb6246eaf?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=47d882ec1d9e97c67aeafe03e8780dc0"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1437650128481-845e6e35bd75?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=83411d2eee9319f91dd4faeeb4bba660"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1472647077244-23bed45e50d9?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=626f472d7d6b6b95331aff51f16e1c97"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1467659226669-a1360d97be2d?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=3461908b008bc24b8cf01c4decf20c4e"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1474821792123-fa67193d18a5?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=dd69d07d43c5f74208002e9e5dcdea73"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1473970367503-7d7f8d1bf998?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=1c38107cb3e71ad1c6cb430b0343bd5f"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1470660513416-5494d0eab742?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=cbfce7b5436d0394869198985f3d137c"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 11" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1470138000694-6580a25339f7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=694d87692ed88cd0e1a9cb5ceae0547c"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/uploads/1411599070526e808c923/239f12cc?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=f10a909a3d8786a15d3ba59b4d98cd60"></a></div>
          <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" style="height:300px;" src="https://images.unsplash.com/photo-1455275892767-005ebb186764?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=53ac9aadf34eb075e90cce2c92226d45"></a></div>

        <hr>

        <hr>
      </div>
    </div>
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
    		<button class="close" type="button" data-dismiss="modal">×</button>
    		<h3 class="modal-title">Heading</h3>
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














<footer><p>Copyright 2016</p></footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
  </body>
</html>
