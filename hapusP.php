<?php session_start();
   require 'config/configP.php';
   if (isset($_GET['id'])) {
      $pmj = $collectionPeminjam->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
         require 'config/configP.php';
   $collectionPeminjam->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "Data Peminjam Berhasil dihapus";
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
         <CENTER><h1>Hapus Data Mahasiswa</h1></CENTER>
         <h3> Yang bernama <?php echo "$pmj->Nama"; ?> dengan NIM <?php echo "$pmj->NIM"; ?> ? </h3>
         <form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$pmj->NIM"; ?>" class="form-control" name="NIM">
               <a href="index.php" class="btn btn-primary">Kembali</a>
               <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </body>
</html>