<div class="container-fluid px-4">
                        <h1 class="mt-4 text-secondary">Galeri Foto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Galeri Foto</li>
                        </ol>
                        <a href="?page=galeri_tambah" class="btn btn-primary" ><i class="fa-solid fa-plus"></i></a>
                        <br><br>
                         <table class="table table-bordered"> 
                            <tr class="table-dark">
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Album</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Total Like</th>
                                <th>Aksi</th>
                            </tr>
                            <?php 
                            
                             $query = mysqli_query($koneksi, "SELECT foto.*, album.namaalbum FROM foto left join album on album.albumid = foto.albumid");
                             while($data = mysqli_fetch_array($query)) {
                                ?>
                             <tr class="table-dark">
                              <td>
                                 <a href="foto/<?php echo $data['lokasifile']; ?> " target="_blank">
                                 <img src="foto/<?php echo $data['lokasifile']; ?>" width="200" alt="lokasifile">
                                 </a>
                              </td>
                              <td><?php echo $data['judulfoto']; ?></td>
                              <td><?php echo $data['namaalbum']; ?></td>
                              <td><?php echo $data['deskripsifoto']; ?></td>
                              <td><?php echo $data['tanggalunggah']; ?></td>
                              <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM likefoto WHERE fotoid=" . $data['fotoid'])) ?></td>
                              <td>
                                 <?php 
                                 if(mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM likefoto WHERE fotoid=" . $data['fotoid'] . " AND userid=" . $_SESSION['user']['userid'])) < 1){
                                 ?>
                                <a href="?page=galeri_like&&id=<?php echo $data['fotoid']; ?> " class="btn btn-warning"><i class="fa-solid fa-heart"></i></a>
                                <?php
                                 }
                                 ?>
                                <a href="?page=galeri_komentar&&id=<?php echo $data['fotoid']; ?> " class="btn btn-secondary"><i class="fa-solid fa-comment"></i></a>
                                <a href="?page=galeri_ubah&&id=<?php echo $data['fotoid']; ?> " class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?page=galeri_hapus&&id=<?php echo $data['fotoid']; ?> " class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                              </td>
                             </tr>
                                <?php
                             }
                            ?>
                         </table>
               
                        
                    </div>