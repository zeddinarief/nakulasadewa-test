<?= $this->extend('layout\admin_template') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
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
            <th>Customer Name</th>
            <th>Description</th>
            <th>Phone</th>
            <th>Product Name</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (count($orders) > 0) {
        $no = 1;
        foreach ($orders as $order) { ?>
        <tr>
            <td class="text-center" width="5%"><?= $no ?></td>
            <td width="20%"><?= $order['customer_name'] ?></td>
            <td width="30%" ><?= $order['description'] ?></td>
            <td width="15%"><?= $order['phone'] ?></td>
            <td width="25%"><a href="/product/<?= $order['slug'] ?>"><?= $order['product_name'] ?></a></td>
        </tr>
        <?php $no++; } 
        }?>
    </tbody>
</table>
</div>
</div>
<?= $this->endSection() ?>