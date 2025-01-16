<?php
    include "../config/database.php";
    $id_rating = $_POST['id_rating'];
    $rating = $_POST['rating'];
    $tgl = $_POST['tgl_rating'];
    $ket = $_POST['ket'];


    $update = mysqli_query($conn, "UPDATE rating set rating= '$rating', tgl_rating= '$tgl', ket = '$ket' WHERE id_rating= '$id_rating'");

      if ($update) {
          echo "<script> alert ('Data berhasil diUpdate') 
          document.location='hasil_rating.php';
          </script>";
            
      }else{
          echo "<script> alert ('Data Tidak berhasil diUpdate') 
          document.location='edit_rat.php';
          </script>";
          }

      ?>