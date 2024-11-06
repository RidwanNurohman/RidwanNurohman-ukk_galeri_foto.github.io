<?php 
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit;
}

$userid = $_SESSION['user']['userid'];

$query_check_user = mysqli_query($koneksi, "SELECT * FROM user WHERE userid = '$userid'");
if (mysqli_num_rows($query_check_user) == 0) {
    echo '<script>alert("User tidak ditemukan!");</script>';
    exit; 
}

if(isset($_POST['namaalbum'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggalbuat = date('Y-m-d');
    $userid = $_SESSION['user']['userid'];


    $query = mysqli_query($koneksi, "INSERT INTO album(namaalbum,deskripsi,tanggalbuat,userid) VALUES('$namaalbum','$deskripsi','$tanggalbuat', '$userid')");

    if($query > 0 ) {
		echo '<script>alert("Tambah Data Berhasil!") </script>';
	} else {
		echo '<script>alert("Tambah Data Gagal!!")</script>';
	  }
	}


?>

<div class="container-fluid px-4">
                        <h1 class="mt-4 text-secondary">Tambah Album</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Album</li>
                        </ol>
                        <a href="?page=album" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                        <br><br>
                        <form method="POST">
                            <table class="table">
                                <tr class="table-dark">
                                    <td width="200">Nama Album</td>
                                    <td width="1">:</td>
                                    <td><input type="text" name="namaalbum" class="form-control"></td>
                                </tr>
                                </tr>
                                <tr class="table-dark">
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><input type="text" name="deskripsi" class="form-control"></td>
                                </tr>
                                <tr class="table-dark">
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-export"></i></button>
                                    <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-arrow-rotate-left"></i></button>
                                    </td>
                                </tr>
                            </table>

                        </form>
                         
                        
                    </div>