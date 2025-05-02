<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // Check if the form is submitted
    if (isset($_GET['id'])) {
        // Get the id from the URL
        $_idx = $_GET['id'];
        // define the query to get the data
        $sql = "SELECT paramedik.*, unit_kerja.nama AS unit_kerja FROM paramedik
        JOIN unit_kerja ON paramedik.unit_kerja_id = unit_kerja.id WHERE paramedik.id = ?";
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
    $sql = "SELECT * FROM unit_kerja";
    // run the query
    $unit_kerja = $dbh->query($sql);
?>
    <form class="form-pasien" action="paramedik/proses_paramedik.php" method="post">
        <h2 class="form-title">Form Paramedik</h2>
        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : ''; ?>">
        <input class="input" type="text" name="nama" placeholder="Nama Paramedik" value="<?= isset($row) ? $row['nama'] : ''; ?>" required>
        <input class="input" type="text" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= isset($row) ? $row['tmp_lahir'] : ''; ?>" required>
        <input class="input" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= isset($row) ? $row['tgl_lahir'] : ''; ?>" required>
        <input class="input-radio" type="radio" name="gender" value="L" <?= isset($row) && $row['gender'] == 'L' ? 'checked' : ''; ?> required> Laki-Laki
        <input class="input-radio" type="radio" name="gender" value="P" <?= isset($row) && $row['gender'] == 'P' ? 'checked' : ''; ?> required> Perempuan
        <select class="input" name="unit_kerja">
            <option value="">-- Pilih Unit --</option>
            <?php
                // fetch the results
                foreach ($unit_kerja as $unit) {
                    echo "<option value='{$unit['id']}'";

                    if(isset($row) && $row['unit_kerja'] == $unit['nama']) echo " selected";

                    echo ">{$unit['nama']}</option>";
                }
            ?>
        </select>
        <input class="input" type="text" name="telepon" placeholder="Telepon" value="<?= isset($row) ? $row['telepon'] : ''; ?>" required>
        <input class="input" type="text" name="alamat" placeholder="Alamat" value="<?= isset($row) ? $row['alamat'] : ''; ?>" required>
        <button class="btn btn-save" type="submit" name="proses" value="<?= $tombol ?>">Simpan</button>
        <a href="index.php?hal=data-pasien">
            <button class="btn btn-cancel" type="button">Batal</button>
        </a>
    </form>
