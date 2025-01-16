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
  <style type="text/css">
    <?php
    include "../config/database.php";
    $id_pelayanan = $_SESSION['id_pelayanan'];
    $query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
    while ($tmpl = mysqli_fetch_array($query)) {
    ?>body {
      background-image: url('../admin/file/<?php echo $tmpl['bg'] ?>');
      background-size: cover;
      padding-top: 35px;
    }

    <?php } ?>.table {
      float: right;
      padding-right: 3%;
    }

    .table tr {
      background-color: white;
    }

    .tr_2 {
      font-size: 80px;
    }

    .table span {
      font-size: 25px;
    }

    h1 {
      color: white;
      text-align: center;
      font-size: 50px;
      font-family: CS Gordon Serif;
      padding-top: 30px;
      font-family: arial;
    }

    .nomor {
      width: 350px;
      height: 400px;
      padding: 10px;
      background-color: white;
      color: black;
      font-family: arial;
      margin-top: 30px;
    }

    .pb {
      font-size: 30px;
      margin-bottom: 2px;
      font-family: arial;
    }

    h3 {
      background-color: blue;
      color: black;
      font-family: arial;
    }

    .nomer {
      font-size: 180px;
      margin-top: 15px;
      margin-bottom: 5px;
      font-family: arial;
    }

    .ps {
      font-size: 22px;
      margin-bottom: 15px;
      margin-top: 7px;
      font-family: arial;
    }

    .na {
      font-size: 15px;
      margin-top: 5px;
      font-family: arial;
    }

    button[type=submit] {
      width: 370px;
      background-color: lightgrey;
      color: black;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 18px;
      font-family: arial;
    }

    .tw {
      background-color: red;
      font-family: arial;
    }

    .label1 {
      width: 120px;
      height: 120px;
      float: left;
      padding-top: 0px;
      font-family: arial;
    }

    .label2 {
      width: 100px;
      height: 125px;
      float: right;
      padding-top: 2px;
      font-family: arial;
    }

    .cetak {
      font-family: arial;
    }
  </style>
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
</head>

<body id="body">
  <script type="text/javascript">
    function play() {
      responsiveVoice.speak(
        "Nomor Antrian Berhasil Dicetak",
        "Indonesian Female", {
          pitch: 1,
          rate: 1,
          volume: 1
        }
      );
    }
  </script>
  <?php
  $id_profil = $_SESSION['id_profil'];
  $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
  while ($tampil = mysqli_fetch_array($data)) {
  ?>
    <table width="100%">
      <tr>
        <td width="20%" align="center" rowspan="2"><img src="../admin/file/<?php echo $tampil['logo1'] ?>" width="110px" height="123px"></td>
        <td width="60%" align="center" rowspan="2">
          <h1 style="font-size: 38px;color: white;">SILAHKAN AMBIL NOMOR ANTRIAN SELANJUTNYA</h1>
        </td>
        <td width="20%" align="center" rowspan="2"><img src="../admin/file/<?php echo $tampil['logo2'] ?>" width="110px" height="123px"></td>
      </tr>
    </table>
    <!-- <div>
    <img src="../images/logo.png" class="label1">
    <img src="../images/poldajatim.png" class="label2" >
  </div>
  <div>
    <h1>SILAHKAN AMBIL NOMOR ANTRIAN</h1>
  </div> -->
    <div id="print">
      <center>
        <div class="nomor">
          <p class="pb"><?php echo $tampil['nama_instansi'] ?></p>
        <?php }
      $id_pelayanan = $_SESSION['id_pelayanan'];
      $query1 = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
      while ($tmpl1 = mysqli_fetch_array($query1)) { ?>
          <p class="ps">PELAYANAN <?php echo $tmpl1['nama_pelayanan'] ?></p>
        <?php } ?>
        <p class="na">NOMOR ANTRIAN</p>
        <p class="nomer" id="antrian"> </p>
        <p><span id="tanggalwaktu"></span></p>

        <script>
          function date_time(id) {
            date = new Date;
            tahun = date.getFullYear();
            bulan = date.getMonth();
            tanggal = date.getDate();
            hari = date.getDay();

            namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            namahari = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

            h = date.getHours();
            if (h < 10) {
              h = "0" + h;
            }
            m = date.getMinutes();
            if (m < 10) {
              m = "0" + m;
            }
            s = date.getSeconds();
            if (s < 10) {
              s = "0" + s;
            }

            //susun dengan format baru
            result = ' ' + tanggal + ' ' + namabulan[bulan] + ' ' + tahun + ' / ' + h + ':' + m + ':' + s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("' + id + '");', '1000');
            return true;
          }
        </script>
        <span id="date_time"></span>
        </div>
</body>
<script type="text/javascript" src="datetime.js"></script>
<script type="text/javascript">
  window.onload = date_time('date_time');
</script>
<script type="text/javascript" src="datetime.js"></script>
<script type="text/javascript">
  window.onload = date_time('date_time');
</script>
</div>
</div>
<div>
  <!-- <a href="cetakantri.php"><button type="submit" class="cetak" id="insert">CETAK ANTRIAN</button></a> -->
  <center>
    <a id="insert" href="javascript:void(0)">
      <button type="submit" class="cetak" id="insert" onclick="play()">CETAK NOMOR ANTRIAN SELANJUTNYA</button>
    </a>
  </center>
</div>
<script type="text/javascript">
</script>
</center>

<!-- jQuery Core -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // tampilkan jumlah antrian
    $('#antrian').load('get_antrian.php');

    // proses insert data
    $('#insert').on('click', function() {
      $.ajax({
        type: 'POST', // mengirim data dengan method POST
        url: 'insert.php', // url file proses insert data
        success: function(result) { // ketika proses insert data selesai
          // jika berhasil
          if (result === 'Sukses') {
            // tampilkan jumlah antrian
            $('#antrian').load('get_antrian.php').fadeIn('slow');
            // var body = document.getElementById('body').innerHTML;
            // var print = document.getElementById('print').innerHTML;
            // document.getElementById('body').innerHTML=print;
            // window.print();
            window.location = 'cetakantri.php';
          }
        },
      });
    });
  });
</script>
</body>

</html>