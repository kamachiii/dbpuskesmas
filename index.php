<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
        color: #007bff;
        font-size: 2.5rem;
    }

    p {
        text-align: center;
        font-size: 1.2rem;
        color: #555;
    }

    a {
        text-decoration: none;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Table Styles */
    .table-pasien {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table-pasien th, .table-pasien td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .table-pasien th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table-pasien tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-pasien tr:hover {
        background-color: #e9ecef;
    }

    .table-pasien tfoot td {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 5px;
        color: #fff;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-add {
        background-color: #28a745;
    }

    .btn-add:hover {
        background-color: #218838;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-cancel {
        background-color: #6c757d;
    }

    .btn-cancel:hover {
        background-color: #5a6268;
    }

    /* Form Styles */
    .form-pasien {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: #007bff;
    }

    .input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .input-radio {
        margin-right: 5px;
    }

    /* Card Styles */
    .card {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .sub-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .sub-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 1.5rem;
        color: #007bff;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .text-slash {
        font-size: 1.5rem;
        align-self: center;
        color: #555;
    }
</style>

<h1>Selamat Datang di Puskesmas</h1>

<?php
    if (isset($_GET['hal']) && !empty($_GET['hal'])) {
        $hal = $_GET['hal'];
        if ($hal == 'data-pasien') {
            require_once 'pasien/data_pasien.php';
        }
        elseif ($hal == 'tambah-pasien') {
            require_once 'pasien/form_pasien.php';
        }elseif ($hal == 'data-paramedik') {
            require_once 'paramedik/data_paramedik.php';
        }elseif ($hal == 'tambah-paramedik') {
            require_once 'paramedik/form_paramedik.php';
        }elseif ($hal == 'data-periksa') {
            require_once 'periksa/data_periksa.php';
        }elseif ($hal == 'tambah-periksa') {
            require_once 'periksa/form_periksa.php';
        }else {
            echo "Halaman tidak ditemukan";
        }

        echo '<br><br><a href="index.php" class="btn btn-add">Kembali ke Halaman Utama</a>';
    }else { ?>
        <p>Silakan pilih menu di bawah untuk melanjutkan.</p>
        <div class="card">
            <div class="sub-card">
                <h3 class="card-title">Data Pasien</h3>
                <a href="index.php?hal=data-pasien" class="btn btn-add">Lihat Data</a>
                <a href="index.php?hal=tambah-pasien" class="btn btn-add">Tambah Data</a>
            </div>
            <div class="sub-card">
                <h3 class="card-title">Data Paramedik</h3>
                <a href="index.php?hal=data-paramedik" class="btn btn-add">Lihat Data</a>
                <a href="index.php?hal=tambah-paramedik" class="btn btn-add">Tambah Data</a>
            </div>
            <div class="sub-card">
                <h3 class="card-title">Data Periksa</h3>
                <a href="index.php?hal=data-periksa" class="btn btn-add">Lihat Data</a>
                <a href="index.php?hal=tambah-periksa" class="btn btn-add">Tambah Data</a>
            </div>
        </div>
    <?php } ?>

