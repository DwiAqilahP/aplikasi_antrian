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
			margin: 0;
			padding: 0;
			width: 100%;
			background-image: url("../admin/file/<?php echo $tmpl['bg']?>");
			font-family: arial;
		}
		<?php } ?>
		.tabel{
			text-align: center;

		}
		video {
		  max-width: 100%;
		  height: 440px;
		  width :855px;
		  max-height: 100%;	
		}

	</style>
</head>
<body>
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
			<td width="60%" align="center"style="color: white; font-size: 40px; font-weight: bold;">PELAYANAN <?php echo $tmpl1['nama_pelayanan']?></td>
		<?php } ?>

		<?php
		$id_profil = $_SESSION['id_profil'];
        $data1 = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
        while ($tampil1 = mysqli_fetch_array($data1) ){?>
			<td width="20%" align="center" rowspan="3"><img src="../admin/file/<?php echo $tampil1['logo2']?>" width="110px" height="123px"></td>
	</tr>
	<tr>
			<td width="60%" align="center" style="font-size:20px;color:white; font-size: 40px;color: white;font-weight: bold;"><?php echo $tampil1['nama_instansi']?></td>
	</tr>
	<tr>
			<td width="60%" align="center" style="font-size:20px;color:white; font-size: 20px;color: white;"><?php echo $tampil1['alamat'] ?></td>
		<?php } ?>
	</tr>
</table>
<div class="tabel">
<table width="100%" align="center" >
	<tr>
		<td style="background-color:white"><h1 style="font-size: 200%">Nomor Antrian<br>Sekarang</h1></td>
		<td colspan="3" rowspan="2" style="background-color:white">
			<?php
			$que = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
			while ($tmp = mysqli_fetch_array($que)){ ?>
			<video autoplay loop>
			  <source src="../admin/video/<?php echo $tmp['video_pelayanan'] ?>" type="video/mp4">
			  Your browser does not support the video tag.
			</video>
		<?php }?>
		</td>
	</tr>
	<tr>
		<td width="30%" style="background-color:white"><h1 id="antrian-sekarang" style="font-size: 700%"></h1></td>
	</tr>
	<tr>
		<td rowspan="4"  style="background-color:white"><h1 style="font-size: 300%; font-weight: bold;">Loket 1</h1></td>
	</tr>
	<tr>
		<td  style="background-color: red; color: white">Antrian selanjutnya</td>
		<td  style="background-color: red; color: white">Sisa antrian</td>
		<td  style="background-color: red; color: white">Jumlah antrian</td>
	</tr>
	<tr>
		<td style="background-color: white"><h1 id="antrian-selanjutnya" style="font-size: 265%"></h1></td>
        <td style="background-color: white"><h1 id="sisa-antrian" style="font-size: 265%"></h1></td>
        <td style="background-color: white"><h1 id="jumlah-antrian" style="font-size: 265%"></h1></td>
	</tr>
	<tr>
		<td colspan="3"  style="background-color: yellow;color: black">
            	<span id="date_time" style="font-size: 150%"></span>
	        <script>
	        function date_time(id){
		        date    = new Date;
		        tahun   = date.getFullYear();
		        bulan   = date.getMonth();
		        tanggal = date.getDate();
		        hari    = date.getDay();

		        namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		        namahari  = new Array('Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

		        h = date.getHours();
		        if(h<10) { h = "0"+h; }
		        m = date.getMinutes();
		        if(m<10) { m = "0"+m; }
		        s = date.getSeconds();
		        if(s<10) { s = "0"+s; }

		        //susun dengan format baru
		        result = namahari[hari]+', '+tanggal+' '+namabulan[bulan]+' '+tahun+' / '+h+':'+m+':'+s;
		        document.getElementById(id).innerHTML = result;
		        setTimeout('date_time("'+id+'");','1000' );
		        return true;
		}
	        </script>
	     	<script type="text/javascript" src="datetime.js"></script>
		<script type="text/javascript">window.onload = date_time('date_time');</script>
	    </td>
	</tr>

</table>
</div>


	
	<!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan informasi antrian
      $('#jumlah-antrian').load('../panggil_nomor/get_jumlah_antrian.php');
      $('#antrian-sekarang').load('../panggil_nomor/get_antrian_sekarang.php');
      $('#antrian-selanjutnya').load('../panggil_nomor/get_antrian_selanjutnya.php');
      $('#sisa-antrian').load('../panggil_nomor/get_sisa_antrian.php');

      // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
      setInterval(function() {
        $('#jumlah-antrian').load('../panggil_nomor/get_jumlah_antrian.php').fadeIn("slow");
        $('#antrian-sekarang').load('../panggil_nomor/get_antrian_sekarang.php').fadeIn("slow");
        $('#antrian-selanjutnya').load('../panggil_nomor/get_antrian_selanjutnya.php').fadeIn("slow");
        $('#sisa-antrian').load('../panggil_nomor/get_sisa_antrian.php').fadeIn("slow");
        table.ajax.reload(null, false);
      }, 1000);
    });
  </script>
</table>
</body>
</html>