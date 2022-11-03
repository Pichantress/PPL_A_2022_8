<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <?php
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: ../login.php');
        }
        if($_SESSION['level']!='admin'){
            if(isset($_SESSION['email'])){
                unset($_SESSION['email']);
                session_destroy();
            }
            header('Location: ../login.php');
        }
        require_once('../lib/db_login.php');

        if (isset($_POST["submit"])) {

            $valid1 = TRUE;
            $valid2 = TRUE;
            $valid3 = TRUE;

            $name = test_input($_POST['nama']);
            if ($name == '') {
                $error_name = "Name is required";
                $valid2 = FALSE;
            } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $error_name = "Only letters and white space allowed";
                $valid3 = FALSE;
            }

            $nim = test_input($_POST['nim']);
            if ($nim == '') {
                $error_nim = "NIM/NIP is required";
                $valid2 = FALSE;
            } else if (!preg_match("/^[0-9]*$/", $nim)) {
                $error_nim = "Only numbers space allowed";
                $valid2 = FALSE;
            }

            $angkatan = test_input($_POST['angkatan']);
                if (!preg_match("/^[0-9]*$/", $angkatan)) {
                        $error_nim = "Only numbers space allowed";
                        $valid2 = FALSE;
                    }

            //validasi email: tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if($email ==''){
                $error_email = "Email harus diisi";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_nama = "Format email tidak benar";
                $valid1 = FALSE;
            }

            $password = test_input($_POST['password']);
            if ($password == '') {
                $error_password = "Password is required";
                $valid1 = FALSE;
            }

            $level = $_POST['level'];
            if ($level == '' || $level == 'none') {
                $error_level = "User level is required";
                $valid = FALSE;
            }

            if ($valid1) {
                $query1 = "INSERT INTO `users` (`username`, `email`, `password`, `level`) VALUES ('$name', '$email', MD5('$password'), '$level');";
                $result1 = $db->query($query1);
                if(!$result1){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query1);
                }
            }

            if ($valid2 && $level=='mahasiswa') {
                $query4 = "INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `email`) VALUES ('$nim', '$name', '$angkatan', '$email')";
                $result4 = $db->query($query4);
                if(!$result4){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query4);
                }
            }


            if ($valid2  && $level=='mahasiswa') {
                $query2 = "INSERT INTO `pkl` (`nim_mahasiswa_fk`, `status_pkl`) VALUES ('$nim', 'Belum Ambil');";
                $result2 = $db->query($query2);
                if(!$result2){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query2);
                }
            }

            if ($valid2  && $level=='mahasiswa') {
                $query3 = "INSERT INTO `skripsi` (`nim_mahasiswa_fk`, `status_skripsi`) VALUES ('$nim', 'Belum Ambil');";
                $result3 = $db->query($query3);
                if(!$result3){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query3);
                }
            }

            if ($valid2  && $level=='dosen') {
                $query6 = "INSERT INTO `dosen` (`nip`, `nama_dosen`, `email_dosen`) VALUES ('$nim', '$name', '$email')";
                $result6 = $db->query($query6);
                if(!$result6){
                    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query4);
                }
            }
            
        $query_id = "SELECT * FROM pkl INNER JOIN skripsi ON pkl.nim_mahasiswa_fk=skripsi.nim_mahasiswa_fk
                    WHERE pkl.nim_mahasiswa_fk = $nim";
                                    
        $sql_ppl= mysqli_query($db, $query_id) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);
        $id_pkl= $data['id_pkl'];
        $id_skripsi= $data['id_skripsi'];

        if ($valid2) {
            $query5 = "UPDATE `mahasiswa` SET `id_pkl_fk`='$id_pkl', `id_skripsi_fk`='$id_skripsi' WHERE `nim` = '$nim'";
            $result5 = $db->query($query5);
            if(!$result5){
                die("Could not query the database: <br />".$db_error.'<br>Query: '.$query5);
            }else{
                $db->close();
                header('Location: admin_home.php');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                    <form action="" method="POST" autocomplete="on">
                                    <div class="form-group">
                                        <label class="h5" for="nim">NIM/NIP</label>    </br>
                                        <input type="text" id="nim" name="nim">
                                        <div class="error"><?php if (isset($error_nim)) echo $error_nim ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h5" for="nama">Nama</label>    </br>
                                        <input type="text" id="nama" name="nama">
                                        <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h5" for="angkatan">Angkatan</label>    </br>
                                        <input type="text" id="angkatan" name="angkatan">
                                        <div class="error"><?php if (isset($error_angkatan)) echo $error_angkatan ?></div>
                                    </div>
                                        <div class="form-group">
                                            <label class="h5" for="email">Email</label>    </br>
                                            <input type="text" id="email" name="email">
                                            <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="h5" for="password">Password</label>    </br>
                                            <input type="password" id="password" name="password">
                                            <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">User Level</label>
                                            <select name="level" id="level" class="form-control" required>
                                                <option value="none" <?php if (!isset($level)) echo 'selected' ?>>--Select User Level--</option>
                                                <option value="dosen" <?php if (isset($level) && $level == "dosen") echo 'selected' ?>>Dosen</option>
                                                <option value="mahasiswa" <?php if (isset($level) && $level == "mahasiswa") echo 'selected' ?>>Mahasiswa</option>
                                                <option value="admin" <?php if (isset($level) && $level == "admin") echo 'selected' ?>>Admin</option>
                                            </select>
                                            <div class="error"><?php if (isset($error_level)) echo $error_level ?></div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn btn-outline-success btn-lg px-5" name="submit" value="submit">Submit</button>
                                            <br><br>
                                            <a href="admin_home.php" class="btn btn-outline-danger btn-lg px-5">Cancel</a>
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
        <script src="../js/scripts.js"></script>
    </body>
</html>
