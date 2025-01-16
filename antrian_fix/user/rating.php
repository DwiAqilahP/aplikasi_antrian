<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rating</title>
	<style type="text/css">
	<?php 
		include "../config/database.php";
		$id_pelayanan = $_SESSION['id_pelayanan'];
		$query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
		while ($tmpl = mysqli_fetch_array($query) ){
    ?>
		body{
            background-image: url('../admin/file/<?php echo $tmpl['bg']?>');
			font-family: arial;
			background-size: cover;
		}
	<?php } ?>

		div {
	  		display: inline-block;
	  		color: black;
	  		text-align: center;
	  		padding: 20px 30px;
	  		text-decoration: none;
		}
		.container{
			margin: 0;
			margin-top: 30px;
			padding: 0;
			width: 100%;
		}
		.wrap{
		    background-color: transparent;
			margin: 0px;
			width: 70%;
		}
		button{
			background-color: transparent;
			border: none;
			cursor: pointer;
		}
		
		.box{
			height: 160px;
			width: 250px;
			margin-left:90px;
		    
			margin-right: 50px;
			margin-bottom: 20px;
			margin-top: 10px;
			padding-bottom: 10px;
			background-color: white;
			float: left;
			font-size: 18px;
			border-radius: 60px;
		}
		.box:hover{
			background-color: red;
		}
		.box p{
			margin-top: 0;
			padding-top: 0;
		}
		.box h1{
			margin: 0;
			padding: 0;
			font-size: 230px;
		}

		.table tr{
			background-color: white
		}
		.tr_2 {
			font-size: 100px;
		}
		span{
			font-size: 40px;
		}
		a{
			color: black;
			text-decoration: none;
		}
	</style>
<!-- 	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script type="text/javascript">
        var bel = new Audio('../audio/efek.mp3');
        function bunyi() {
          responsiveVoice.speak(
            "",
            "Indonesian Female",
            {
             pitch: 1, 
             rate: 1, 
             volume: 1
            }
           );
        }
    </script> -->
</head>

<body>
	<br><br><br>
	  <?php 
          $id_profil = $_SESSION['id_profil'];
          $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
          while ($tampil = mysqli_fetch_array($data) ){
      ?>
  <table width="100%">
  <tr >
    <td width="20%" align="center" rowspan="2"><img src="../admin/file/<?php echo $tampil['logo1']?>" width="110px" height="123px"></td>
    <td width="60%" align="center" rowspan="2"><h1 style="font-size: 38px;color: white;">BERI RATING <br>BAGAIMANA PELAYANAN INI</h1></td>  
    <td width="20%" align="center" rowspan="2"><img src="../admin/file/<?php echo $tampil['logo2']?>" width="110px" height="123px"></td>
  </tr>
</table>
<?php } ?>
    <form method="POST" action="">
    <br><br>
	<div class="container">

			<div class="wrap"><center>
			<b>	

			<div class="box">
				<button type="submit" name="sp" value="SANGAT PUAS" onclick="bunyi()">
				<p>
					<span style='font-size:50px;'>&#128525;</span>
				</p>
				<h2> SANGAT PUAS</h2></button>
			</div>
			<?php
			    include "../config/database.php";
			    if (isset($_POST['sp'])) {
			    $sp = $_POST['sp'];
			    $tgl_rating = date("Y-m-d");
			    $id_pelayanan = $_SESSION['id_pelayanan'];
			    $insert = mysqli_query($conn, "insert into rating set id_pelayanan='$id_pelayanan', rating= '$sp', tgl_rating='$tgl_rating'");
			      if ($insert) { ?>
			            <script language="JavaScript">
                            document.location='sgtpuas.php';
                        </script>
			      <?php }else{ ?>
			            <script language="JavaScript">
                            document.location='sgtpuas.php';
                        </script>
			      <?php
			          }
			      }
			      ?>


			<div class="box">
				<button type="submit" name="puas" value="PUAS">
				<p>
					<span style='font-size:50px;'>&#128521;</span>
				</p>
				<h2>PUAS</h2></button>
			</div>
			<?php
			    include "../config/database.php";
			    if (isset($_POST['puas'])) {
			    $puas = $_POST['puas'];
			    $tgl_rating = date("Y-m-d");
			    $id_pelayanan = $_SESSION['id_pelayanan'];
			    $insert = mysqli_query($conn, "insert into rating set rating= '$puas', tgl_rating='$tgl_rating',id_pelayanan='$id_pelayanan' ");
			      if ($insert) { ?>
			            <script language="JavaScript">
                            document.location='puas.php';
                        </script>
			      <?php
			      }else{ ?>
			            <script language="JavaScript">
                            document.location='puas.php';
                        </script>
			      <?php
			          }
			      }
			      ?>

			<div class="box">
				<button type="submit" name="cp" value="CUKUP PUAS">
				<p>
					<span style='font-size:50px;'>&#128522;</span>
				</p>
				<h2>CUKUP PUAS</h2></button>
			</div>
			<?php
			    include "../config/database.php";
			    if (isset($_POST['cp'])) {
			    $cp = $_POST['cp'];
			    $tgl_rating = date("Y-m-d");
			    $id_pelayanan = $_SESSION['id_pelayanan'];
			    $insert = mysqli_query($conn, "insert into rating set rating= '$cp', tgl_rating='$tgl_rating',id_pelayanan='$id_pelayanan'  ");
			      if ($insert) { ?>
			            <script language="JavaScript">
                            document.location='ckppuas.php';
                        </script>
			      <?php
			      }else{ ?>
			            <script language="JavaScript">
                            document.location='ckppuas.php';
                        </script>
			      <?php
			          }
			      }
			      ?>

			<a href="menu_user.php" name="tp">
			<div class="box">
				<button type="submit" name="tp" value="TIDAK PUAS">
				<p>
					<span style='font-size:50px;'>&#128532;</span>
				</p>
				<h2>TIDAK PUAS</h2>	</button>
			</div></a>
			<?php
			    include "../config/database.php";
			    if (isset($_POST['tp'])) {
			    $tp = $_POST['tp'];
			    $tgl_rating = date("Y-m-d");
			    $id_pelayanan = $_SESSION['id_pelayanan'];
			    $insert = mysqli_query($conn, "insert into rating set rating= '$tp', tgl_rating='$tgl_rating',id_pelayanan='$id_pelayanan' ");
			      if ($insert) { ?>
			            <script language="JavaScript">
                            document.location='tdkpuas.php';
                        </script>
			      <?php
			      }else{ ?>
			            <script language="JavaScript">
                            document.location='tdkpuas.php';
                        </script>
			      <?php
			          }
			      }
			      ?>

		</b></center>
		</div>
	</div>
	</form>
</body>
</html>