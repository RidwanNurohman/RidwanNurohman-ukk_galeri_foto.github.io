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

if(isset($_POST['judulfoto'])) {
    $judulfoto = $_POST['judulfoto'];
    $albumid = $_POST['albumid'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $userid = $_SESSION['user']['userid'];

    $lokasifile = $_FILES['lokasifile'];
    $namafoto = $lokasifile['name'];

    move_uploaded_file($lokasifile['tmp_name'], 'foto/'.$lokasifile['name']);
    $query = mysqli_query($koneksi, "INSERT INTO foto(judulfoto,albumid,deskripsifoto,tanggalunggah,lokasifile,userid) VALUES('$judulfoto','$albumid','$deskripsifoto','$tanggalunggah','$namafoto', '$userid')");

    if($query > 0 ) {
		echo '<script>alert("Tambah Data Berhasil!") </script>';
	} else {
		echo '<script>alert("Tambah Data Gagal!!")</script>';
	  }
	}


?>

<div class="container-fluid px-4">
                        <h1 class="mt-4 text-secondary">Tambah Galeri Foto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Galeri Foto</li>
                        </ol>
                        <a href="?page=galeri" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                        <br><br>
                        <form method="POST" enctype="multipart/form-data">
                            <table class="table">
                                <tr class="table-dark">
                                    <td width="200">Judul</td>
                                    <td width="1">:</td>
                                    <td><input type="text" name="judulfoto" class="form-control"></td>
                                </tr>
                                <tr class="table-dark">
                                    <td>Album</td>
                                    <td>:</td>
                                    <td>
                                        <select name="albumid" class="form-select form-control">
                                            <?php
                                              $al = mysqli_query($koneksi, "SELECT*FROM album");
                                              while($album = mysqli_fetch_array($al)) {
                                                ?>
                                                 <option value="<?php echo $album['albumid']; ?>"><?php echo $album['namaalbum']; ?></option>
                                                <?php
                                              }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="table-dark">
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><input type="text" name="deskripsifoto" class="form-control"></td>
                                </tr>
                                <tr class="table-dark">
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><input type="file" name="lokasifile" class="form-control"></td>
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