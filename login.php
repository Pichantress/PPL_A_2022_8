<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <?php
        session_start();
        require_once('./lib/db_login.php');


        if (isset($_POST['submit'])) {
            $valid = TRUE;

            // Memeriksa validasi email
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = 'Email is required';
                $valid = FALSE;
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = 'Invalid email format';
                $valid = FALSE;
            }

            // Memeriksa validasi password
            $password = test_input($_POST['password']);
            if ($password == '') {
                $error_password = 'Password is required';
                $valid = FALSE;
            }

            if ($valid) {
                // Memeriksa validasi
                // menyeleksi data user dengan username dan password yang sesuai
                $login = mysqli_query($db,"SELECT * FROM users WHERE email='".$email."' AND password ='".md5($password)."'");
                // menghitung jumlah data yang ditemukan
                $cek = mysqli_num_rows($login);
                
                // cek apakah username dan password di temukan pada database
                if($cek > 0){
                
                    $data = mysqli_fetch_assoc($login);
                    $_POST['username']=$username;
                
                    // cek jika user login sebagai admin
                    if($data['level']=="admin"){
                
                        // buat session login dan username
                        $_SESSION['email'] = $email;
                        $_SESSION['level'] = "admin";
                        // alihkan ke halaman dashboard admin
                        header("location:./admin/admin_home.php");
                        exit;
                    // cek jika user login sebagai pegawai
                    }else if($data['level']=="dosen"){
                        // buat session login dan username
                        $_SESSION['email'] = $email;
                        $_SESSION['level'] = "dosen";
                        // alihkan ke halaman dashboard pegawai
                        header("location:./dosen/dosen_home.php");
                        exit;
                    // cek jika user login sebagai pengurus
                    }else if($data['level']=="mahasiswa"){
                        // buat session login dan username
                        $_SESSION['email'] = $email;
                        $_SESSION['level'] = "mahasiswa";
                        // alihkan ke halaman dashboard pengurus
                        header("location:./mahasiswa/mahasiswa_home.php");
                        exit;
                    }else if($data['level']=="departemen"){
                        // buat session login dan username
                        $_SESSION['email'] = $email;
                        $_SESSION['level'] = "departemen";
                        // alihkan ke halaman dashboard pengurus
                        header("location:./departemen/departemen_home.php");
                        exit;
                    }else{
                        // alihkan ke halaman login kembali
                        header("location:login.php?pesan=gagal");
                    }	
                }else{
                    header("location:login.php?pesan=gagal");
                }

                    // TODO 5: Tutup koneksi dengan database
                    $db->close();
            }
            
        }
    ?>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" autocomplete="on" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                            <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>">
                                                <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password" value="">
                                                <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
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
        <script src="js/scripts.js"></script>
    </body>
</html>
