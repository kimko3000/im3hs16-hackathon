
<?php
session_start();
if(isset($_SESSION['user_id']))
unset($_SESSION['user_id']);
session_destroy();
require_once("system/data.php");
require_once("system/security.php");
$error = false;
$error_msg = "";
$success = false;
$success_msg = "";
// Kontrolle, ob Login-Formular gesendet wurde.
if(isset($_POST['login-submit'])){
  // Kontrolle ob username und password !empty (nicht leer)
  if(!empty($_POST['username']) && !empty($_POST['password'])){
    // Werte aus POST-Array filtern
    $username = filter_data($_POST['username']);
    $password = filter_data($_POST['password']);
    // Liefert alle Infos zu User mit diesen Logindaten
    $result = login($username, $password);
    // Anzahl der gefundenen Ergebnisse in $row_count
    $row_count = mysqli_num_rows($result);
    if( $row_count == 1){
      session_start();
      $user = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $user['user_id'];
      header("Location:home.php");
    }else{
      $error = true;
      $error_msg .= "Leider konnte wir Ihre E-Mailadresse oder Ihr Passwort nicht finden.</br>";
    }
  }else{
    $error = true;
    $error_msg .= "Bitte füllen Sie beide Felder aus.</br>";
  }
}
// Wurde das Register-Formular gesendet?
if(isset($_POST['register-submit'])){
  // Kontrolle ob email und password ausgefüllt wurde
  if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])){
    $username = filter_data($_POST['username']);
    $email = filter_data($_POST['email']);
    $result = checkforexistance($username, $email);
    $row_count = mysqli_num_rows($result);
    if( $row_count == 0){
      // Werte aus POST-Array auf SQL-Injections prüfen und in Variablen schreiben
      $password = filter_data($_POST['password']);
      $confirm_password = filter_data($_POST['confirm-password']);
      if($password == $confirm_password){
        // register liefert bei erfolgreichem Eintrag in die DB den Wert TRUE zurück, andernfalls FALSE
        $result = register($username, $email, $password);
        if($result){
          $success = true;
          $success_msg = "Sie haben sich erfolgreich registriert.</br>Sie können sich jetzt einloggen.</br>";
        }else{
          $error = true;
          $error_msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
        }
      }else{
        $error = true;
        $error_msg .= "Die Passwörter stimmen nicht überein.</br>";
      }
    }else{
      $error = true;
      $error_msg .= "Ihre eingegebene Email-Adresse oder der Username besteht bereits .</br>";
    }
    }else{
    $error = true;
    $error_msg .= "Bitte füllen Sie alle Felder aus.</br>";
  }
}
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
      <a href="index.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-home"></span></button></a>
      <a href="pictures.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-picture"></span></button></a>
      <a href="upload.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-camera"></span></button></a>
      <a href="create_poi.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-map-marker"></span></button></a>
    </div>
    <!-- Login-Register-Formular -->
    <!-- http://bootsnipp.com/snippets/kE9rg -->
    <div class="container">
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="#" method="post" role="form" style="display: block;">
                    <h2>LOGIN</h2>
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      </div>
                      <div class="col-xs-6 form-group pull-left checkbox">
                        <input id="checkbox1" type="checkbox" name="remember">
                        <label for="checkbox1">Remember Me</label>
                      </div>
                      <div class="col-xs-6 form-group pull-right">
                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                  </form>
                  <form id="register-form" action="#" method="post" role="form" style="display: none;">
                    <h2>REGISTER</h2>
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6 tabs">
                  <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
                </div>
                <div class="col-xs-6 tabs">
                  <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      // Gibt es einen Erfolg zu vermelden?
      if($success == true){
    ?>
        <div class="alert alert-success" role="alert"><?php echo $success_msg; ?></div>
    <?php
      }   // schliessen von if($success == true)
      // Gibt es einen Fehler?
      if($error == true){
    ?>
        <div class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div>
    <?php
      }   // schliessen von if($success == true)
    ?>
      </div><!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
  </body>
</html>
