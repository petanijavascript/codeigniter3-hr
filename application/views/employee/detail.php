<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>
    <!-- DataTales Example -->
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/'); ?>img/user.png" width="180px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong style="color: black;"><?= $employee['nama'] ?></strong></h5>
                    <p class="card-text">NIP : <strong style="color: black;"><?= $employee['nip'] ?></strong><br>
                        Jenis Kelamin : <?= $employee['gender'] == 1 ? "<strong style='color: black;'>Laki-laki</strong>" : "<strong style='color: black;'>Perempuan</strong>" ?><br>
                        Jabatan : <strong style="color: black;"><?= $employee['jabatan'] != "kosong" ? $employee['jabatan'] : "-" ?></strong><br>
                        Tanggal Aktif Jabatan : <strong style="color: black;">
                            <?php
                            if ($employee['jabatan'] != "kosong") {
                                $date = date_create($employee['active_date']);
                                echo date_format($date, "d F Y");
                            } else {
                                echo "-";
                            } ?></strong><br>
                        Tanggal Masuk : <strong style="color: black;">
                            <?php $date = date_create($employee['join_date']);
                            echo date_format($date, "d F Y"); ?>
                        </strong><br>
                        Status Karyawan : <?= $employee['is_active'] == 1 ? "<strong style='color: green;'>Aktif</strong>" : "<strong style='color: red;'>Tidak Aktif</strong>" ?></p>
                    <p><a href="<?= base_url(); ?>employee" class="btn btn-danger"><i class="fas fa-fw fa-sign-out-alt"></i>Kembali</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data riwayat jabatan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Jabatan</h6>
        </div>
        <div class="card-body">
            <div class="div col-lg-12 text-right" style="height: 50px;">
                <a href="<?= base_url() ?>jobhistory/tambah/<?= $employee['nip'] ?>" class="btn btn-primary" name="tambah" style="vertical-align: middle">Tambah Riwayat Jabatan</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Tanggal Aktif Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Tanggal Aktif Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($jobhistory as $row) :
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['name'] ?><?= $row['is_main'] == 1 ? "<br><small class='badge badge-success'>Jabatan Utama</small>" : "" ?></td>
                                <td><?php $date = date_create($row['active_date']);
                                    echo date_format($date, "d-m-Y"); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>jobhistory/ubah/<?= $row['jobid'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="<?= base_url(); ?>jobhistory/hapus/<?= $row['jobid'] ?>" class="btn btn-danger" onclick="return confirm('yakin?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->