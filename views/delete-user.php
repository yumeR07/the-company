<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Fontawesome /cdnjs-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Delete User</title>
</head>
<body>

<nav class="navbar bavbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
      </a>
      <div class="navbar-nav">
        <span class="navbar-text"><?= $_SESSION['fullname']?></span>
        <form action="../actions/logout-action.php" method="post" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
        </form>
      </div>
    </div>
</nav>

<main class="row justify-content-center gx-0">
  <div class="col-4 text-center">
    <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
    <h2 class="text-danger mb-5">Delete Account</h2>

    <p class="fw-bold">Are you sure you want to delete your account?</p>

    <div class="row">
      <div class="col">
        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
      </div>
      <div class="col">
        <form action="../actions/delete-user-action.php" method="post">
          <button type="submit" class="btn btn-danger w-100">Delete</button>
        </form>
      </div>
    </div>
  </div>
</main>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>