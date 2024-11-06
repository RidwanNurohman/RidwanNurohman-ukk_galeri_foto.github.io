<?php 
$id = $_GET['id'];
$userid = $_SESSION['user']['userid'];
$tanggallike = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO likefoto(fotoid,userid,tanggallike) VALUES('$id','$userid','$tanggallike')");

if($query > 0 ) {
    echo '<script>alert("Like Foto Berhasil!"); location.href="?page=galeri"; </script>';
} else {
    echo '<script>alert("Like Foto Gagal!!")</script>';
  }
