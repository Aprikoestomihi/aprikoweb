<?php
    include dirname(__FILE__).'/apps/koneksi.php';
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
          <div class="card-header bg-primary text-white">Tambah Nilai</div>
          <div class="card-body">
            <!-- from -->
              <div class="">
                  <form action="" method="post" class="mx-auto p-3">
                    <div class="mb-2">
                      <label for="nim" class="form-label">NIM</label>
                      <select class="form-select"name="nim" id="nim" required>
                        <option >Pilih Nim</option>
                        <?php
                            $sql = "select nim from mahasiswa";
                            $data = mysqli_query($conn,$sql);
                            foreach($data as $rows ) : ?>
                            <option value="<?php echo $rows['nim']?>"> <?php echo $rows['nim']?> </option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="mb-2">
                      <label for="dosen" class="form-label">Dosen</label>
                      <select class="form-select" name="dosen" id="dosen" required>
                        <option >Pilih Dosen</option>
                        <?php
                            $sql = "select nama from dosen";
                            $data = mysqli_query($conn,$sql);
                            $no = (int) 1;
                            foreach($data as $rows ) : ?>
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
                      <input type="text" class="form-control" name="nilai" id="nilai" placeholder="1-100" required>
                    </div>
                    <div class="mt-3 mx-auto d-flex">
                      <a href="index.php" class="btn btn-secondary ms-auto">Tutup</a>
                      <input type="submit" class="btn btn-primary ms-2" name="tambahBtn" value="Tambah Data">
                    </div>
                    <?php
                        if(isset($_POST['tambahBtn'])){
                          $nim = $_POST['nim'];
                          $dosen = $_POST['dosen'];
                          $matkul = $_POST['matkul'];
                          $nilai = $_POST['nilai'];

  
                          if($nim==0 || $dosen ==0 || $matkul ==0){
                            echo  "<div class='alert alert-danger mt-2'> Pilih Opsi </div>";
                          }else{

                            $sqlGet = "SELECT * FROM nilai where nim='$nim' and id_matkul=$matkul";
                            $queryGet = mysqli_query($conn,$sqlGet);
                            $count = mysqli_num_rows($queryGet);
                            if($count>0){
                              echo  "<div class='alert alert-danger mt-2'>  gagal </div>";
                            }else{
                              
                              $sqlInsert = "INSERT INTO nilai (nim,id_dosen,id_matkul,nilai)
                                            values ('$nim',$dosen,$matkul,$nilai)";
                              $queryInsert = $conn->query($sqlInsert);
                              alert($queryInsert,$count);
                           
                            }


                          }

                        }

                        function alert($sql,$count){
                          if(isset($sql) && $count==0){
                            $alert = "<div class='alert alert-success mt-2'> data berhasil disimpan</div>";
                          }else if($count >0 || $nim==""){
                            $alert = "<div class='alert alert-danger mt-2'> data gagal disimpan</div>";
                          }
                          echo $alert;
                        }

                        function getId(){
                          $sql="SELECT * FROM nilai";
                          $query = mysqli_query($conn,$sql);
                          $id= mysqli_num_rows($query);
                          return $id;
                        }

                        ?>
                  </form>
                
              
                  <!-- end form -->
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