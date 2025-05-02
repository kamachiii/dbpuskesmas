<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // Check if the form is submitted
    if (isset($_GET['id'])) {
        // Get the id from the URL
        $_idx = $_GET['id'];
        // define the query to get the data
        $sql = "SELECT pasien.*, kelurahan.nama AS nama_kelurahan FROM pasien
        JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id WHERE pasien.id = ?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement
        $stmt->execute([$_idx]);
        // fetch the result
        $row = $stmt->fetch();

        $tombol = "Update";
    } else {
        $tombol = "Submit";
    }

    // define the kelurahan
    $sql = "SELECT * FROM kelurahan";
    // run the query
    $kelurahan = $dbh->query($sql);
?>
    <form class="form-pasien" action="pasien/proses_pasien.php" method="post">
        <h2 class="form-title">Form Pasien</h2>
        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : ''; ?>">
        <input class="input" type="text" name="kode" placeholder="Kode Pasien" value="<?= isset($row) ? $row['kode'] : ''; ?>" required>
        <input class="input" type="text" name="nama" placeholder="Nama Pasien" value="<?= isset($row) ? $row['nama'] : ''; ?>" required>
        <input class="input" type="text" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= isset($row) ? $row['tmp_lahir'] : ''; ?>" required>
        <input class="input" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= isset($row) ? $row['tgl_lahir'] : ''; ?>" required>
        <input class="input-radio" type="radio" name="gender" value="L" <?= isset($row) && $row['gender'] == 'L' ? 'checked' : ''; ?> required> Laki-Laki
        <input class="input-radio" type="radio" name="gender" value="P" <?= isset($row) && $row['gender'] == 'P' ? 'checked' : ''; ?> required> Perempuan
        <select class="input" name="kelurahan">
            <option value="">-- Pilih Kelurahan --</option>
            <?php
                // fetch the results
                foreach ($kelurahan as $lurah) {
                    echo "<option value='{$lurah['id']}'"
                        . (isset($row['nama_kelurahan']) && $row['nama_kelurahan'] == $lurah['nama'] ? 'selected' : '') .
                    ">{$lurah['nama']}</option>";
                }
            ?>
        </select>
        <input class="input" type="email" name="email" placeholder="Email" value="<?= isset($row) ? $row['email'] : ''; ?>" required>
        <input class="input" type="text" name="alamat" placeholder="Alamat" value="<?= isset($row) ? $row['alamat'] : ''; ?>" required>
        <button class="btn btn-save" type="submit" name="proses" value="<?= $tombol ?>">Simpan</button>
        <a href="index.php?hal=data-pasien">
            <button class="btn btn-cancel" type="button">Batal</button>
        </a>
    </form>
