<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // define the query
    $sql = "SELECT periksa.*, pasien.nama AS nama_pasien, paramedik.nama AS nama_paramedik
            FROM periksa
            JOIN pasien ON periksa.pasien_id = pasien.id
            JOIN paramedik ON periksa.paramedik_id = paramedik.id";
    // run the query
    $query = $dbh->query($sql);
    // fetch the results
?>
    <div class="container">

        <a href="index.php?hal=tambah-periksa" class="btn btn-add">Tambah</a>
        <table class="table-pasien">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Paramedik</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($query as $row) {
                    ?>
                    <tr>
                        <td class="text-align:center;"><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nama_pasien'] ?></td>
                        <td><?= $row['nama_paramedik'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td>
                            <a href="index.php?hal=tambah-periksa&id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="periksa/proses_periksa.php?id=<?= $row['id'] ?>&proses=Hapus" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"><b>Total Pasien:</b> <?= $query->rowCount() ?></td>
                    </tr>
                </tfoot>
            </table>
    </div>
