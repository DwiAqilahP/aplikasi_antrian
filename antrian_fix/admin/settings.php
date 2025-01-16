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
    <link rel="stylesheet" href="../css/style_dsb.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title> Home/Settings </title>
    <style type="text/css">
        input[type=text] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          background-color: white;
          color: black;
        }

        input[type=submit] {
          width: 100%;
          background-color: deepskyblue;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: deepskyblue;
        }

        .form1 {
          border-radius: 5px;
          background-color: transparent;
          padding: 20px;
          color: white;
        }
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          body {
            font-family: "Inter", Arial;
          }
          .drop-container {
          position: relative;
          display: flex;
          gap: 10px;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          height: 200px;
          padding: 20px;
          border-radius: 10px;
          border: 2px dashed #555;
          color: #444;
          cursor: pointer;
          transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
          background: #eee;
          border-color: #111;
        }

        .drop-container:hover .drop-title {
          color: #222;
        }

        .drop-title {
          color: #444;
          font-size: 20px;
          font-weight: bold;
          text-align: center;
          transition: color .2s ease-in-out;
        }

          @media (min-width: 540px) {
            .sm\:w-half {
              width: 50%;
            }
          }
        .pil ul {
    list-style-type: none;
  }

    .pil li {
      display: inline-block;
    }

    .pil input[type="radio"][id^="myCheckbox"] {
      display: none;
    }

    .label {
      border: 1px solid #fff;
      padding: 10px;
      display: block;
      position: relative;
      margin: 10px;
      cursor: pointer;
    }

    .label:before {
      background-color: white;
      color: white;
      content: " ";
      display: block;
      border-radius: 50%;
      border: 1px solid grey;
      position: absolute;
      top: -5px;
      left: -5px;
      width: 25px;
      height: 25px;
      text-align: center;
      line-height: 28px;
      transition-duration: 0.4s;
      transform: scale(0);
    }

    .label img {
      height: 100px;
      width: 100px;
      transition-duration: 0.2s;
      transform-origin: 50% 50%;
    }

    :checked + .label {
      border-color: #ddd;
    }

    :checked + .label:before {
      content: "✓";
      background-color: grey;
      transform: scale(1);
    }

    :checked + .label img {
      transform: scale(0.9);
      /* box-shadow: 0 0 5px #333; */
      z-index: -1;
    }

    </style>
</head>
<body>
  <?php include "../config/database.php"; ?>
   <input type="checkbox" id="menu-toggle">
   <input type="checkbox" id="menu-toggle">
      <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>A<span>dmin</span></h3>
        </div>
        
       <div class="side-content">
            <div class="profile">
                <?php
                $id_profil = $_SESSION['id_profil'];
                $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
                while ($tampil = mysqli_fetch_array($data) ){ ?>
                <div class="profile-img bg-img" style="background-image: url('../admin/file/profil.jpg'); "> </div>
                <h4>Admin <?php echo $tampil['nama_instansi'];?></h4>
            </div>
            <?php } ?>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="dashboard.php">
                            <span> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA+0lEQVR4nO3TIUsEYRSF4QfDslgWcQ2CBptRBIObbCZ/gMWm2WQx+wM2brBYjeatCoJgMRkMsmFxi10dGbgjyzguM462OfDCcL97z/m4M0OjP9Zc8C/awE2QPueVBJXVQR9jHAbjqHXqBuxjhHN0sRV0ozaKnsoB6xjiHj0sYoD3YBC1XvQMywbM4wwvOEYLR5hMGWRM4qwVva9RTz0KtYcnXGEVm7guMM5zh20s4wLPOJg2XsElHrGLhXiBbyXMMz7CfAk7eIiLrqUBJzhFe8Y6kpJka2uHZ+r9pdsaxkmO1OubZg38pEozTUDSrKhIzVekzt9caZ+/DvgEd/8Ok+Fl/gAAAAAASUVORK5CYII="></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="kelola_petugas.php">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAmUlEQVR4nN3VsQ2DMBSE4b+iTU0GYAeUFcIcYQ+KmHnoM0HYAkidkupFkVxQWBTJ2Ypz0hV+zSf5STYkiO20iw2sQBUTMGCIDdiXTQeoYz8FFEAPLMAMOD+TAS5wt04JLAHgoQTmADApAQdcNucWuCqBwiM3X/mSj8AZOPg2QKkCTsAzsIP3rFYA484zcFcAn+YPAcv2P8g7L3oF1m/BIptYAAAAAElFTkSuQmCC"></span>
                            <small>Kelola Petugas</small>
                        </a>
                    </li>
                    <li>
                       <a href="hasil_rating.php">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAApklEQVR4nM3VMQrCMBjF8f8VOrTUuzh4GsFewNXZzaGncfAKYgeP8xUhYAmpTfmemgdZUvL9yOsQeMecazE/A9bGigcqYAvsgQtwBe4fzs2Ccx+Oib5vSuCVcwT0CIEaeERApwIaYAj7w+QmOwUQD2/C/incyg1Mq3kCm9Qhb0V1BiIFWiWQM9wFdIkfjLqiw8JwN5CT8gBzPjj2N0AVKwYwUWXfBUbf9+m5b/IQlwAAAABJRU5ErkJggg=="></span>
                            <small>Hasil Rating</small>
                        </a>
                    </li>
                    <li>
                       <a href="settings.php" class="active">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACAElEQVR4nK2WzU5UQRCFP8MOuAPKBl5BfAUSf9A1YcRo2BvNEInOaiIsEDcsCC/AEyCJbnkDMI6aAZPZKAnsjOKMkPizGEmT06ZSNJeJ3koquemqPqfvqeq6F7qzMeAz8AP4BXwB7lKgLQF/nK8VSfAuQXAA9Pwv8BSwlQCPvgmUuwW7Lm3XgfvAK4E0gFlgFOiTj2ptWzkh9ypQAzaAmx48bPrkTvcTeAiMAM8l05H8LbAIDAMVFd7u3RXmX5tPgF+TRN9zJAqx23p7TzJnT99ywQcC7+SAR++IZCbRBKVIsmICDcliT76nYmbyCaBp4m3JtWPWXiv3xC4AqwrMSnMLfinRFBcVi3nPgMd6fgMM+g1lBS8D783G8jltHPNC4a/oeTqVHNkzJ0+WQ1ByBc/0XE0lV/+BYMDVIRKEw56yaSORHQ0TOQR3zpDolKyDKkws8qLZ2FRBvQ0B+yZvwci8qsY5sUwtFRO31XK+TaekeUknt+At7flg1lZsoQ7cJano8nS6vGiTwCO3/g3ojSRzLhiu/Q2RtHPAWwIfB3672FOrZ58GlCeZ0auHS1QHDuV1aT6sk3vwj37YBbulUVvT6I3jekfFCx3SLw/PT4zmLzXi1zXyw/6urKyPSiEfnLOsB/iaAA/jpDB7kSBYLpLgnrQNhQ+/LuEXJnxkzrVjxqAG8qJ7duAAAAAASUVORK5CYII="></span>
                            <small>Settings</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu"> 
                 <?php 
                  include "../config/database.php";
                  $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
                  while ($tampil = mysqli_fetch_array($data) ){
                  ?> 
                    <div class="user">
                        <div class="bg-img" style="background-image: url(../admin/file/<?php echo $tampil['logo2']?>)"></div>
                    
                        <a href="../logout.php">
                        <span class="las la-power-off"></span>
                        <span>Logout</span></a>

                  <?php } ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="main-content">     
        <main>
            <div class="page-header">
                <h1>SETTING</h1>
                <small> Home/Settings </small>
            </div>
        </main>
        <?php
           if (isset($_POST['Submit'])) {
              // $id_profil =  $_POST['id_profil'];
                $nama_instansi = $_POST['nama_instansi'];
                $alamat = $_POST['alamat'];
                $namafoto1 = $_FILES['foto1']['name'];
                $namafoto2 = $_FILES['foto2']['name'];
                $bg = $_POST['bg'];

              //Cek Photo
              if (strlen($namafoto1)>0 ) {
                  //upload Photo
                  if (is_uploaded_file($_FILES['foto1']['tmp_name'])){
                      move_uploaded_file ($_FILES['foto1']['tmp_name'], "file/".$namafoto1);
                      mysqli_query ($conn,"UPDATE profil SET logo1='$namafoto1' WHERE id_profil='$id_profil'");
                  }
              }
              if (strlen($namafoto2)>0 ) {
                  //upload Photo
                  if (is_uploaded_file($_FILES['foto2']['tmp_name']) ){
                      move_uploaded_file ($_FILES['foto2']['tmp_name'], "file/".$namafoto2);
                      mysqli_query ($conn,"UPDATE profil SET logo2='$namafoto2' WHERE id_profil='$id_profil'");
                  }
              }
              //update
             $query = "UPDATE profil SET nama_instansi='$nama_instansi', alamat = '$alamat' WHERE id_profil='$id_profil'";
              $sql = mysqli_query ($conn,$query);
              $sq1 = mysqli_query ($conn,"UPDATE pelayanan SET bg ='$bg' WHERE id_profil='$id_profil'");

              //setelah berhasil update
              if ($sql or $sq1) {
                  echo "<script>alert('Data Berhasil diedit')</script>";   
              } else {
                  echo "<script>alert('Data Tidak Berhasil diedit')</script>"; 
              }
          }
          ?>
        <div class="form1">
            <?php 
              $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil = '1'");
              while ($tampil = mysqli_fetch_array($data) ){
            ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="fname">Nama Instansi</label>
                    <input type="text" id="fname" name="nama_instansi" value="<?php echo $tampil ['nama_instansi']; ?>">

                    <label for="lname">Alamat</label>
                    <input type="text" id="lname" name="alamat" value="<?php echo $tampil ['alamat']; ?>">

                    <label>Update Gambar Logo 1 (*kiri) </label>
                    <label class="drop-container">
                    <input type="file" name="foto1"/><br>
                    </label>
                    <label>Update gambar Logo 2 (*kanan)</label>
                    <label class="drop-container">
                    <input type="file" name="foto2"/><br>
                    </label>
                    
                    <label>Update Background</label>
                    <label class="drop-container">
                    <div class="pil">
                    <ul>
                      <li>
                        <input type="radio" id="myCheckbox1" name="bg" value="bg.png" />
                        <label for="myCheckbox1" class="label"><img src="file/bg.png" /></label>
                      </li>
                      <li>
                        <input type="radio" id="myCheckbox2" name="bg" value="putih.jpg" />
                        <label for="myCheckbox2" class="label"><img src="file/merah.jpg" /></label>
                      </li>
                      <li>

                        <input type="radio" id="myCheckbox3"  name="bg" value="biru.jpg" />
                        <label for="myCheckbox3" class="label"><img src="file/biru.jpg" /></label>
                      </li>
                      <li>

                        <input type="radio" id="myCheckbox4"  name="bg" value="kuning.jpg" />
                        <label for="myCheckbox4" class="label"><img src="file/hijau.jpg" /></label>
                      </li>
                    </ul>
                  </div>
                    <br>
                    </label>
                  
                    <input type="submit" name="Submit" value="Submit">
                  </form>
            </div>
            <?php  } ?>
    </div>
</body>
</html>