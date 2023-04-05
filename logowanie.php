<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOTEL CALIFORNIA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image" href="beach.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
  <?php require('menu.php');
  if (isset($_REQUEST['login']) && isset($_REQUEST['haslo'])) {
    $sql = "SELECT login, haslo FROM pracownicy WHERE login='{$_REQUEST['login']}'";
    $result = mysqli_query($connect, $sql);
    if($row - mysqli_fetch_array($result)) {
      if($row['haslo'] == md5($_REQUEST['haslo'])) {
        session_start();
        $_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $_REQUEST['login'];
        ?>
        <div class="container-fluid mt-3">
          <div class="mb-3 mt-3">Logowanie poprawne</div>
        </div>
      <?php
    }
    } else {
    session_destroy();
    ?>
    <div class="container-fluid mt-3">
      <div class="mb-3 mt-3">Logowanie niepoprawne</div>
    </div>
    <?php
    } 
  } else { }
  ?>

  <section class="h-100 gradient-custom">
  <div class="container py-4 h-20">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-0 mt-md-0 pb-0">
              <h1 class="fw-bold mb-1 text-uppercase">Logowanie</h2>
              <p1 class="text-white-50 mb-5">Podaj swój login i hasło!</p>

              <div class="form-outline form-white mb-4">
                <input type="login" id="login" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Login</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="haslo" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Hasło</label>
              </div>
              
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Zaloguj</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>