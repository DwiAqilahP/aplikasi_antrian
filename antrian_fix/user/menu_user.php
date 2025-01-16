<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style type="text/css">
    <?php 
        include "../config/database.php";
        $id_pelayanan = $_SESSION['id_pelayanan'];
        $query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
        while ($tmpl = mysqli_fetch_array($query) ){
    ?>
        body{
            background-image: url("../admin/file/<?php echo $tmpl['bg']?>");
            font-family: arial;
            background-size: cover;
        }
    <?php } ?>
        .btn {
            box-sizing: border-box;
            background-color: transparent;
            border: 5px solid white;
            border-radius: 0.6em;
            color: white;
            cursor: pointer;
            display: flex;
            width: 50%;
            align-self: center;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1;
            margin: 30px;
            padding: 1.9em 2.8em;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-family: 'Montserrat', sans-serif;
            font-weight: 1000;
            padding-left: 20%;

        }
        .btn:hover, .btn:focus {
            color: #fff;
            outline: 0;
        }

        .first {
            transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
        }
        .first:hover {
            box-shadow: 0 0 40px 40px #e74c3c inset;
        }

    </style>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script type="text/javascript">
        var bel = new Audio('../audio/efek.mp3');
        function bunyi() {
          bel.play();
        }
    </script>
</head>
<body>
    <br><br><br><br>
<table width="100%" >
    <tr>
        <?php
        $id_profil = $_SESSION['id_profil'];
        $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
        while ($tampil = mysqli_fetch_array($data) ){ ?>
            <td width="20%" align="center" rowspan="3" ><img src="../admin/file/<?php echo $tampil['logo1']?>" width="110px" height="123px"></td>
        <?php };

        $id_pelayanan = $_SESSION['id_pelayanan'];
        $query1 = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
        while ($tmpl1 = mysqli_fetch_array($query1) ){ ?>
            <td width="60%" align="center"style="color: white; font-size: 40px; font-weight: bold;">SELAMAT DATANG DI PELAYANAN <?php echo $tmpl1['nama_pelayanan']?></td>
        <?php } ?>

        <?php
        $id_profil = $_SESSION['id_profil'];
        $data1 = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
        while ($tampil1 = mysqli_fetch_array($data1) ){?>
            <td width="20%" align="center" rowspan="3"><img src="../admin/file/<?php echo $tampil1['logo2']?>" width="110px" height="123px"></td>
    </tr>
    <tr>
            <td width="60%" align="center" style="font-size:20px;color:white; font-size: 40px;color: white;font-weight: bold;"><?php echo $tampil1['nama_instansi']?></td>
        <?php } ?>
    </tr>
</table>
    <br><br><br>
    <center>
    <a href="ambilnomor.php" class="btn first">Ambil Nomor</a><br>
    <a href="rating.php" class="btn first">Beri Rating</a>
    </center>
    
</body>
</html>