<?php

$host="localhost";
$user="root";
$password="";
$db="uas_donairmanabila_2021320055";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>