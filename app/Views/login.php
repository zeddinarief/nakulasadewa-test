<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">
  </head>
  <body style="background-color: gray;" class="text-center">
    <form action="/admin/login" method="post" class="form-signin">
      <?= csrf_field() ?>
      <img class="mb-4" src="<?= base_url('logo.png') ?>" alt="" width="300">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php if(session()->getFlashdata('logerror')) {?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('logerror'); ?>
      </div>
      <?php } ?>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="Email address" value="<?= old('email') ?>" autofocus>
      <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Password" >
      <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</body>
</html>
