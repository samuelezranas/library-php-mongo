<?php session_start();
   require 'config/configM.php';
   if (isset($_GET['id'])) {
      $mhs = $collectionMahasiswa->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collectionMahasiswa->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['NIM' => $_POST['NIM'], 'Nama' => $_POST['Nama'], 'JK' => $_POST['JK'], 'Fak' => $_POST['Fak'], 'PS' => $_POST['PS'],]]
      );
      $_SESSION['success'] = "Data Mahasiswa berhasil diubah";
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
         <CENTER><h1>Edit Data Mahasiswa</h1></CENTER>
         <a href="index.php" class="btn btn-primary">Kembali</a>
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
            <button type="submit" name="submit" class="btn btn-dark">Simpan Perubahan</button>
        </div>
         </form>
      </div>
   </body>
</html>