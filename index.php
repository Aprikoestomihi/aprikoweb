<?php
    include dirname(__FILE__).'/apps/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- container card -->
        <div class="card w-75 mx-auto mt-5">
          <div class="card-header bg-success text-white">Data Nilai</div>
          <div class="card-body">
            
            <div class="container w-70 mt-3">
              <!-- judul -->
                <!-- end judul -->
                <!-- Button add nilai -->
                <a href="tambah_nilai.php" class="btn btn-primary mb-2">Tambah</a>
                <!-- Table Data nilai -->
                <table class="table table-striped table-bordered table-hover">
                <thead class="table-info">
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th>Dosen</th>
                        <th>ID Matkul</th>
                        <th>Mata kuliah</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "Select * from v_detail_nilai";
                            $data = mysqli_query($conn,$sql);
                            $no = (int) 1;
                            foreach($data as $rows ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rows['nim']; $nim = $rows['nim'] ?></td>
                            <td><?php echo $rows['nama_mhs'] ?></td>
                            <td><?php echo $rows['nama_jurusan'] ?></td>
                            <td><?php echo $rows['nama_dosen'] ?></td>
                            <td><?php echo $rows['id_matkul']; $id_matkul = $rows['id_matkul'] ;?></td>
                            <td><?php echo $rows['nama_matkul'] ?></td>
                            <td><?php echo $rows['nilai'] ?></td>
                            <?php $data=array($nim,$id_matkul); ?>
                            <td>
                              <?php
                              echo "<a href= 'delete_nilai.php' class='btn btn-danger btn-sm' > Delete </a>";
                              echo "<a href= 'update_nilai.php?nim=$nim' class='btn btn-success btn-sm' > Update </a>";
                              ?>

                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                    
            </div>
            
          </div>
        </div>
          <!-- end -->
          
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
        </script>
    </body>
    </html>
