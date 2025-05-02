<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // define the query
    $sql = "SELECT * FROM paramedik";
    // run the query
    $query = $dbh->query($sql);
    // fetch the results
?>
    <div class="container">

        <a href="index.php?hal=tambah-paramedik" class="btn btn-add">Tambah</a>
        <table class="table-pasien">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th>Nama Paramedik</th>
                    <th>Gender</th>
                    <th>Tanggal Lahir</th>
                    <th>Kategori</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
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
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $row['tgl_lahir'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['telepon'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <a href="index.php?hal=tambah-paramedik&id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="paramedik/proses_paramedik.php?id=<?= $row['id'] ?>&proses=Hapus" class="btn btn-delete">Hapus</a>
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
