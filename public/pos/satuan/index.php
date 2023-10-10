<?php
require '../config.php';
middleware();
$query = $conn->query("SELECT * FROM satuan ORDER BY satuan_nama ASC");
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $id = $_SESSION['data']['user_id'];
    if (isset($_GET['edit'])) {
        $ed = $_GET['edit'];
        handleError($conn->query("UPDATE satuan SET satuan_nama='$nama', satuan_user_id='$id' WHERE satuan_id = '$ed'"));
        refresh();
    } else {
        handleError($conn->query("INSERT INTO satuan(satuan_nama,satuan_user_id) VALUES('$nama','$id')"));
        refresh();
    }
}
if (isset($_GET['edit'])) {
    $ed = $_GET['edit'];
    $show = $conn->query("SELECT * FROM satuan WHERE satuan_id = '$ed'")->fetch_assoc();
    handleError($show);
}
if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    handleError($conn->query("DELETE FROM satuan WHERE satuan_id='$del'"));
    refresh();
}
$title = (isset($_GET['edit'])) ? "Edit Satuan" : "Data Satuan";
?>
<?php $active[2] = 'active' ?>
<?php include('../templates/sidebar.php') ?>
<div class="main-panel bgMain fadeIn animated">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <span class="navbar-brand title-layout">Satuan</span>
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
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Satuan</label>
                                    <input type="text" class="form-control" name="nama" value="<?php if (isset($_GET['edit'])) echo $show['satuan_nama']; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="pull-right">
                                        <button class="btn btn-primary"><?= (isset($_GET['edit'])) ? "Edit"  : "Buat" ?> Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header card-header-primary card-header-bg">
                    <h4 class="card-title">Data Supplier</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table">
                            <thead class="text-primary">
                                <th>No</th>
                                <th>Nama Satuan</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                while ($row = $query->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['satuan_nama'] ?></td>
                                        <td class="td-actions">
                                            <a href="<?= $_SERVER['REQUEST_URI'] ?>?edit=<?= $row['satuan_id'] ?>" class="btn btn-primary btn-round"><i class="material-icons">edit</i></a>
                                            <a href="<?= $_SERVER['REQUEST_URI'] ?>?delete=<?= $row['satuan_id'] ?>" class="btn btn-danger btn-danger btn-round" onclick="return confirm('Hapus Data?')"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php include('../templates/footer.php') ?>