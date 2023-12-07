<?php session_start();
   if(isset($_POST['submit'])){
      require 'config/configB.php';
      $insertOneResult = $collectionNama_Buku->insertOne([
          'Kode' => $_POST['Kode'],
          'Nama_Buku' => $_POST['Nama_Buku'],
          'Pengarang' => $_POST['Pengarang'],
          'Penerbit' => $_POST['Tahun'],
          'Tahun' => $_POST['Tahun'],
          'Stok' => $_POST['Stok'],
      ]);
      $_SESSION['success'] = "Data Nama_Buku Berhasil di tambahkan";
      header("Location: indexB.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>APLIKASI</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Tambah Data Nama_Buku</h1></CENTER>
         <a href="indexb.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
            <div class="form-group">
               <br><strong>Kode:</strong>
               <input type="text" class="form-control" name="Kode" required="" placeholder="Masukan Kode Nama_Buku">
               <br><strong>Nama_Buku:</strong>
               <input type="text" class="form-control" name="Nama_Buku" placeholder="Masukan Nama Nama_Buku">
               <br><strong>Pengarang:</strong>
               <input type="text" class="form-control" name="Pengarang" placeholder="Masukan Nama Pengarang">
               <br><strong>Penerbit:</strong>
               <input type="text" class="form-control" name="Penerbit" placeholder="Masukan Nama Penerbit">
               <br><strong>Tahun Terbit:</strong>
               <input type="text" class="form-control" name="Tahun" placeholder="Masukan Tahun Terbit">
               <br><strong>Stok Nama_Buku:</strong>
               <input type="text" class="form-control" name="Stok" placeholder="Masukan Jumlah Stok">
               <br>
               <button type="submit" name="submit" class="btn btn-success">Tambah Nama_Buku</button>
            </div>
         </form>
      </div>
   </body>
</html>