<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ubah password</title>
    <style type="text/css">
        body{
            background-image: url('file/bg.png');
            }
            
 
        h1{
            text-align: center;
            font-weight: 300;
        }
         
        .tulisan_login{
            text-align: center;
        }
         
        .kotak_login{
            width: 350px;
            background: white;
            margin: 80px auto;
            padding: 30px 20px;
            border-radius: 50px;
        }
         
        label{
            font-size: 11pt;
        }
         
        .form_login{
            box-sizing : border-box;
            width: 100%;
            padding: 10px;
            font-size: 11pt;
            margin-bottom: 20px;
            background-color: lightgrey;
        }
         
        .tombol_ubah{
            background: grey;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
        }
         
        .link{
            color: #232323;
            text-decoration: none;
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <?php include "../config/database.php";
    if (isset($_POST['edit'])) {
        $id= $_GET['id_login'];

        $pass_lama = $_POST['pass_lama'];
        $pass_baru = $_POST['pass_baru'];
        $konf_pass = $_POST['konf_pass'];
        //cek old password
        $query = "SELECT * FROM login WHERE id_login='$id' AND pw='$pass_lama'";
        $sql = mysqli_query ($conn,$query);
        $hasil = mysqli_num_rows ($sql);
    if (! $hasil >= 1) {
        ?>
            <script language="JavaScript">
            alert('Password lama tidak sesuai!, silahkan ulang kembali!');
            document.location='ubah_pass.php';
            </script>
        <?php
    }
    //validasi data data kosong
    else if (empty($_POST['pass_baru']) || empty($_POST['konf_pass'])) {
            echo "<h3><font color=red>Ganti Password Gagal! Data Tidak Boleh Kosong.</font></h3>";    
    }
    //validasi input konfirm password
    else if (($_POST['pass_baru']) != ($_POST['konf_pass'])) {
            echo "<h3><font color=red><center>Ganti Password Gagal! Password dan Konfirm Password Harus Sama.</center></font></h3>";    
    }
    else {
        //update data
        $query = "UPDATE login SET pw='$pass_baru' WHERE id_login='$id'";
        $sql = mysqli_query ($conn,$query);
        //setelah berhasil update
        if ($sql) { ?>
            <script language="JavaScript">
                alert('Password Berhasil Diubah');
                document.location='kelola_petugas.php';
            </script>
        <?php 
        } else {
            echo "<script> alert ('Password Gagal Diubah')</script>";  
        }
    }
    }
?>
    <div class="kotak_login">
        <b><p class="tulisan_login">Silahkan ubah password anda</p></b>
        <form action="" method="post">
            <label>Password Lama</label><br>

            <input type="password" name="pass_lama" class="form_login" placeholder="Password lama .."><br>
            <label>Password Baru</label><br>

            <input type="password" name="pass_baru" class="form_login" placeholder="Password baru .."><br>


            <label>Password Baru, Lagi</label><br>

            <input type="password" name="konf_pass" class="form_login" placeholder="Password baru, lagi .."><br>

 
            <input type="submit" class="tombol_ubah" value="Ubah" name="edit">
           
 
            <br/>
            <br/>
            <center>
                <a class="link" href="kelola_petugas.php">Kembali</a>
            </center>
        </form>
    </div>


</body>
</html>