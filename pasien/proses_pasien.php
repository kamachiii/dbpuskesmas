<?php
    // Include the database connection file
    require_once '../dbkoneksi.php';
    // get the form data
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan = $_POST['kelurahan'];
    // save the data to array
    $data = [
        $_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan
    ];

    $_proses = $_REQUEST['proses'];
    if ($_proses == "Simpan") {
        // insert the data into the database
        $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute($data);
    }elseif ($_proses == "Update") {
        // get the id from the URL
        $_idx = $_POST['id'];
        // update the data in the database
        $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $data[] = $_idx;
        $stmt->execute($data);
    }elseif ($_proses == "Hapus") {
        // get the id from the URL
        $_idx = $_GET['id'];
        // delete the data from the database
        $sql = "DELETE FROM pasien WHERE id=?";
        // prepare the statement
        $stmt = $dbh->prepare($sql);
        // execute the statement with the data
        $stmt->execute([$_idx]);
    }

    // redirect to the data page
    header("Location: ../index.php?hal=data-pasien");
    exit;

