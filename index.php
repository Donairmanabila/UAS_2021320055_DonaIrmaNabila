<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <br>
    <h4>Selamat Datang di Toko Jam Donah</h4>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_jam
    if (isset($_GET['id_jam'])) {
        $id_jam=htmlspecialchars($_GET["id_jam"]);

        $sql="delete from jam where id_jam='$id_jam' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Id Jam</th>
            <th>No Jam</th>
            <th>Merk Jam</th>
            <th>Warna Jam</th>
            <th>Harga Jam</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from jam order by id_jam desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["no"]; ?></td>
                <td><?php echo $data["merk"];   ?></td>
                <td><?php echo $data["warna"];   ?></td>
                <td><?php echo $data["harga"];   ?></td>
                <td>
                    <a href="update.php?id_jam=<?php echo htmlspecialchars($data['id_jam']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_jam=<?php echo $data['id_jam']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>