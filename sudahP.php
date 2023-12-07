<?php session_start();
require 'config/configP.php';

if (isset($_GET['id'])) {
    $pmj = $collectionPeminjam->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}

if (isset($_POST['submit'])) {
    require 'config/configP.php';

    // Ambil data yang akan dipindahkan
    $dataToMove = $collectionPeminjam->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    // Ubah _id menjadi ObjectId baru
    $dataToMove['_id'] = new MongoDB\BSON\ObjectID();

    // Pindahkan data ke koleksi 'sudahP'
    $collectionSudahP->insertOne($dataToMove);

    // Tambahkan kolom baru 'WaktuBalik' dengan nilai tertentu
    $collectionSudahP->updateOne(
        ['_id' => $dataToMove['_id']], // Atur kriteria untuk mencocokkan dokumen yang baru dimasukkan
        ['$set' => ['WaktuBalik' => $_POST['WaktuBalik'],]], // Tambahkan kolom baru dengan nilai default di sini
    );

    // Hapus data dari koleksi 'peminjam'
    $collectionPeminjam->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    $_SESSION['success'] = "Data Peminjam Berhasil telah dipindahkan ke yang Telah Berlangsung";
    header("Location: index.php");
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
    <CENTER><h1>Peminjamannya telah Selesai?</h1></CENTER>
    <h3> <br>Yang bernama <?php echo "$pmj->Nama"; ?> dengan NIM <?php echo "$pmj->NIM"; ?> ? </h3>
    <form method="POST">
        <div class="form-group">
            <input type="datetime-local" class="form-control" name="WaktuBalik">
            <input type="hidden" value="<?php echo "$pmj->NIM"; ?>" class="form-control" name="NIM">
            <a href="index.php" class="btn btn-primary">Kembali</a>
            <button type="submit" name="submit" class="btn btn-success">Selesaikan</button>
        </div>
    </form>
</div>
</body>
</html>
