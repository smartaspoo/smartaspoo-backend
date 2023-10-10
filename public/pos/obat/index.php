<style type="text/css">
    .font-blue {
        color: #1971C4;
    }

    .pyy-3 {
        padding-top: 19px;
        padding-bottom: 19px;
    }
</style>

<?php
require '../config.php';
middleware();
if (isset($_POST['nama'])) {
    extract($_POST);
    $userId = $_SESSION['data']['user_id'];
    query("INSERT INTO obat(obat_nama,obat_satuan_id,obat_user_id,obat_kode) VALUES('$nama','$satuan','$userId','$kode')");
    refresh();
}
$i = 1;
$s = $conn->query("SELECT * FROM obat ORDER BY obat_nama ASC");
$satuan2 = $conn->query("SELECT * FROM satuan");
$title = "Barang";
?>
<?php $active[1] = 'active' ?>
<?php include('../templates/sidebar.php') ?>
<div class="main-panel bgMain ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <span class="navbar-brand title-layout">Barang</span>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <!-- your navbar here -->
                    <li class="ml-auto nav-item">
                        <div class="profil">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container">
            <!-- your content here -->

            <div class="card">
                <div class="card-header card-header-primary card-header-bg">
                    <h4 class="card-title">Input Data Barang Baru</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    Kode Barang
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    Nama Barang
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2 mt-3">
                                Satuan
                            </div>
                            <div class="col-md-10">
                                <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="satuan">
                                    <?php while ($row = $satuan2->fetch_assoc()) : ?>
                                        <option value="<?= $row['satuan_id'] ?>"><?= $row['satuan_nama'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                <button class="btn btn-primary">Buat Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header card-header-primary card-header-bg">
                    <h4 class="card-title">Data Stok Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table">
                            <thead class="text-primary">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Jumlah</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                while ($row = $s->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['obat_kode'] ?></td>
                                        <td><?= $row['obat_nama'] ?></td>
                                        <td><?= $conn->query("SELECT * FROM satuan WHERE satuan_id='" . $row['obat_satuan_id'] . "'")->fetch_assoc()['satuan_nama'] ?></td>
                                        <td><?= $row['obat_harga_jual'] ?></td>
                                        <td><?= $row['obat_harga_beli'] ?></td>
                                        <td><?= $row['obat_stok'] ?></td>
                                        <td class="td-actions">
                                            <a href="obat/edit.php?id=<?= $row['obat_id'] ?>" class="btn btn-primary btn-round" rel="tooltip"><i class="material-icons pyy-3">edit</i></a>
                                            <a href="obat/edit.php?method=delete&&id=<?= $row['obat_id'] ?>" class="btn btn-danger btn-danger btn-round" rel="tooltip" onclick="return confirm('Hapus Data?')"><i class="material-icons pyy-3">delete</i></a>
                                        </td>
                                    </tr>
                                <?php $total += intval($row['obat_harga_beli']) * intval($row['obat_stok']);
                                endwhile; ?>
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td colspan="3" class="text-primary center-align">Jumlah Harga Stok</td>
                                <td>Rp. <?= number_format($total, 2, ',', '.') ?></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>





    <?php include('../templates/footer.php') ?>