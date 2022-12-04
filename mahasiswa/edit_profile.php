<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <?php
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: profile.php');
        }
                if($_SESSION['level']!='mahasiswa'){
            if(isset($_SESSION['email'])){
                unset($_SESSION['email']);
                session_destroy();
            }
            header('Location: ../login.php');
        } 
        require_once('../lib/db_login.php');
        $idM = $_GET['nim'];
        $query = "SELECT * FROM mahasiswa WHERE nim=".$idM."";
                                    
        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);
        $nim = $data['nim'];
        $angkatan = $data['angkatan'];
        $email = $data['email'];
        
        if (isset($_POST["submit"])) {
        
            $valid = TRUE;

            $nama = test_input($_POST['nama']);
            if ($nama == '') {
                $error_nama = "Nama harus diisi";
                $valid = FALSE;
            } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Only letters and white space allowed";
                $valid = FALSE;
            }

            $semester = $_POST['semester'];
            if ($semester== '' || $semester == 'none') {
                $error_semester= "Pilih Semester Aktif";
                $valid = FALSE;
            }

            $jalur_masuk = $_POST['jalur_masuk'];
            if ($jalur_masuk== '' || $jalur_masuk == 'none') {
                $error_jalur_masuk= "Pilih Jalur Masuk";
                $valid = FALSE;
            }

            $dosen_wali = test_input($_POST['dosen_wali']);
            if ($dosen_wali == '') {
                $error_dosen_wali = "Masukan Nama Dosen Wali";
                $valid = FALSE;
            }

            $no_hp = test_input($_POST['no_handphone']);
            if(empty($no_hp)){
                $error_hp = "Nomor HP harus diisi";
                $valid = FALSE;
            }elseif(!preg_match("/^[0-9]*$/",$no_hp)){
                $error_hp = "Nomor HP hanya dapat berisi angka";
                $valid = FALSE;
            }

            $alamat = test_input($_POST['alamat']);
            if ($alamat == '') {
                $error_alamat = "Alamat harus diisi";
                $valid = FALSE;
            }

            $id_provinsi = $_POST['provinsi'];
            if (isset($id_provinsi)){
                $query2 = "SELECT * FROM provinsi WHERE id_provinsi=$id_provinsi";
                                        
                $sql_ppl2= mysqli_query($db, $query2) or die (mysqli_error($db));
                $data2 = mysqli_fetch_array ($sql_ppl2);

                $provinsi = $data2['nama_provinsi'];
            }

            $id_kota = $_POST['kabupaten'];
            if (isset($id_kota)){
                $query3 = "SELECT * FROM kabupaten WHERE id_kota=$id_kota";
                                        
                $sql_ppl3= mysqli_query($db, $query3) or die (mysqli_error($db));
                $data3 = mysqli_fetch_array ($sql_ppl3);

                $kota = $data3['nama_kota'];
            }

            if ($valid) {
                $alamat = $db->real_escape_string($alamat);
                $query = "UPDATE `mahasiswa` SET `nama`='$nama', `semester`='$semester', `jalur_masuk`='$jalur_masuk', `dosen_wali`='$dosen_wali', `alamat`='$alamat', `kota`='$kota', `provinsi`='$provinsi',`no_handphone`='$no_hp', `id_provinsi_fk`='$id_provinsi', `id_kota_fk`='$id_kota' WHERE nim=".$idM."";
                $result = $db->query($query);
                if(!$result){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
                }else{
                    $db->close();
                    header('Location: profile.php');
                }
            }
        
        }
     ?>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Profile</h3></div>
                                    <div class="card-body">
                                    <form action="" method="POST" autocomplete="on">
                                    <div class="form-group" id ="form-nama">
                                        <label class="h5" for="nama">Nama</label>    </br>
                                        <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>">
                                        <div class="error"><?php if (isset($error_nama)) echo $error_nama ?></div>
                                    </div>
                                    <div class="form-group" id="form-nim">
                                        <label class="h5" for="nim">NIM</label>    </br>
                                        <input type="text" id="nim" name="nim" value="<?= $nim; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="h5" for="semester">Semester</label>
                                        <select name="semester" id="semester" class="form-select" style="width: 250px;">
                                            <option value="none" <?php if (!isset($semester)) echo 'selected' ?>>--Pilih Semester--</option>
                                            <option value="1" <?php if (isset($semester) && $semester == "1") echo 'selected' ?>>1</option>
                                            <option value="2" <?php if (isset($semester) && $semester == "2") echo 'selected' ?>>2</option>
                                            <option value="3" <?php if (isset($semester) && $semester== "3") echo 'selected' ?>>3</option>
                                            <option value="4" <?php if (isset($semester) && $semester== "4") echo 'selected' ?>>4</option>
                                            <option value="5" <?php if (isset($semester) && $semester== "5") echo 'selected' ?>>5</option>
                                            <option value="6" <?php if (isset($semester) && $semester== "6") echo 'selected' ?>>6</option>
                                            <option value="7" <?php if (isset($semester) && $semester== "7") echo 'selected' ?>>7</option>
                                            <option value="8" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>8</option>
                                            <option value="9" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>9</option>
                                            <option value="10" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>10</option>
                                            <option value="11" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>11</option>
                                            <option value="12" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>12</option>
                                            <option value="13" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>13</option>
                                            <option value="14" <?php if (isset($semester) && $semester== "8") echo 'selected' ?>>14</option>
                                        </select>
                                        <div class="error"><?php if (isset($error_semester)) echo $error_semester?></div>
                                    </div>
                                    <div class="form-group" id="form-angkatan">
                                        <label class="h5" for="angkatan">Angkatan</label>    </br>
                                        <input type="text" id="angkatan" name="angkatan" value="<?= $angkatan; ?>" disabled>
                                        <div class="error"><?php if (isset($error_angkatan)) echo $error_angkatan ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h5" for="semester">Jalur Masuk</label>
                                        <select name="jalur_masuk" id="jalur_masuk" class="form-select">
                                            <option value="none" <?php if (!isset($jalur_masuk)) echo 'selected' ?>>--Pilih Jalur Masuk--</option>
                                            <option value="SNMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk == "SNMPTN") echo 'selected' ?>>SNMPTN</option>
                                            <option value="SBMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk == "SBMPTN") echo 'selected' ?>>SBMPTN</option>
                                            <option value="MANDIRI" <?php if (isset($jalur_masuk) && $jalur_masuk== "MANDIRI") echo 'selected' ?>>MANDIRI</option>
                                            <option value="LAINNYA" <?php if (isset($jalur_masuk) && $jalur_masuk== "LAINNYA") echo 'selected' ?>>LAINNYA</option>
                                        </select>
                                        <div class="error"><?php if (isset($error_jalur_masuk)) echo $error_jalur_masuk?></div>
                                    </div>
                                    <div class="form-group" id ="form-dosen">
                                        <label class="h5" for="dosen wali">Dosen Wali</label>    </br>
                                        <input type="text" id="dosen_wali" name="dosen_wali" value="<?= $data['dosen_wali']; ?>" >
                                        <div class="error"><?php if (isset($error_dosen_wali)) echo $error_dosen_wali ?></div>
                                    </div>
                                    <div class="form-group" id="form-email">
                                        <label class="h5" for="email">Email</label>    </br>
                                        <input type="text" id="email" name="email" value="<?= $email; ?>">
                                        <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
                                    </div>
                                    <div class="form-group" id="form-hp">
                                        <label class="h5" for="No Hp">No HP</label>    </br>
                                        <input type="text" id="no_handphone" name="no_handphone" value="<?= $data['no_handphone']; ?>">
                                        <div class="error"><?php if (isset($error_hp)) echo $error_hp ?></div>
                                    </div>
                                    <div class="form-group" id="form-alamat">
                                        <label class="h5" for="alamat">Alamat</label>    </br>
                                        <input type="text" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
                                        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-select" onchange="showKabupaten(this.value)" required>
                                            <option value="" <?php if (!isset($provinsi)) echo 'selected' ?>>--Pilih Provinsi--</option>
                                            <?php
                                            require_once('../lib/db_login.php');

                                            // Asign A Query
                                            $query = "SELECT * FROM provinsi ORDER BY id_provinsi";
                                            $result = $db->query($query);

                                            if (!$result) {
                                                die("Could not query the database: <br>" . $db->error);
                                            }

                                            while ($row = $result->fetch_object()) {
                                                echo '<option value="' . $row->id_provinsi. '">' . $row->nama_provinsi . '</option>';
                                            }

                                            $result->free();
                                            $db->close();
                                            ?>
                                        </select>
                                        <div class="error"><?php if (isset($error_provinsi)) echo $error_provinsi?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kota</label>
                                        <select class="form-select" id="kabupaten" name="kabupaten">
                                        <option value="" <?php if (!isset($kota)) echo 'selected' ?>>--Pilih Kota--</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn btn-outline-success btn-lg px-5" name="submit" value="submit">Submit</button>
                                        <br><br>
                                        <a href="profile.php" class="btn btn-outline-danger btn-lg px-5">Cancel</a>
                                    </div>
                                    </form>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Kelompok 8</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/ajax.js"></script>
    </body>
</html>
