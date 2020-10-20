<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css') ?>"/>

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
    <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Nakulasadewa</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/admin/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?= ($page=='product') ? 'active' : ''  ?>" href="/admin/product">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page=='order') ? 'active' : ''  ?>" href="/admin/order">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
            </ul>
            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          
            <?= $this->renderSection('content') ?>

        </main>
      </div>
    </div>

<script src="<?= base_url('assets/js/jquery-3.5.1.slim.js') ?>"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable( {
          "scrollY": 400,
          "scrollX": true
      } );
  } );

  function readPhoto() {
    let photo = document.querySelector('#filePhoto')
    let photoLabel = document.querySelector('.custom-file-label')
    let imgPreview = document.querySelector('.img-preview')

    photoLabel.textContent = photo.files[0].name
    const filePhoto = new FileReader()
    filePhoto.readAsDataURL(photo.files[0])

    filePhoto.onload = function (e) {
      imgPreview.src = e.target.result
    }
  }

</script>
</body>
</html>
