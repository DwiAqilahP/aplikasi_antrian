<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ambil Nomor</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/jsbarcode.min.js"></script>
    <style type="text/css">
        body{
            background-color: white;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .nomor{
            width: 350px;
            height: 400px;
            padding: 10px;
            color: black;
            font-family: CS Gordon Serif;
            margin-top: 30px;
            text-align: center;
        }
        /* Rest of your CSS styles */
        /* ... */
    </style>
</head>
<body>
    <div class="container">
        <div class="nomor" id="print">
            <?php 
            include "../config/database.php";
            $id_profil = $_SESSION['id_profil'];
            $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
            while ($tampil = mysqli_fetch_array($data) ){
            ?>
            <p class="pb"><?php echo $tampil['nama_instansi']?></p>
            <?php } 
            $id_pelayanan = $_SESSION['id_pelayanan'];
            $query1 = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
            while ($tmpl1 = mysqli_fetch_array($query1) ){ ?>
            <p class="ps">PELAYANAN <?php echo $tmpl1['nama_pelayanan']?></p>
            <?php } ?>

            <p class="na">NOMOR ANTRIAN</p>
            <?php 
            $data = mysqli_query($conn, "SELECT id_antrian,no_antrian FROM antrian WHERE id_pelayanan = '$id_pelayanan' ORDER BY id_antrian DESC LIMIT 1");
            while ($tampil = mysqli_fetch_array($data) ){
            ?>
            <p class="nomer" style="font-size: 50px;"><?php echo $tampil['no_antrian'] ?></p>
            <hr>
            <p><span id="tanggalwaktu"></span></p>
            <a href="formulir.php?id_antrian=<?php echo $tampil['id_antrian']; ?>">
            <img src="barcode.png" alt="Barcode" width="100px" height="100px"></a>
            <p>Silahkan scan barcode di atas untuk mengisi formulir data diri:</p>
            <?php } ?>
            <script>
            var tw = new Date();
            if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
            else (a=tw.getTime());
            tw.setTime(a);
            var tahun= tw.getFullYear ();
            var hari= tw.getDay ();
            var bulan= tw.getMonth ();
            var tanggal= tw.getDate ();
            var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
            var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
            document.getElementById("tanggalwaktu").innerHTML = " "+tanggal+" "+bulanarray[bulan]+" "+tahun+" " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
            </script>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
            // window.location.href = "menu_user.php";
        };
    </script>
</body>
</html>
