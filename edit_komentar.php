<h1 class="mt-4 text-secondary">Edit Komentar</h1>

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




if (isset($_GET['edit'])) {
        $komentarid = $_GET['edit'];
        $query_edit = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid = '$komentarid'");
        $komentar_data = mysqli_fetch_array($query_edit);
        if ($komentar_data) {
            ?>
            <form method="POST">
                <hr>
                <label class="text-secondary">Edit Komentar</label>
                <textarea name="isikomentar" rows="5" class="form-control"><?php echo $komentar_data['isikomentar']; ?></textarea>
                <button type="submit" name="update_komentar" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
            <?php
        }

        if (isset($_POST['update_komentar'])) {
            $updated_komentar = $_POST['isikomentar'];
            $query_update = mysqli_query($koneksi, "UPDATE komentarfoto SET isikomentar = '$updated_komentar' WHERE komentarid = '$komentarid'");
            if ($query_update) {
                echo '<script>alert("Komentar berhasil diupdate!"); window.location.href = "?page=galeri_komentar&id='.$id.'";</script>';
            } else {
                echo '<script>alert("Gagal mengupdate komentar!");</script>';
            }
        }
    }
    ?>