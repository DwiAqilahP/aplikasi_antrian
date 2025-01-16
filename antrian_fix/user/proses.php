<?php
// Menghubungkan ke database
 include "../config/database.php";


// Mengambil data dari formulir
$id_antrian = $_POST['id_antrian'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$golongan_darah = $_POST['golongan_darah'];
$jenis_keperluan = $_POST['jenis_keperluan'];

// Menyimpan data ke dalam database
$sql = "INSERT INTO user (id_antrian,nama, alamat, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, status_perkawinan, pekerjaan, kewarganegaraan, golongan_darah, jenis_keperluan) 
        VALUES ('$id_antrian','$nama', '$alamat', '$nik', '$tempat_lahir',$tgl_lahir, '$jenis_kelamin', '$agama', '$status_perkawinan', '$pekerjaan', '$kewarganegaraan', '$golongan_darah', '$jenis_keperluan')";

if (mysqli_query($conn, $sql)) { ?>
    <!-- echo "Data berhasil disimpan."; -->
    <script>
    	alert("Data berhasil disimpan.")
    </script>
<?php
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
