<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Signin Template · Bootstrap v5.1</title>

  <!--  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/"> -->



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../assets/universal/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">

    <?php if (session()->getFlashdata('pesanGagal')) : ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('pesanGagal'); ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('vaksin/login'); ?>">
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control <?= ($validation->hasError('inputEmail')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@webmail.uad.ac.id" name="inputEmail">
        <label for="floatingInput">Email address</label>
        <div class="invalid-feedback">
          <?= $validation->getError('inputEmail'); ?>
        </div>
      </div>


      <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>



</body>

</html>