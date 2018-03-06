<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration Access</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <div class="form-style">
      <h1>Dashboard Access</h1>
      <form class="form-css" action="login.php" method="post">
        <div class="user-css">
          <input class="input-css" type="text" name="username" placeholder="Username">
        </div>
        <div class="pass-css">
          <input class="input-css" type="text" name="password" placeholder="Password">
        </div>
        <div class="btn-css">
          <input class="submit-css" type="submit" name="submit" value="Login">
        </div>
        <?php if(!empty($_GET['error'])){ ?>
          <p> <?=$_GET['error'] ?> </p>
        <?php } ?>
      </form>
    </div>
  </body>
</html>
