<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Riwayat Jabatan</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <input type="hidden" name="jobid" value="<?= $jobhistory['jobid'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" value="<?= $employee['nip'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $employee['name'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="job_id">Jabatan</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="job_id" name="job_id">
                                <?php foreach ($job as $row) : ?>
                                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $jobhistory['job_id'] ? "selected='selected'" : "" ?>><?= $row['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="active_date">Tanggal Aktif Jabatan</label>
                        <input type="date" name="active_date" id="active_date" class="form-control" value="<?= $jobhistory['active_date'] ?>">
                        <?= form_error('active_date', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="is_main">Jabatan Utama</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="is_main" name="is_main">
                                <option value="0" <?= $jobhistory['is_main'] == 0 ? "selected='selected'" : "" ?>>Tidak</option>
                                <option value="1" <?= $jobhistory['is_main'] == 1 ? "selected='selected'" : "" ?>>Ya</option>
                            </select>
                        </div>
                        <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url(); ?>employee/detail/<?= $employee['nip'] ?>" type="button" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Ubah</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->