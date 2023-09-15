<!DOCTYPE html>
<html>
<head>
    <title>Form Toko Jam Donah </title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $no=input($_POST["no"]);
        $merk=input($_POST["merk"]);
        $warna=input($_POST["warna"]);
        $harga=input($_POST["harga"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into jam (no,merk,warna,harga) values
		('$no','$merk','$warna','$harga')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data Jam</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>No JAM:</label>
            <input type="text" name="no" class="form-control" placeholder="Masukan No" required />

        </div>
        <div class="form-group">
            <label>Merk Jam:</label>
            <input type="text" name="merk" class="form-control" placeholder="Masukan Merk" required/>

        </div>
        <div class="form-group">
            <label>Warna Jam:</label>
            <textarea name="warna" class="form-control" rows="5"placeholder="Masukan Warna" required></textarea>

        </div>
        <div class="form-group">
            <label>Harga Jam:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>