<?php
session_start();
if(isset($_POST['submit'])){
    require 'config/configM.php';

    // Validasi NIM hanya menerima angka
    $nim = $_POST['NIM'];
    if (!ctype_digit($nim)) {
        $_SESSION['error'] = "NIM hanya boleh berupa angka!";
        header("Location: indexM.php");
        exit();
    }

    $insertOneResult = $collectionMahasiswa->insertOne([
        'NIM' => $nim,
        'Nama' => $_POST['Nama'],
        'JK' => $_POST['JK'],
        'Fak' => $_POST['Fak'],
        'PS' => $_POST['PS'],
    ]);
    $_SESSION['success'] = "Data Mahasiswa Berhasil ditambahkan!";
    header("Location: indexM.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>JIMBARAN LIBRARY</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <CENTER><h1>Tambah Data Mahasiswa</h1></CENTER>
    <a href="index.php" class="btn btn-light">Kembali</a>
    <form method="POST">
        <div class="form-group">
            <strong>NIM:</strong><br>
            <input type="text" class="form-control" name="NIM" required="" placeholder="xxxxxxxxx">
            <br>
            <strong>Nama:</strong><br>
            <input type="text" class="form-control" name="Nama" placeholder="Masukan Nama Lengkap">
            <br>
            <strong>Jenis Kelamin:</strong><br>
            <input type="text" class="form-control" name="JK" placeholder="Jenis Kelamin">
            <br>
            <strong>Fakultas:</strong><br>
            <input type="text" class="form-control" name="Fak" placeholder="Masukan nama Fakultas">
            <br>
            <strong>Program Studi:</strong><br>
            <input type="text" class="form-control" name="PS" placeholder="Masukan nama Program Studi">
            <br>
            <button type="submit" name="submit" class="btn btn-dark">Tambah Mahasiswa</button>
        </div>
    </form>
</div>
</body>
</html>
