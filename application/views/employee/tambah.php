<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Isikan nip">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Isikan nama">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="gender" name="gender">
                                <option value="" selected="selected">Pilih Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="join_date">Tanggal Masuk</label>
                        <input type="date" name="join_date" id="join_date" class="form-control" placeholder="Isikan password">
                        <?= form_error('join_date', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="is_active">Status Karyawan</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="" selected="selected">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url(); ?>employee" type="button" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->