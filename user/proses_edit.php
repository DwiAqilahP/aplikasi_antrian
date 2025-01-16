<?php
include "../config/database.php";

// Menerima data dari form
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$golongan_darah = $_POST['golongan_darah'];
$jenis_keperluan = $_POST['jenis_keperluan'];

// Update data pengguna dalam database
$sql = "UPDATE user SET
            nama = '$nama',
            alamat = '$alamat',
            nik = '$nik',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            jenis_kelamin = '$jenis_kelamin',
            agama = '$agama',
            status_perkawinan = '$status_perkawinan',
            pekerjaan = '$pekerjaan',
            kewarganegaraan = '$kewarganegaraan',
            golongan_darah = '$golongan_darah',
            jenis_keperluan = '$jenis_keperluan'
        WHERE id_user = '$id_user'";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert ('Data berhasil diedit');
    document.location='data_user.php';
    </script>";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>
