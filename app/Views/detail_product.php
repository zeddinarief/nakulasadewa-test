<?= $this->extend('layout\user_template') ?>

<?= $this->section('content') ?>
<div class="p-5">
    <img src="<?= '/upload_product/' . $product['photo'] ?>" alt="">
    <h3 class="product-name"><?= $product['product_name'] ?></h3>
    <p class="desc"><?= $product['description'] ?></p>
    <hr>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order this product</h1>
    </div>

    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-6">
            <?php if (session()->getFlashdata('order')) {?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('order')?>
                </div>
            <?php } ?>
                
                <form action="/product/order" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_product" id="id_product" value="<?= $product['id'] ?>">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Your Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="cust_name" class="form-control <?= ($validation->hasError('cust_name')) ? 'is-invalid' : '' ?>" id="inputName" value="<?= old('cust_name') ?>">
                            <div class="invalid-feedback"><?= $validation->getError('cust_name') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" name="description" id="inputDescription" rows="3"><?= old('description') ?></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Your Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control <?= ($validation->hasError('productName')) ? 'is-invalid' : '' ?>" id="inputPhone" value="<?= old('phone') ?>">
                            <div class="invalid-feedback"><?= $validation->getError('productName') ?></div>
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div> -->
</div>
<?= $this->endSection() ?>