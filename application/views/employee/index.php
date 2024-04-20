<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data karyawan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="div col-lg-12 text-right" style="height: 50px;">
                <a href="<?= base_url() ?>employee/tambah" class="btn btn-primary" name="tambah" style="vertical-align: middle">Tambah Data Karyawan</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Karyawan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Karyawan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($employee as $row) :
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['nip'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['gender'] == 1 ? "Laki-laki" : "Perempuan" ?></td>
                                <td>
                                    <?php
                                    $date = date_create($row['join_date']);
                                    echo date_format($date, "d F Y");
                                    ?>
                                </td>
                                <td><?= $row['is_active'] == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>employee/detail/<?= $row['nip'] ?>" class="btn btn-warning">Detail</a>
                                    <a href="<?= base_url(); ?>employee/ubah/<?= $row['nip'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="<?= base_url(); ?>employee/hapus/<?= $row['nip'] ?>" class="btn btn-danger" onclick="return confirm('yakin?')">Hapus</a>
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