<?php 
include "koneksi.php";

if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$cek = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");

	if(mysqli_num_rows($cek) > 0 ) {
		$data = mysqli_fetch_array($cek);
		$_SESSION['user'] = $data;
		echo '<script>alert("Selamat Datang '.$data['namalengkap'].'"); location.href="index.php" </script>';
	} else {
		echo '<script>alert("Username/Password Salah")</script>';
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
							            <h3 class="mb-0" align="center"><span class="text-dark">Login</span></h3>
						            </div>
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" type="text" placeholder="Masukan Username" name="username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" placeholder="Masukan Password" name="password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <button class="btn btn-primary" type="submit">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Belum Punya Akun? Daftar Disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
		<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom">
			<p>&copy; UKK PPLG 2024 | Ridwan Nurohman</p>
		</footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
