<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Karyawan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Karyawan</th>
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
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['gender'] == 1 ? "Laki-laki" : "Perempuan" ?></td>
                                <td><?= $row['jabatan'] != "kosong" ? $row['jabatan'] : "-" ?></td>
                                <td><?php
                                    if ($row['jabatan'] != "kosong") {
                                        $date = date_create($row['active_date']);
                                        echo date_format($date, "d F Y");
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    $date = date_create($row['join_date']);
                                    echo date_format($date, "d F Y");
                                    ?>
                                </td>
                                <td><?= $row['is_active'] == 1 ? "<strong style='color: green;'>Aktif</strong>" : "<strong style='color: red;'>Tidak Aktif</strong>" ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->