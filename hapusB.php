<?php session_start();
   require 'configb.php';
   if (isset($_GET['id'])) {
      $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
         require 'configb.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "Data Buku Berhasil dihapus";
   header("Location: indexb.php");
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
         <CENTER><h1>Hapus Data Buku</h1></CENTER>
         <h3> Yang bernama <?php echo "$mhs->Buku"; ?> dengan Kode <?php echo "$mhs->Kode"; ?> ? </h3>
         <form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$mhs->Kode"; ?>" class="form-control" name="Kode">
               <a href="indexb.php" class="btn btn-primary">Kembali</a>
               <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </body>
</html>