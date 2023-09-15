<!DOCTYPE html>
<html>
<head>
    <title>Form Update Jam</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_jam'])) {
        $id_jam=input($_GET["id_jam"]);

        $sql="select * from jam where id_jam=$id_jam";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_jam=htmlspecialchars($_POST["id_jam"]);
        $no=input($_POST["no"]);
        $merk=input($_POST["merk"]);
        $warna=input($_POST["warna"]);
        $harga=input($_POST["harga"]);
       

        //Query update data pada tabel anggota
        $sql="update jam set
            no='$no',
            merk='$merk',
            warna='$warna',
            harga='$harga',
			where id_jam=$id_jam";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data Jam </h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>No Jam:</label>
            <input type="text" name="no" class="form-control" value="<?php echo $data['no']; ?>" placeholder="Masukan No" required />

        </div>
        <div class="form-group">
            <label>Merk Jam:</label>
            <input type="text" name="merk" class="form-control" value="<?php echo $data['merk']; ?>" placeholder="Masukan Merk" required/>

        </div>
        <div class="form-group">
            <label>Warna Jam:</label>
            <textarea name="warna" class="form-control" rows="5" placeholder="Masukkan Warna" required><?php echo $data['warna']; ?></textarea>

        </div>
        <div class="form-group">
            <label>Harga Jam:</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Masukan Harga" required/>
        </div>

        <input type="hidden" name="id_jam" value="<?php echo $data['id_jam']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>