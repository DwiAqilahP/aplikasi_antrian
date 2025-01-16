<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
<!DOCTYPE html>
<html>
<head>
    <?php 
      include "config/database.php";
      $id_pelayanan = $_SESSION['id_pelayanan'];
      $query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
      while ($tmpl = mysqli_fetch_array($query) ){
    ?>
	<title>ANTRIAN <?php echo $tmpl['nama_pelayanan'] ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style type="text/css">
        body{
            background-image: url('admin/file/<?php echo $tmpl['bg'] ?>');
            background-repeat: repeat-y;
            background-size: cover;
        }

    </style>
</head>

<body>
    <div class = "judul"> 
        <h1> APLIKASI ANTRIAN <?php echo $tmpl['nama_pelayanan'] ?></h1>
        <?php
    }
        $id_profil = $_SESSION['id_profil'];
        $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
        while ($tampil = mysqli_fetch_array($data) ){
        ?>
        <h1><?php echo $tampil['nama_instansi']?></h1>
    </div>
    <?php } ?>
    <div class="content1">
        <a href="display/display.php"><button class="button button first">DISPLAY</button></a>
     </div>
    
    <div class="content2">
        <a href="user/menu_user.php"><button class="button button first">USER</button></a>
    </div>

    <div class="content3">
        <a href="panggil_nomor/panggil.php"><button class="button button first">PANGGIL ANTRIAN</button></a>
    </div>
    <div class="content4">
        <a href="user/data_user.php"><button class="button button first">DATA USER</button></a>
    </div>
    <div class="content5">
        <a href="rating/hasil_rating.php"><button class="button button first">HASIL RATING</button></a>
    </div>
    <div class="content6">
        <a href="logout.php"><button class="button button first">Logout</button></a>
    </div>
</body>

</html>