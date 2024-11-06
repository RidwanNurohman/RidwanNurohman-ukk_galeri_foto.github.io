<?php 
$id = $_GET['id'];

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

$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid=$id");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4 text-secondary">Galeri Foto</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri Foto</li>
    </ol>
    <a href="?page=galeri" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
    <br><br>
    <form method="POST" enctype="multipart/form-data">
        <table class="table">
            <tr class="table-dark">
                <td width="200">Judul</td>
                <td width="1">:</td>
                <td><?php echo $data['judulfoto']; ?></td>
            </tr>
            <tr class="table-dark">
                <td>Album</td>
                <td>:</td>
                <td>
                    <select name="albumid" disabled class="form-select form-control">
                        <?php
                          $al = mysqli_query($koneksi, "SELECT * FROM album");
                          while ($album = mysqli_fetch_array($al)) {
                        ?>
                            <option <?php if ($data['albumid'] == $album['albumid']) echo 'selected'; ?> value="<?php echo $album['albumid']; ?>"><?php echo $album['namaalbum']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class="table-dark">
                <td>Deskripsi</td>
                <td>:</td>
                <td><?php echo $data['deskripsifoto']; ?></td>
            </tr>
            <tr class="table-dark">
                <td>Foto</td>
                <td>:</td>
                <td>
                    <a href="foto/<?php echo $data['lokasifile']; ?>" target="_blank">
                        <img src="foto/<?php echo $data['lokasifile']; ?>" width="200" alt="lokasifile">
                    </a>
                </td>
            </tr>
        </table>
    </form>

    <h1 class="mt-4 text-secondary">Komentar Foto</h1>
    <?php 
    $query_komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto LEFT JOIN user ON user.userid = komentarfoto.userid WHERE komentarfoto.fotoid=$id ORDER BY tanggalkomentar DESC");
    while ($komentar = mysqli_fetch_array($query_komentar)) {
        ?>
        <div class="card mb-2 ">
            <div class="card-header bg-dark text-light">
                <?php echo $komentar['namalengkap'] . ' (' . $komentar['tanggalkomentar'] . ')'; ?>
                <?php if ($_SESSION['user']['userid'] == $komentar['userid']) { ?>
                    <a href="?page=edit_komentar&id=<?php echo $id; ?>&edit=<?php echo $komentar['komentarid']; ?>" class="btn btn-warning btn-sm float-end ms-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="?page=galeri_komentar&id=<?php echo $id; ?>&delete=<?php echo $komentar['komentarid']; ?>" class="btn btn-danger btn-sm float-end"><i class="fa-solid fa-trash-can"></i></a>
                <?php } ?>
            </div>
            <div class="card-body"><?php echo $komentar['isikomentar']; ?></div>
        </div>
    <?php } ?>

    <?php
    if (isset($_POST['isikomentar'])) {
        $isikomentar = $_POST['isikomentar'];
        $tanggalkomentar = date('Y-m-d');
        $userid = $_SESSION['user']['userid'];

        $query_insert_komentar = mysqli_query($koneksi, "INSERT INTO komentarfoto(fotoid, userid, isikomentar, tanggalkomentar) VALUES ('$id', '$userid', '$isikomentar', '$tanggalkomentar')");

        if ($query_insert_komentar) {
            echo '<script>alert("Tambah Komentar Berhasil!"); window.location.href = ""; </script>';
        } else {
            echo '<script>alert("Tambah Komentar Gagal!");</script>';
        }
    }

    if (isset($_GET['delete'])) {
        $komentarid = $_GET['delete'];
        $query_hapus = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid = '$komentarid'");

        if ($query_hapus) {
            echo '<script>alert("Komentar Berhasil Dihapus!"); window.location.href = "?page=galeri_komentar&id='.$id.'";</script>';
        } else {
            echo '<script>alert("Gagal menghapus komentar!");</script>';
        }
    }

    
    ?>

    <form method="POST">
        <hr>
        <label>Masukkan Komentar Baru</label>
        <textarea name="isikomentar" rows="5" class="form-control"></textarea>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-export"></i></button>
        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-arrow-rotate-left"></i></button>
    </form>
</div>
