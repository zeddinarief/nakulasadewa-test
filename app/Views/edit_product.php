<?= $this->extend('layout\admin_template') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-8">
            <form action="/admin/product/edit/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                <input type="hidden" name="oldPhoto" id="oldPhoto" value="<?= $product['photo'] ?>">
                <div class="form-group row">
                    <label for="inputProductName" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="productName" class="form-control <?= ($validation->hasError('productName')) ? 'is-invalid' : '' ?>" id="inputProductName" value="<?= (old('productName')) ? old('productName') : $product['product_name'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('productName') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                    <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" name="description" id="inputDescription" rows="3"><?= (old('description')) ? old('description') : $product['description'] ?></textarea>
                    <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputImage" class="col-sm-2 col-form-label">Product photo</label>
                    <div class="col-sm-4">
                        <img src="<?= '/upload_product/' . $product['photo'] ?>" class="img-thumbnail img-preview" alt="Product photo">
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input <?= ($validation->hasError('photo')) ? 'is-invalid' : '' ?>" onchange="readPhoto()" id="filePhoto">
                            <div class="invalid-feedback"><?= $validation->getError('photo') ?></div>
                            <label class="custom-file-label" for="customFile"><?= $product['photo'] ?></label>
                        </div>
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
</div>

<?= $this->endSection() ?>