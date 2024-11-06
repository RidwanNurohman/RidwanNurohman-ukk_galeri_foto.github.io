<?php 
include "koneksi.php";

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO user(username,password,email,namalengkap,alamat) value('$username','$password','$email','$namalengkap','$alamat')");

	if($query > 0 ) {
		echo '<script>alert("Pendaftaran Berhasil, Silahkan Login!") </script>';
	} else {
		echo '<script>alert("Pendaftaran Gagal")</script>';
	  }
	}
	?>
	


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Galeri Foto</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
		<style>
		body {
			background-image: url('sekolahbn2.jpg');
			background-size: cover;
			background-position: center;
			color: black;
		}
		.navbar, footer {
			background-color: rgba(255, 255, 255, 0.8);
		}
	</style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-body">
									<div class="text-center">
							           <img src="logobn.png" width="150" alt="...">
							            <h3 class="mb-0" align="center"><span class="text-dark">Daftar Akun Baru</span></h3>
						            </div>
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" id="username" type="text" placeholder="Masukan Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" id="password" type="password" placeholder="Masukan Password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" id="email" type="email" placeholder="Masukan Email" name="email" />
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1" for="namalengkap">Nama Lengkap</label>
                                                <input class="form-control py-4" id="namalengkap" type="text" placeholder="Masukan Nama Lengkap" name="namalengkap" />
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1" for="alamat">Alamat</label>
                                                <textarea class="form-control py-4" id="alamat" type="text" placeholder="Masukan Alamat" name="alamat" rows="5"></textarea> 
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Daftar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Sudah Punya Akun? Login Disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>>
            <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom">
			<p>&copy; UKK PPLG 2024 | Ridwan Nurohman</p>
		</footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
