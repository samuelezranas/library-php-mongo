<?php session_start();
   require 'config/configB.php';
   if (isset($_GET['id'])) {
      $mhs = $collectionBuku->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['Kode' => $_POST['Kode'], 'Nama_Buku' => $_POST['Nama_Buku'], 'Pengarang' => $_POST['Pengarang'], 'Penerbit' => $_POST['Penerbit'], 'Tahun' => $_POST['Tahun'], 'Stok' => $_POST['Stok'],]]
      );
      $_SESSION['success'] = "Data Buku berhasil diubah";
      header("Location: indexB.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>APLIKASI </title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Edit Data Buku</h1></CENTER>
         <a href="indexB.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
         <div class="form-group">
               <br><strong>Kode:</strong>
               <input type="text" class="form-control" name="Kode" required="" placeholder="Masukan Kode Buku">
               <br><strong>Buku:</strong>
               <input type="text" class="form-control" name="Nama_Buku" placeholder="Masukan Nama Buku">
               <br><strong>Pengarang:</strong>
               <input type="text" class="form-control" name="Pengarang" placeholder="Masukan Nama Pengarang">
               <br><strong>Penerbit:</strong>
               <input type="text" class="form-control" name="Penerbit" placeholder="Masukan Nama Penerbit">
               <br><strong>Tahun Terbit:</strong>
               <input type="text" class="form-control" name="Tahun" placeholder="Masukan Tahun Terbit">
               <br><strong>Stok Buku:</strong>
               <input type="text" class="form-control" name="Stok" placeholder="Masukan Jumlah Stok">
               <br>
               <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
         </form>
      </div>
   </body>
</html>