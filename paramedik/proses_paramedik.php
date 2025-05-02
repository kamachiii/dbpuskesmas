<?php
    // Include the database connection file
    require_once '../dbkoneksi.php';
    // get the form data
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_telepon = $_POST['telepon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja = $_POST['unit_kerja'];
    if ($_unit_kerja == 1) {
        $_kategori = 'Dokter Gigi';
    }elseif ($_unit_kerja == 2) {
        $_kategori = 'Dokter Umum';
    }elseif ($_unit_kerja == 3) {
        $_kategori = 'Dokter Ibu & Anak';
    }
    // save the data to array
    $data = [
        $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_kategori, $_telepon, $_alamat, $_unit_kerja
    ];

    $_proses = $_REQUEST['proses']; // get the process type from the form (use $_REQUEST to handle both GET and POST)
    if ($_proses == "Simpan") {
        // insert the data into the database
        $sql = "INSERT INTO paramedik (nama, tmp_lahir, tgl_lahir, gender, kategori, telepon, alamat, unit_kerja_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute($data);
    }elseif ($_proses == "Update") {
        // get the id from the form data
        $_idx = isset($_POST['id']) ? $_POST['id'] : null;
        if (!$_idx) {
            die("Error: ID is missing for update operation.");
        }
        // update the data in the database
        $sql = "UPDATE paramedik SET nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, kategori=?, telepon=?, alamat=?, unit_kerja_id=? WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $data[] = $_idx;
        $stmt->execute($data);
    }elseif ($_proses == "Hapus") {
        // get the id from the URL
        $_idx = $_GET['id'];
        // delete the data from the database
        $sql = "DELETE FROM paramedik WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute([$_idx]);
    }

    // redirect to the data page
    header("Location: ../index.php?hal=data-paramedik");
    exit;

