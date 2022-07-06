<?php
    include dirname(__FILE__).'/apps/koneksi.php';
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM nilai where nim=$nim";
    $query = $conn->query($sql);
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Tambah Nilai</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
      <!-- card -->
      <div class="card w-50 mx-auto mt-3">
          <div class="card-header bg-info text-white">Tambah Nilai</div>
          <div class="card-body">
            <!-- from -->
              <div class="">
                  <form action="" method="post" class="mx-auto p-3">
                    <div class="mb-2">
                      <label for="nim" class="form-label"></label>
                      <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $data['nim']?>" readonly>
                    </div>
                    <div class="mb-2">
                      <label for="dosen" class="form-label">Dosen</label>
                      <select class="form-select" name="dosen" id="dosen" required>
                        <option >Pilih Dosen</option>
                        <?php
                            $sql = "select nama from dosen";
                            $dataDosen = mysqli_query($conn,$sql);
                            $no = (int) 1;
                            foreach($dataDosen as $rows ) : ?>
                            <option value="<?php echo $no++?>"> <?php echo $rows['nama']?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="mb-2">
                      <label for="matkul" class="form-label">Mata Kuliah</label>
                      <select class="form-select" name="matkul" id="matkul" required>
                        <option >Pilih Mata Kuliah</option>
                        <?php
                            $sql = "select * from matkul";
                            $dataMatkul = mysqli_query($conn,$sql);
                            $no =(int) 1;
                            foreach($dataMatkul as $rows ) : ?>
                           <option value="<?php echo $no++?>"> <?php echo $rows['nama']?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="mb-2">
                      <label for="nilai" class="form-label">Nilai</label>
                      <input type="text" class="form-control" name="nilai" id="nilai"value='<?php echo $data['nilai'];?>' required>
                    </div>
                    <div class="mt-3 mx-auto d-flex">
                      <a href="index.php" class="btn btn-secondary ms-auto">Tutup</a>
                      <input type="submit" class="btn btn-primary ms-2" name="tambahBtn" value="Update Data">
                    </div>
                    <?php
                        if(isset($_POST['tambahBtn'])){
                          $nim = $_POST['nim'];
                          $dosen = $_POST['dosen'];
                          $matkul = $_POST['matkul'];
                          $nilai = $_POST['nilai'];
                            
                        $sql = "UPDATE nilai set id_dosen=$dosen,id_matkul=$matkul,nilai=$nilai WHERE nim='$nim'";
                        $queryUpdate = mysqli_query($conn,$sql);
                        echo"<script> window.location.href='index.php';</script>";
                        }
                        ?>
                  </form>
              </div>
            </div>
          </div>
      <!-- end card -->
<!-- container content -->
        <!-- end container -->

    </body>
         <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
          }
        </script>
    </html>