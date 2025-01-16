<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="../css/style1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <style type="text/css">
    	.cari{
    		font-size: 20px;
    	}
		select {
		    padding:10px 20px;
		    background-color: white;
		    border:0px solid #dbdbdb;
		    border-radius: 3px;
		    margin-right: 30px;

		}
		button {
		    position:relative;
		    padding:6px 30px;
		    left:-8px;
		    border:2px solid #53bd84;
		    background-color:#53bd84;
		    color:#fafafa;
		}
		button:hover  {
		    background-color:#fafafa;
		    color:#207cca;
		}
    </style>
</head>
<body>
    <?php include "../config/database.php"; ?>
    <div class="main-content">     
        <main>
            <?php 
            $id_pelayanan = $_SESSION['id_pelayanan'];
            $query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
            while ($tmpl = mysqli_fetch_array($query) ){
            ?>
            <div class="page-header">
                <h1>Hasil Rating Pada Pelayanan <?php echo $tmpl['nama_pelayanan'] ?></h1>
            </div>
            <?php } ?>

             <div class="page-content">
            
                <div class="analytics">
					<div class="cari">
			            <form action="" method="get">
			                
			                <select name="tahun">
			                	<option value="">-Pilih tahun-</option>
							<?php
							$qry=mysqli_query($conn, "SELECT tgl_rating FROM rating where id_pelayanan= '$id_pelayanan' GROUP BY year(tgl_rating)");
							while($t=mysqli_Fetch_array($qry)){
							    $data = explode('-',$t['tgl_rating']);
							    $tahun = $data[0];
							    echo "<option value='$tahun'>$tahun</option>";
							}
							?>
							</select>
			                <button name="cari">Cari</button>
			            </form>

			        </div>
                </div>
             <button style="float: right;margin-bottom: 15px"><a href="cetak_rating.php">Cetak</button>
            <div>
                <table width="60%" border="1" id="tabel-antrian" style="text-align: center;float: left">
                  <thead>
                    <tr>
                      <th style="text-align: center; border: 1;">Rating</th>
                      <th style="text-align: center; border: 1;">Tanggal</th>
                      <th style="text-align: center; border: 1;">Keterangan</th>
                    </tr>
                  </thead>
                   <tbody style="background-color: black;color: white">
			        <?php   
	                if(isset($_GET['cari'])){
	                    $tahun = $_GET['tahun'];
	                    $data_rating = mysqli_query($conn, "select * from rating where tgl_rating like '%".$tahun."%' and id_pelayanan= '$id_pelayanan'");           
	                }else{
	                    $data_rating = mysqli_query($conn, "select * from rating where id_pelayanan= '$id_pelayanan'");       
	                }
	                while ($data = mysqli_fetch_assoc($data_rating)) {
	                    ?>
	                    <tr>
	                        <td><?php echo $data['rating']; ?></td>
	                        <td style="color: white"><?php echo $data['tgl_rating']; ?></td>
	                        <td style="color: white"><?php echo $data['ket']; ?></td>
	                    </tr>
	                  <?php } ?>
			        </tbody>
                </table>
                <canvas id="myChart" style="width:100%;max-width:450px; float: right;background-color: white"></canvas>
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

				new Chart("myChart", {
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
				      text: "Grafik Jumlah Rating Keseluruhan"
				    }
				  }
				});
				</script>
            </div>
            
        </main> 
    </div>
</body>
</html>