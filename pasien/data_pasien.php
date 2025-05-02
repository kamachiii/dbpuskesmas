<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // define the query
    $sql = "SELECT * FROM pasien";
    // run the query
    $query = $dbh->query($sql);
    // fetch the results
?>
    <div class="container">

        <a href="index.php?hal=tambah-pasien" class="btn btn-add">Tambah</a>
        <table class="table-pasien">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th>Kode</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Email</th>
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
                        <td><?= $row['kode'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="index.php?hal=tambah-pasien&id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="pasien/proses_pasien.php?id=<?= $row['id'] ?>&proses=Hapus" class="btn btn-delete">Hapus</a>
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
