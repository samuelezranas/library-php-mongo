<?php
   if(isset($_POST['submit'])){
      require 'configA.php';
      $insertOneResult = $collection->insertOne([
          'IDAdmin' => $_POST['adminID'],
          'FullName' => $_POST['fullname'],
          'Password' => $_POST['password'],
      ]);
      $_SESSION['success'] = "Akun Admin berhasil di register!";
      header("Location: welcome.php");
   }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Admin Perpustakaan</title>
	<style>
        /* CSS styles for the login form */
        @font-face {
            font-family: 'Futura Medium Bt';
            src: url('path/to/futura medium bt.ttf') format('truetype');
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Futura Medium Bt', Arial, sans-serif;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f1f1f1;
        }

        .login-form {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group .error {
            color: red;
        }

        .form-group .success {
            color: green;
        }

        .form-group .message {
            margin-top: 5px;
        }

        .form-group .message a {
            text-decoration: none;
        }

        .form-group .message a:hover {
            text-decoration: underline;
        }

        .form-group .submit-btn {
            width: 100%;
            padding: 8px;
            background-color: #5E503F;
            border: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
        <form class="login-form" action="" method="POST">
            <h2>SIGN UP</h2>
            <div class="form-group">
                <input type="text" name="adminID" required placeholder="Username/ID">
            </div>
            <div class="form-group">
                <input type="text" name="fullname" required placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="password" name="password" required placeholder="Masukan Password">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="submit-btn">SIGN UP</button>
            </div>
            <div class="form-group message">
                <CENTER>Already have an account? <a href="welcome.php">Login</a><CENTER>
            </div>
        </form>
    </div>
</body>
</html>