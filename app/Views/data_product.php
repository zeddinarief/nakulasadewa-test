<?= $this->extend('layout\admin_template') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a type="button" href="/admin/product/add" class="btn btn-sm btn-outline-primary">Add Product</a>
    </div>
</div>

<div class="table-responsive">
<div class="container">
<table id="example" class="display table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (count($products) > 0) {
        $no = 1;
        foreach ($products as $product) { ?>
        <tr>
            <td class="text-center" width="5%"><?= $no ?></td>
            <td width="20%"><img height="120" src="<?= '/upload_product/' . $product['photo'] ?>" alt="product item"></td>
            <td width="25%"><?= $product['product_name'] ?></td>
            <td width="30%" ><?= $product['description'] ?></td>
            <td width="15%">
                <a href="/admin/product/edit/<?= $product['slug'] ?>" type="button" style="float: left;" class="btn btn-sm btn-outline-secondary mr-1">Edit</a>
                <form action="/admin/product/<?= $product['id'] ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php $no++; } 
        }?>
    </tbody>
</table>
</div>
</div>
<?= $this->endSection() ?>