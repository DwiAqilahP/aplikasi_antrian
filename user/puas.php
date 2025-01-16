<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>my profile</title>
	<style type="text/css">
		body{
    		background-color: lightgrey;
		}
		.profile{
		    background-color: white;
		    margin-top: 10%;
		    padding: 10px;
		    border: 5px solid grey; 
		    width: 50%;
		    font-family: sans-serif;
		    margin-right: 23%;
		    float: right;
		    border-radius: 20px;
		    padding-bottom: 30px;

		}
		.profile input{
		    /*margin-left: 6.5%;*/
		    margin-top: 5%;
		    background-color: grey;
		    border: none;
		    color: white;
		    padding: 16px 32px;
		    cursor: pointer;
		    border-radius: 15px;
		    width: 100%;
		}
		.profile a {
			text-decoration: none;
		}
		.profile input:hover{
		    background-color: lightgrey;
		    color: black;
		}
	</style>
</head>
<body>
	<form method="POST" action="">
	<div class="profile">
		<input type="submit" name="submit1" value="puas karena pelayanannya ramah/berperilaku sopan"><br>
		<input type="submit" name="submit2" value="puas karena pelayanannya cepat "><br>
		<input type="submit" name="submit3" value="puas karena pelayanannya profesional"><br>
		<input type="submit" name="submit4" value="puas karena karyawannya memiliki penampilan yang menyenangkan dan rapi">
	</div>
	</form>
	<?php
		include "../config/database.php";
		if (isset($_POST['submit1'])) {
		    $cp = "puas karena pelayanannya  ramah/berperilaku sopan";
		    $insert = mysqli_query($conn, "UPDATE rating SET ket='$cp' ORDER BY id_rating DESC LIMIT 1");
			if ($insert) { ?>
		            <script language="JavaScript">
                        document.location='menu_user.php';
                    </script>
		    <?php
		    }
	    }
	    if (isset($_POST['submit2'])) {
		    $cp1 = "puas karena pelayanannya cepat";
		    $insert = mysqli_query($conn, "UPDATE rating SET ket='$cp1' ORDER BY id_rating DESC LIMIT 1");
			if ($insert) { ?>
		            <script language="JavaScript">
                        document.location='menu_user.php';
                    </script>
		    <?php
		    }
	    }
	    if (isset($_POST['submit3'])) {
		    $cp3 = "puas karena pelayanannya profesional";
		    $insert = mysqli_query($conn, "UPDATE rating SET ket='$cp3' ORDER BY id_rating DESC LIMIT 1");
			if ($insert) { ?>
		            <script language="JavaScript">
                        document.location='menu_user.php';
                    </script>
		    <?php
		    }
	    }
	    if (isset($_POST['submit4'])) {
		    $cp3 = "puas karena karyawannya memiliki penampilan yang menyenangkan dan rapi";
		    $insert = mysqli_query($conn, "UPDATE rating SET ket='$cp3' ORDER BY id_rating DESC LIMIT 1");
			if ($insert) { ?>
		            <script language="JavaScript">
                        document.location='menu_user.php';
                    </script>
		    <?php
		    }
	    }
		?>

</body>
</html>