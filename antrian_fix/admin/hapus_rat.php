<?php
include '../config/database.php';

$id_rating= $_GET['id_rating'];

$hapus= mysqli_query($conn, "DELETE FROM rating WHERE id_rating= '$id_rating'");

if ($hapus) {
	echo "<script> alert ('Data berhasil dihapus');
	document.location='hasil_rating.php';
	</script>";
	
} else{
	echo "<script> alert ('Data Gagal dihapus') ;
	document.location='hasil_rating.php';
	</script>";
	
}

?>