<?php session_start();
require 'config/configB.php';
$distinctBooks = $collection_buku->distinct("Nama_Buku");

   require 'config/configP.php';
   if (isset($_GET['id'])) {
      $pmj = $collectionPeminjam->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collectionPeminjam->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['NIM' => $_POST['NIM'], 'Nama' => $_POST['Nama'], 'Buku1' => $_POST['Buku1'], 'Buku2' => $_POST['Buku2'],]]
      );
      $_SESSION['success'] = "Data Peminjam berhasil diubah";
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
         <CENTER><h1>Edit Data Peminjam</h1></CENTER>
         <a href="index.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
            <div class="form-group">
               <br><strong>NIM:</strong>
               <input type="text" value="<?php echo "$pmj->NIM"; ?>" class="form-control" name="NIM" required="" placeholder="xxxxxxxxx">
               <br><strong>Nama:</strong>
               <input type="text" value="<?php echo "$pmj->Nama"; ?>" class="form-control" name="Nama" required="" placeholder="Nama Lengkap">
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
               <br>
               <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
         </form>
      </div>
   </body>
</html>