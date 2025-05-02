<?php
    // Include the database connection file
    require_once '../dbkoneksi.php';

    // get the form data
    $_pasien_id = $_POST['nama_pasien'];
    $_paramedik_id = $_POST['nama_paramedik'];
    $_berat = $_POST['berat'];
    $_tinggi = $_POST['tinggi'];
    $_sistolik = $_POST['sistolik'];
    $_diastolik = $_POST['diastolik'];
    $_tensi = $_sistolik . '/' . $_diastolik;
    $_tanggal = $_POST['tanggal'];
    $_keterangan = $_POST['keterangan'];

    // save the data to array
    $data = [
        $_pasien_id, $_paramedik_id, $_berat, $_tinggi, $_tensi, $_tanggal, $_keterangan
    ];

    $_proses = $_REQUEST['proses']; // get the process type from the form (use $_REQUEST to handle both GET and POST)
    if ($_proses == "Simpan") {
        // insert the data into the database
        $sql = "INSERT INTO periksa (pasien_id, paramedik_id, berat, tinggi, tensi, tanggal, keterangan)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute($data);
    } elseif ($_proses == "Update") {
        // get the id from the form data
        $_idx = isset($_POST['id']) ? $_POST['id'] : null;
        if (!$_idx) {
            die("Error: ID is missing for update operation.");
        }
        // update the data in the database
        $sql = "UPDATE periksa SET pasien_id=?, paramedik_id=?, berat=?, tinggi=?, tensi=?, tanggal=?, keterangan=? WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $data[] = $_idx;
        $stmt->execute($data);
    } elseif ($_proses == "Hapus") {
        // get the id from the URL
        $_idx = $_GET['id'];
        // delete the data from the database
        $sql = "DELETE FROM periksa WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute([$_idx]);
    }

    // redirect to the data page
    header("Location: ../index.php?hal=data-periksa");
    exit;

