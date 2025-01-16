<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Data Diri</title>
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
    <h2>Formulir Edit Data Diri</h2>
    <?php
    include "../config/database.php";
    $id_user = $_GET['id_user'];

    // Mendapatkan data pengguna berdasarkan ID
    $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
    ?>

    <form method="POST" action="proses_edit.php">

        <input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'] ?>" required><br>

        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Lengkap:</label>
            <textarea class="form-control" name="alamat" required><?php echo $row['alamat'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="nik">No. NIK:</label>
            <input type="text" class="form-control" name="nik" value="<?php echo $row['nik'] ?>" required>
        </div>

        <div class="form-group">
            <label for="ttl">Tempat Lahir:</label>
            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir'] ?>" required>
        </div>
        <div class="form-group">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tanggal_lahir'] ?>" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected' ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected' ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="agama">Agama:</label>
            <input type="text" class="form-control" name="agama" value="<?php echo $row['agama'] ?>" required>
        </div>

        <div class="form-group">
            <label for="status_perkawinan">Status Perkawinan:</label>
            <input type="text" class="form-control" name="status_perkawinan" value="<?php echo $row['status_perkawinan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $row['pekerjaan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="kewarganegaraan">Kewarganegaraan:</label>
            <input type="text" class="form-control" name="kewarganegaraan" value="<?php echo $row['kewarganegaraan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="golongan_darah">Golongan Darah:</label>
            <input type="text" class="form-control" name="golongan_darah" value="<?php echo $row['golongan_darah'] ?>" required>
        </div>

        <div class="form-group">
            <label for="jenis_keperluan">Jenis Keperluan:</label>
            <input type="text" class="form-control" name="jenis_keperluan" value="<?php echo $row['jenis_keperluan'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
