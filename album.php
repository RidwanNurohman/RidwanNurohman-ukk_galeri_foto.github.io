<div class="container-fluid px-4">
                        <h1 class="mt-4 text-secondary">Data Album</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Album</li>
                        </ol>
                        <a href="?page=album_tambah" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                        <br><br>
                         <table class="table table-bordered"> 
                            <tr class="table-dark">
                                <th>Nama Album</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                            <?php 
                            
                             $query = mysqli_query($koneksi, "SELECT*FROM album ");
                             while($data = mysqli_fetch_array($query)) {
                                ?>
                             <tr class="table-dark">
                              <td><?php echo $data['namaalbum']; ?></td>
                              <td><?php echo $data['deskripsi']; ?></td>
                              <td><?php echo $data['tanggalbuat']; ?></td>
                              <td>
                                <a href="?page=album_ubah&&id=<?php echo $data['albumid']; ?> " class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?page=album_hapus&&id=<?php echo $data['albumid']; ?> " class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                              </td>
                             </tr>
                                <?php
                             }
                            ?>
                         </table>
               
                        
                    </div>