<?php
include '../config/database.php';

$id_pelayanan= $_GET['id_pelayanan'];

$hapus= mysqli_query($conn, "DELETE FROM login WHERE id_pelayanan= '$id_pelayanan'");
$hapus2= mysqli_query($conn, "DELETE FROM pelayanan WHERE id_pelayanan= '$id_pelayanan'");

if ($hapus && $hapus2) {
	echo "<script> alert ('Data berhasil dihapus');
	document.location='kelola_petugas.php';
	</script>";
	
} else{
	echo "<script> alert ('Data Gagal dihapus') ;
	document.location='kelola_petugas.php';
	</script>";
	
}

?>