<?php
session_start();

require 'config/configB.php';
$distinctBooks = $collection_buku->distinct("Nama_Buku");

if (isset($_POST['submit'])) {
    require 'config/configM.php'; // Koneksi ke koleksi Mahasiswa

    // Validasi NIM di koleksi Mahasiswa
    $mahasiswa = $collectionMahasiswa->findOne(['NIM' => $_POST['NIM']]);

    if ($mahasiswa) {
        // Jika NIM ditemukan, dapatkan Nama Lengkap
        $namaLengkap = $mahasiswa['Nama'];

        require 'config/configP.php'; // Koneksi ke koleksi Peminjaman

        // Mengonversi input 'Waktu' menjadi objek DateTime
        $dateTime = new DateTime($Waktu);

        // Menambahkan 2 minggu ke objek DateTime
        $dateTime->add(new DateInterval('P2W'));

        // Mendapatkan nilai 'tenggatWaktu' dalam format yang diinginkan (misal: Y-m-d H:i:s)
        $Waktu = $dateTime->format('Y-m-d H:i:s');
        $tenggatWaktu = $dateTime->format('Y-m-d');

        // Simpan data peminjam dengan Nama Lengkap yang terkait dengan NIM
        $insertOneResult = $collectionPeminjam->insertOne([
            'NIM' => $_POST['NIM'],
            'Nama' => $namaLengkap, // Isi otomatis dengan Nama Lengkap
            'Buku1' => $_POST['Nama_Buku1'],
            'Buku2' => $_POST['Nama_Buku2'],
            'Waktu' => $_POST['Waktu'],
            'TenggatWaktu' => $tenggatWaktu, // Menambahkan nilai tenggatWaktu ke dalam data peminjam
        ]);

        header("Location: index.php");
        $_SESSION['success'] = "Data Peminjam Berhasil ditambahkan!";
    } else {
        // NIM tidak ditemukan, berikan pesan kesalahan
        $_SESSION['error'] = "NIM tidak ditemukan dalam koleksi Mahasiswa!";
    }
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
    <CENTER><h1>Tambah Data Peminjam</h1></CENTER>
    <a href="index.php" class="btn btn-light">Kembali</a>
    <?php
    // Tampilkan pesan error jika ada
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <br><strong>NIM:</strong>
            <input type="text" class="form-control" name="NIM" required="" placeholder="xxxxxxxxx">
            <?php
            // Otomatis isi nama berdasarkan NIM jika NIM valid
            if (isset($mahasiswa['Nama'])) {
                echo '<input type="text" class="form-control" name="Nama" value="'.$mahasiswa['Nama'].'" readonly>';
            }
            ?>
            <br><strong>Nama Buku 1:</strong>
            <select class="form-control" name="Nama_Buku1">
                <?php foreach ($distinctBooks as $book) : ?>
                    <option value="<?php echo $book; ?>"><?php echo $book; ?></option>
                <?php endforeach; ?>
            </select>
            <br><strong>Nama Buku 2:</strong>
            <select class="form-control" name="Nama_Buku2">
                <?php foreach ($distinctBooks as $book) : ?>
                    <option value="<?php echo $book; ?>"><?php echo $book; ?></option>
                <?php endforeach; ?>
            </select>
            <br><strong>Waktu:</strong>
            <input type="datetime-local" class="form-control" name="Waktu">
            <br>
            <button type="submit" name="submit" class="btn btn-dark">Tambah Peminjam</button>
        </div>
    </form>
</div>
</body>
</html>
