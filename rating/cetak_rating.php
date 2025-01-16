<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

</head>
<body>
<?php 
include "../config/database.php";
$id_pelayanan = $_SESSION['id_pelayanan'];
$id_profil = $_SESSION['id_profil'];
      $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
      while ($tampil = mysqli_fetch_array($data) ){
        $data1 = mysqli_query($conn,"SELECT * FROM Pelayanan WHERE id_pelayanan='$id_pelayanan'");
        while ($tampil1 = mysqli_fetch_array($data1)){
  ?>
<table width="100%">
	<tr >
		<td width="20%" align="center"><img src="../admin/file/<?php echo $tampil['logo1']?>" width="110px" height="123px"></td>
		<td width="60%" align="center"><h1 style="font-size: 30px;">GRAFIK KEPUASAN MASYARAKAT <br> TERHADAP PELAYANAN <?php echo $tampil1['nama_pelayanan'],'&nbsp', $tampil['nama_instansi']?></h1></td>
    <td width="20%" align="center"><img src="../admin/file/<?php echo $tampil['logo2']?>" width="110px" height="123px"></td>	
	</tr>
</table>
<center>
<?php
    }
	}
	?>
	<br><br>
      <canvas id="myChart1" style="width:50%;max-width:450px;background-color: white;"></canvas>
                <?php
              $result = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from rating where rating='sangat puas' and id_pelayanan= '$id_pelayanan'"));
              $sp = $result['jumlah'];
              $result1 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from rating where rating='puas' and id_pelayanan= '$id_pelayanan'"));
              $p = $result1['jumlah'];
              $result2 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from rating where rating='cukup puas' and id_pelayanan= '$id_pelayanan'"));
              $cp = $result2['jumlah'];
              $result3 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from rating where rating='tidak puas' and id_pelayanan= '$id_pelayanan'"));
              $tp = $result3['jumlah'];
          ?>
        <script>
        var xValues = ["Sangat Puas", "Puas", "Cukup Puas", "Tidak Puas"];
        var yValues = [<?php 
                            echo $sp;
                            ?>, 
                            <?php 
                            echo $p;
                            ?>, 
                            <?php 
                            echo $cp;
                            ?>, 
                            <?php 
                            echo $tp;
                        ?>];
        var barColors = ["red", "green","blue","orange","brown"];

        new Chart("myChart1", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              
            }
          }
        });
        </script>
      <br><br><br>
      <hr>
 
      <h3>Terima Kasih Atas Penilaian Yang Telah Anda Berikan <br> Masukan Anda Sangat Bermanfaat Untuk Kemajuan Unit Kami Agar Terus Memperbaiki <br> Dan Meningkatkan Kualitas Pelayanan Bagi Masyarakat</h3>

</center>
</body>
</html>
