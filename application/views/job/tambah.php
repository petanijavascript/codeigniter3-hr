<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jabatan</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Jabatan</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Isikan nama jabatan">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url(); ?>job" type="button" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->