<?php include('./app/config/Connection.php');
$db = new Connection();
$pdo = $db->connect(); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <title>Document</title>
</head>

<body>
  <!-- NAVBAR-START -->
  <?php include("./components/header.php") ?>
  <!-- NAVBAR-END -->

  <!-- HOME-START -->
  <?php
  if (isset($_GET['pages']) && $_GET['pages'] != 'login') {
    include("./pages/" . $_GET['pages'] . ".php");

    if (isset($_GET['v']) && $_GET['v'] == 1) {
      include('./app/auth/Auth.php');

      $d = array('username' => $_GET['u'], 'token' => $_GET['token']);

      $auth = new Auth($pdo);
      $auth->verifyUser($d);
    }
  } else {
    include("./pages/login.php");
  }
  ?>
  <!-- HOME-END -->

  <!-- FOOTER-START -->
  <?php include('./components/footer.php') ?>
  <!-- FOOTER-END -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>