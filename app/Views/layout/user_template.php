<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link href="<?= base_url('assets/css/sticky-footer.css') ?>" rel="stylesheet">
    <style>
        .product-name {
            color: cornflowerblue;
        }
        .desc-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            overflow: hidden;
            font-size:18px;
        }
        .desc {
            font-size:18px;
        }
    </style>
    <title><?= $title; ?></title>
</head>
<body class="h-100">
    <nav class="navbar navbar-light w-100 " style="background-color: #4c4c4c;">
    <a class="navbar-brand mx-5 my-2" href="nakulasadewa.com">
        <img src="<?= base_url('logo.png') ?>"  height="80" alt="" loading="lazy">
    </a>
    </nav>

    <?= $this->renderSection('content'); ?>

    <footer class="footer text-center py-2 fixed-bottom" style="background-color: #4c4c4c; color: white">
            <p>nakulasadewa.com</p>
    </footer>

    <script src="<?= base_url('assets/js/jquery-3.5.1.slim.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>