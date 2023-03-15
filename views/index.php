<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
</head>

<body class="bg-light">
<div style="height: 100vh;">
  <div class="row h-100 m-0">
    <div class="card w-25 mx-auto my-auto">
      <div class="card-header bg-white border-0 py-3">
        <h1 class="h2 text-center mb-4">Login</h1>
      </div>
       
      <div class="card-body">
        <form action="../actions/login-action.php" method="post" autocomplete="off">
          <input type="text" class="form-control mb-2" name="username" placeholder="USERNAME" required autofocus>
          <input type="password" class="form-control mb-2" name="password" id="password" placeholder="PASSWORD" required>

          <button type="submit" name="btn_login" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="small text-center mt-3"><a href="../views/register.php">Create Account</a></p>
    </div>
</div>
</div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>