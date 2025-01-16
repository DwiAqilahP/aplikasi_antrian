<!DOCTYPE html>
<html>
<head>
    <title>Formulir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: lightgrey;
        }
    </style>
</head>
<body>
    <h2>Formulir Data Diri</h2>
    <h5>Lengkapi formulir ini sesuai dengan KTP anda!</h5>
    <?php
    include "../config/database.php";
    $id_antrian = $_GET['id_antrian'];
    ?>
    <form method="POST" action="proses.php">

        <input type="hidden" class="form-control" name="id_antrian" id="id_antrian" value="<?php echo $id_antrian ?>" required><br>
        <?php 
          $data = mysqli_query($conn, "SELECT no_antrian FROM antrian WHERE id_antrian = '$id_antrian'");
          while ($tampil = mysqli_fetch_array($data) ){
         ?>

        <div class="form-group">
            <label for="nama">No Antrian: </label>
            <input type="text" class="form-control" name="no_antri" value="<?php echo $tampil['no_antrian'] ?>" required readonly>
        </div>
        <?php } ?>
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Lengkap:</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>

        <div class="form-group">
            <label for="nik">No. NIK:</label>
            <input type="text" class="form-control" name="nik" required>
        </div>

        <div class="form-group">
            <label for="ttl">Tempat Lahir:</label>
            <input type="text" class="form-control" name="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="agama">Agama:</label>
            <input type="text" class="form-control" name="agama" required>
        </div>

        <div class="form-group">
            <label for="status_perkawinan">Status Perkawinan:</label>
            <input type="text" class="form-control" name="status_perkawinan" required>
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" class="form-control" name="pekerjaan" required>
        </div>

        <div class="form-group">
            <label for="kewarganegaraan">Kewarganegaraan:</label>
            <input type="text" class="form-control" name="kewarganegaraan" required>
        </div>

        <div class="form-group">
            <label for="golongan_darah">Golongan Darah:</label>
            <input type="text" class="form-control" name="golongan_darah" required>
        </div>
        <div class="form-group">
            <label for="golongan_darah">Jenis Keperluan:</label>
            <input type="text" class="form-control" name="jenis_keperluan" required>
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
