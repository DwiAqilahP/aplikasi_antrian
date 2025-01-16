<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_dsb.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
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
         input[type=date],textarea {
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

        select {
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
          width: 100%;
          font-family: "Inter", Arial;
        }
        .main-content{
          width: 100%;

        }
        .formbold-mb-5 {
          margin-bottom: 20px;
        }
        .formbold-pt-3 {
          padding-top: 12px;
        }
        .formbold-main-wrapper {
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
        }

        .formbold-form-wrapper {
          margin: 0 auto;
          max-width: 550px;
          width: 100%;
          background: white;
        }
        .formbold-form-label {
          display: block;
          font-weight: 500;
          font-size: 16px;
          color: white;
          margin-bottom: 12px;
        }
        .formbold-form-label-2 {
          font-weight: 600;
          font-size: 20px;
          margin-bottom: 20px;
          color: white;
        }

        .formbold-form-input {
          width: 100%;
          padding: 12px 24px;
          border-radius: 6px;
          border: 1px solid #e0e0e0;
          background: white;
          font-weight: 500;
          font-size: 16px;
          color: #6b7280;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-btn {
          text-align: center;
          font-size: 16px;
          border-radius: 6px;
          padding: 14px 32px;
          border: none;
          font-weight: 600;
          background-color: #6a64f1;
          color: white;
          cursor: pointer;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold--mx-3 {
          margin-left: -12px;
          margin-right: -12px;
        }
        .formbold-px-3 {
          padding-left: 12px;
          padding-right: 12px;
        }
        .flex {
          display: flex;
        }
        .flex-wrap {
          flex-wrap: wrap;
        }
        .w-full {
          width: 100%;
        }

        .formbold-file-input input {
          opacity: 0;
          position: absolute;
          width: 100%;
          height: 100%;
        }

        .formbold-file-input label {
          position: relative;
          border: 1px dashed #e0e0e0;
          border-radius: 6px;
          min-height: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
          text-align: center;
        }
        .formbold-drop-file {
          display: block;
          font-weight: 600;
          color: white;
          font-size: 20px;
          margin-bottom: 8px;
        }

        .formbold-or {
          font-weight: 500;
          font-size: 16px;
          color: white;
          display: block;
          margin-bottom: 8px;
        }
        .formbold-browse {
          font-weight: 500;
          font-size: 16px;
          color: white;
          display: inline-block;
          padding: 8px 28px;
          border: 1px solid #e0e0e0;
          border-radius: 4px;
        }

        .formbold-file-list {
          border-radius: 6px;
          background: #f5f7fb;
          padding: 16px 32px;
        }

        .formbold-file-item {
          display: flex;
          align-items: center;
          justify-content: space-between;
        }

        .formbold-file-item button {
          color: #07074d;
          border: none;
          background: transparent;
          cursor: pointer;
        }

        .formbold-file-name {
          font-weight: 500;
          font-size: 16px;
          color: #07074d;
          padding-right: 12px;
        }
        .formbold-progress-bar {
          margin-top: 20px;
          position: relative;
          width: 100%;
          height: 6px;
          border-radius: 8px;
          background: #e2e5ef;
        }

        .formbold-progress {
          position: absolute;
          width: 75%;
          height: 100%;
          left: 0;
          top: 0;
          background: #6a64f1;
          border-radius: 8px;
        }

        @media (min-width: 540px) {
          .sm\:w-half {
            width: 50%;
          }
        }

    </style>
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div >     
        <main>
            <div class="page-header">
                <h1>Edit Data Rating</h1>
                <small> Home/Rating </small>
            </div>
        </main>
        <div class="form1">
          <?php 
              include "../config/database.php";
              $id_rating =$_GET['id_rating'];
              $data = mysqli_query($conn, "SELECT * FROM rating WHERE id_rating = '$id_rating'");
              while ($tampil = mysqli_fetch_array($data) ){
          ?>
                <form action="update_rating.php" method="POST">
                   <label for="id_rating">Id Rating</label>
                    <input type="text" id="id_rating" name="id_rating"  value="<?php echo $tampil ['id_rating']; ?>" readonly>
                    <label for="tgl_rating">Tgl Rating</label>
                    <input type="date" id="tgl_rating" name="tgl_rating"  value="<?php echo $tampil ['tgl_rating']; ?>">

                    <label for="rating">Rating</label>
                    <select name="rating">
                        <option value="<?php echo $tampil['rating']; ?>"><?php echo $tampil['rating']; ?></option>
                        <option value="SANGAT PUAS">SANGAT PUAS</option>
                        <option value="PUAS">PUAS</option>
                        <option value="CUKUP PUAS">CUKUP PUAS</option>
                        <option value="TIDAK PUAS">TIDAK PUAS</option>
                    </select>
                    <label for="ket">Keterangan</label>
                    <textarea class="ket" id="ket" name="ket"><?php echo $tampil['ket']?></textarea>

                    <input type="submit" value="submit">
                  </form>
                  <?php  }?>

            </div>
    </div>
</body>
</html>