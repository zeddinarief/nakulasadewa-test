<?= $this->extend('layout\user_template') ?>

<?= $this->section('content') ?>
<div class="mb-5" style="overflow: hidden;">
    <?php 
    $no = 1;
    foreach ($products as $product) { 
        if ($no % 2 == 0 ) {?>
        <div class="row row-cols-2 py-5" style="background-color: white;">
            <div class="col-md-7 col-sm-12 p-5">
                <h2 class="ml-5 product-name" style="height: 20%;"><?= $product['product_name'] ?></h2>
                <div class="ml-5" style="height: 50%;">
                    <p class="desc-text"><?= $product['description'] ?></p>
                </div>
                <div class="ml-5" style="height: 30%;">
                    <a class="btn btn-primary" type="button" href="<?= base_url('/product/' . $product['slug']) ?>" style="font-size: 18px;">Detail <svg class="bi bi-chevron-right" width="28" height="28" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"/></svg>
                    </a>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 p-5">
                <img src="<?= base_url('/upload_product/' . $product['photo']) ?>" alt="product">
            </div>
        </div>
        <?php } else {?>        
        <div class="row row-cols-2 py-5" style="background-color: #efefef;">
            <div class="col-md-5 col-sm-12 p-5">
                <img src="<?= base_url('/upload_product/' . $product['photo']) ?>" alt="product">
            </div>
            <div class="col-md-7 col-sm-12 py-5 pr-5">
                <h2 class="product-name" style="height: 20%;"><?= $product['product_name'] ?></h2>
                <div class="pr-5" style="height: 50%;">
                    <p class="desc-text"><?= $product['description'] ?></p>
                </div>
                <div style="height: 30%;">
                    <a class="btn btn-primary" type="button" href="<?= base_url('/product/' . $product['slug']) ?>" style="font-size: 18px;">Detail <svg class="bi bi-chevron-right" width="28" height="28" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    <?php }
    $no++;
    } ?>
</div>
<?= $this->endSection() ?>