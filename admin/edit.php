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
                <h1>Edit Petugas</h1>
                <small>Home/Edit Petugas</small>
            </div>
        </main>
        <div class="form1">
          <?php
          $id_pelayanan= $_GET['id_pelayanan'];
          if (isset($_POST['edit'])) {
            $username = $_POST['username'];
            $nama = $_POST['nama_pelayanan'];
            $edit= mysqli_query($conn, "UPDATE login SET username = '$username' WHERE id_pelayanan= '$id_pelayanan'");
            $edit2= mysqli_query($conn, "UPDATE pelayanan SET nama_pelayanan = '$nama' WHERE id_pelayanan= '$id_pelayanan'");
            $name=$_FILES['file_video']['name'];
            $type=$_FILES['file_video']['type'];
            $size=$_FILES['file_video']['size'];
            $nama_file=str_replace(" ","_",$name);
            $tmp_name=$_FILES['file_video']['tmp_name'];
            $nama_folder="video/";
            $file_baru=$nama_folder.basename($nama_file);
            if ((($type == "video/mp4") || ($type == "video/3gpp"))){
               move_uploaded_file($tmp_name,$file_baru);
               mysqli_query ($conn,"UPDATE pelayanan SET video_pelayanan='$name' WHERE id_pelayanan='$id_pelayanan'");
               $pesan="Upload file video $nama_file berhasil diupload";
            }
            else{
                $pesan=".!";
            }       
            echo "<p style='color:green;'>$pesan</p>";

            if ($edit or $edit2) {
              echo "<script> alert ('Data berhasil diedit');
              document.location='kelola_petugas.php';
              </script>";
              
            } else{
              echo "<script> alert ('Data Gagal diedit') ;
              document.location='kelola_petugas.php';
              </script>";
              
            }

          }
        
 ?>
          <form action="" method="POST" enctype="multipart/form-data">
              <?php
              $id_profil = $_SESSION['id_profil'];
              $data_rating = mysqli_query($conn, "select * from login RIGHT JOIN pelayanan ON login.id_pelayanan = pelayanan.id_pelayanan where login.id_pelayanan= '$id_pelayanan' and nama_pelayanan != 'admin'; ");
              while ($data = mysqli_fetch_assoc($data_rating)) {
              ?>
              <label for="nama">nama_pelayanan</label>
              <input type="text" id="nama" name="nama_pelayanan" value="<?php echo $data['nama_pelayanan']?>">

              <label for="user">username</label>
              <input type="text" id="user" name="username"  value="<?php echo $data['username']?>">

              <label>video profil.MP4</label> 
              <input type="file" name="file_video" value="<?php echo $data['video_pelayanan']?>"><br>

              <input type="submit" value="Edit" name="edit">

              <p>Ubah Password? <a href="ubahpw.php?id_login=<?php echo $data['id_login']; ?>">Ubah</a></p>
            </form>
          <?php } ?>

      </div>
    </div>
</body>
</html>