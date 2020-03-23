<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    
    <?php $this->load->view('layouts/_alert') ?>
    
    <!-- Filter -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="d-inline text-dark">Tampilkan berdasarkan&nbsp;&#8594;&nbsp;</h5>
                    <span>
                        <a href="#" class="btn btn-rounded btn-primary">Makanan</a>
                        <a href="#" class="btn btn-rounded btn-danger">Minuman</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- List Menu -->
    <div class="row">
        <?php foreach ($content as $row) : ?>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-header bg-<?= $row->tipe_barang == 'makanan' ? 'primary' : 'danger' ?>">
                        <h4 class="mb-0 text-white"><?= ucfirst($row->tipe_barang) ?></h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $row->nama_barang ?></h3>
                        <p class="card-text"><strong>Rp.<?= number_format($row->harga_jual, 0, ',', '.') ?>,-</strong></p>
                        <p class="card-text">Kuantitas barang: <?= $row->qty_inventory ?> buah</p>
                        <form action="<?= base_url('cart/add') ?>" method="POST">
                            <input type="hidden" name="id_product" value="">
                            <div class="input-group">
                                <input type="number" name="qty" value="1" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Tambahkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="row d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <?= $pagination ?>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

