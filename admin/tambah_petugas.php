<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_dsb.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title> Home/Settings </title>
    <style type="text/css">
        input[type=text],input[type=file] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          background-color: white;
          color: black;
        }
         input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          background-color: white;
          color: black;
        }

        select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          background-color: white;
          color: black;
        }

        input[type=submit] {
          width: 100%;
          background-color: deepskyblue;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: deepskyblue;
        }

        .form1 {
          border-radius: 5px;
          background-color: transparent;
          padding: 20px;
          color: white;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
          width: 100%;
          font-family: "Inter", Arial;
        }
        .main-content{
          width: 100%;

        }
        .formbold-mb-5 {
          margin-bottom: 20px;
        }
        .formbold-pt-3 {
          padding-top: 12px;
        }
        .formbold-main-wrapper {
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
        }

        .formbold-form-wrapper {
          margin: 0 auto;
          max-width: 550px;
          width: 100%;
          background: white;
        }
        .formbold-form-label {
          display: block;
          font-weight: 500;
          font-size: 16px;
          color: white;
          margin-bottom: 12px;
        }
        .formbold-form-label-2 {
          font-weight: 600;
          font-size: 20px;
          margin-bottom: 20px;
          color: white;
        }

        .formbold-form-input {
          width: 100%;
          padding: 12px 24px;
          border-radius: 6px;
          border: 1px solid #e0e0e0;
          background: white;
          font-weight: 500;
          font-size: 16px;
          color: #6b7280;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-btn {
          text-align: center;
          font-size: 16px;
          border-radius: 6px;
          padding: 14px 32px;
          border: none;
          font-weight: 600;
          background-color: #6a64f1;
          color: white;
          cursor: pointer;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold--mx-3 {
          margin-left: -12px;
          margin-right: -12px;
        }
        .formbold-px-3 {
          padding-left: 12px;
          padding-right: 12px;
        }
        .flex {
          display: flex;
        }
        .flex-wrap {
          flex-wrap: wrap;
        }
        .w-full {
          width: 100%;
        }

        .formbold-file-input input {
          opacity: 0;
          position: absolute;
          width: 100%;
          height: 100%;
        }

        .formbold-file-input label {
          position: relative;
          border: 1px dashed #e0e0e0;
          border-radius: 6px;
          min-height: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
          text-align: center;
        }
        .formbold-drop-file {
          display: block;
          font-weight: 600;
          color: white;
          font-size: 20px;
          margin-bottom: 8px;
        }

        .formbold-or {
          font-weight: 500;
          font-size: 16px;
          color: white;
          display: block;
          margin-bottom: 8px;
        }
        .formbold-browse {
          font-weight: 500;
          font-size: 16px;
          color: white;
          display: inline-block;
          padding: 8px 28px;
          border: 1px solid #e0e0e0;
          border-radius: 4px;
        }

        .formbold-file-list {
          border-radius: 6px;
          background: #f5f7fb;
          padding: 16px 32px;
        }

        .formbold-file-item {
          display: flex;
          align-items: center;
          justify-content: space-between;
        }

        .formbold-file-item button {
          color: #07074d;
          border: none;
          background: transparent;
          cursor: pointer;
        }

        .formbold-file-name {
          font-weight: 500;
          font-size: 16px;
          color: #07074d;
          padding-right: 12px;
        }
        .formbold-progress-bar {
          margin-top: 20px;
          position: relative;
          width: 100%;
          height: 6px;
          border-radius: 8px;
          background: #e2e5ef;
        }

        .formbold-progress {
          position: absolute;
          width: 75%;
          height: 100%;
          left: 0;
          top: 0;
          background: #6a64f1;
          border-radius: 8px;
        }
        @media (min-width: 540px) {
          .sm\:w-half {
            width: 50%;
          }
        }

    </style>
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div >     
        <main>
            <div class="page-header">
                <h1>Tambah Petugas</h1>
                <small>Home/Tambah Petugas</small>
            </div>
        </main>
        <div class="form1">
          <?php
          if (isset($_POST['tambah'])) {
           $username = $_POST['username'];
           $nama = $_POST['nama_pelayanan'];
           $password = $_POST['pw'];
           $cpassword = $_POST['repw'];

           $id_profil = $_SESSION['id_profil'];
           $nama_pelayanan = mysqli_query($conn,"SELECT nama_pelayanan FROM pelayanan WHERE id_profil='$id_profil'");
           if ($nama != $nama_pelayanan){
                mysqli_query($conn,"INSERT INTO pelayanan (id_profil,nama_pelayanan)
                             VALUES ('$id_profil','$nama')");
                $name=$_FILES['file_video']['name'];
                $type=$_FILES['file_video']['type'];
                $size=$_FILES['file_video']['size'];
                $nama_file=str_replace(" ","_",$name);
                $tmp_name=$_FILES['file_video']['tmp_name'];
                $nama_folder="video/";
                $file_baru=$nama_folder.basename($nama_file);
                if ((($type == "video/mp4") || ($type == "video/3gpp"))){
                   move_uploaded_file($tmp_name,$file_baru);
                   mysqli_query($conn,"INSERT INTO pelayanan (video_pelayanan)
                             VALUES ('$name')");
                }
                else{
                    echo "Error: " . mysqli_error($conn);
                }       
                // echo "<p style='color:green;'>$pesan</p>";

                if ($password == $cpassword) {
                 $sql1 = "SELECT * FROM login WHERE username='$username'";
                 $result1 = mysqli_query($conn, $sql1);
                 if (!$result1->num_rows > 0) {
                      $idpel = mysqli_query($conn,"SELECT * FROM pelayanan order by id_pelayanan desc limit 1");
                      while ($data = mysqli_fetch_assoc($idpel)) {
                       $data1=  $data['id_pelayanan'];
                      } 
                     $sql = "INSERT INTO login (username, pw, id_profil, id_pelayanan ) VALUES ('$username','$password', '$id_profil', '$data1')";
                     $result = mysqli_query($conn, $sql);
                     if ($result) { ?>
                        <script>alert('Selamat, registrasi berhasil!')</script>
                        <script>document.location='kelola_petugas.php';</script> 
                        <?php
                     } else {
                         echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                     }
                 } else {
                     echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
                 }
                  
             } else {
                 echo "<script>alert('Password Tidak Sesuai')</script>";
             }
           }else{
            echo "<script>alert('nama pelayanan sudah tersedia')</script>";
           }
       }
        
 ?>
          <form action="" method="POST" enctype="multipart/form-data">
              <label for="nama">nama_pelayanan</label>
              <input type="text" id="nama" name="nama_pelayanan" placeholder="ketik nama pelayanan">

              <label for="user">username</label>
              <input type="text" id="user" name="username"  placeholder="ketik nama username">

              <label>video profil.MP4</label> 
              <input type="file" name="file_video"><br>

              <label for="pw">Password</label>
              <input type="password" id="pw" name="pw"   >

              <label for="repw">Ulangi Password</label>
              <input type="password" id="repw" name="repw"  >

              <input type="submit" value="tambah" name="tambah">
            </form>


      </div>
    </div>
</body>
</html>