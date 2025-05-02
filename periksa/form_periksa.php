<?php
    // Include the database connection file
    require_once 'dbkoneksi.php';
    // Check if the form is submitted
    if (isset($_GET['id'])) {
        // Get the id from the URL
        $_idx = $_GET['id'];
        // define the query to get the data
        $sql = "SELECT periksa.*, pasien.nama AS nama_pasien, paramedik.nama AS nama_paramedik
                FROM periksa
                JOIN pasien ON periksa.pasien_id = pasien.id
                JOIN paramedik ON periksa.paramedik_id = paramedik.id
                WHERE periksa.id = ?";
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
    $sql_pasien = "SELECT * FROM pasien";
    $sql_paramedik = "SELECT * FROM paramedik";
    // run the query
    $pasiens = $dbh->query($sql_pasien);
    $paramediks = $dbh->query($sql_paramedik);
?>
    <form class="form-pasien" action="periksa/proses_periksa.php" method="post">
        <h2 class="form-title">Form Periksa</h2>
        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : ''; ?>">
        <select class="input" name="nama_pasien">
            <option value="" hidden>-- Pilih Pasien --</option>
            <?php
                // fetch the results
                foreach ($pasiens as $pasien) {
                    echo "<option value='{$pasien['id']}'";

                    if(isset($row) && $row['nama_pasien'] == $pasien['nama']) echo " selected";

                    echo ">{$pasien['nama']}</option>";
                }
            ?>
        </select>
        <select class="input" name="nama_paramedik">
            <option value="" hidden>-- Pilih Paramedik --</option>
            <?php
                // fetch the results
                foreach ($paramediks as $paramedik) {
                    echo "<option value='{$paramedik['id']}'";

                    echo isset($row) && $row['nama_paramedik'] == $paramedik['nama'] ? " selected" : "";

                    echo ">{$paramedik['nama']}</option>";
                }
            ?>
        </select>
        <input class="input" type="number" name="berat" placeholder="Berat Badan" value="<?= isset($row) ? $row['berat'] : ''; ?>" step="any" required>
        <input class="input" type="number" name="tinggi" placeholder="Tinggi Badan" value="<?= isset($row) ? $row['tinggi'] : ''; ?>" required>
        <div style="display: flex; gap: 10px;">
            <input class="input" type="number" name="sistolik" placeholder="Sistolik" value="<?= isset($row) ? explode('/', $row['tensi'])[0] : ''; ?>" required style="flex: 1;">
            <span class="text-slash">/</span>
            <input class="input" type="number" name="diastolik" placeholder="Diastolik" value="<?= isset($row) ? explode('/', $row['tensi'])[1] : ''; ?>" required style="flex: 1;">
        </div>
        <input class="input" type="date" name="tanggal" placeholder="Tanggal" value="<?= isset($row) ? $row['tanggal'] : date('Y-m-d'); ?>" required>
        <textarea class="input" name="keterangan" placeholder="Keterangan Pasien"><?= isset($row) ? $row['keterangan'] : '' ?></textarea>
        <button class="btn btn-add" type="submit" name="proses" value="<?= $tombol ?>">Simpan</button>
        <a href="index.php?hal=data-periksa">
            <button class="btn btn-cancel" type="button">Batal</button>
        </a>
    </form>
