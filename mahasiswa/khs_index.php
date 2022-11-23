<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <?php 
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: mahasiswa_home.php');
        }
        if($_SESSION['level']!='mahasiswa'){
            if(isset($_SESSION['email'])){
                unset($_SESSION['email']);
                session_destroy();
            }
            header('Location: ../login.php');
        } 
        require_once('../lib/db_login.php');
        $email=$_SESSION['email'];
        $query = "SELECT * FROM users 
                    INNER JOIN mahasiswa ON users.email=mahasiswa.email
                    WHERE users.email='$email'";
                                    
        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);
        $username = $data['username'];
        $nim = $data['nim'];
     ?>

    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">Projek Perangkat Lunak</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="mahasiswa_home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="irs_index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                IRS
                            </a>
                            <a class="nav-link" href="khs_index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                KHS
                            </a>
                            <a class="nav-link" href="pkl_mahasiswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                PKL
                            </a>
                            <a class="nav-link" href="skripsi_mahasiswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Skripsi
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?=$data['username']?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard-KHS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome, <?=$data['nama']?></li>
                        </ol>
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-lg-9 col-xl-7">
                                    <div class="card bg-primary text-white mb-4">
                                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                                    <img src="../assets/img/avatar.jpg"
                                                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                                        style="width: 150px; z-index: 1">
                                                </div>
                                                <div class="ms-3" style="margin-top: 50px;">
                                                    <h5><?=$data['nama']?></h5>
                                                    <p><?=$data['nim']?> <br>
                                                        <?=$data['angkatan']?>
                                                    </p>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Rekapitulasi KHS
                            </div>
                            

                            <div class="card-body">
                            <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="form-select" onchange="khs_semester(this.options[this.selectedIndex].value)" style="width: 100px;">
                                    <option value="" >--Pilih--</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9" >9</option>
                                    <option value="10" >10</option>
                                    <option value="11" >11</option>
                                    <option value="12" >12</option>
                                    <option value="13" >13</option>
                                    <option value="14" >14</option>
                                </select>

                            <br>
                            <a class="btn btn-warning btn-sm" href="entry_khs.php">Entry KHS</a>

                            <table class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Jumlah SKS Semester</th>
                                            <th>Jumlah SKS Kumulatif</th>
                                            <th>IP Semester</th>
                                            <th>IP Kumulatif</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    require_once('../lib/db_login.php');
                                    if (isset($_GET['semester'])){
                                        $semester=$_GET['semester'];
                                        $no = 1;
                                        $query = "SELECT * FROM khs
                                                    INNER JOIN mahasiswa ON
                                                    (mahasiswa.nim = khs.nim_mahasiswa_fk)
                                                    WHERE mahasiswa.nama='$username' AND
                                                    khs.semester_aktif='$semester'"
                                                    ;
                                        
                                        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));

                                        while($data = mysqli_fetch_array($sql_ppl)){ ?>
                                            <tr>
                                                <td><?=$data['jumlah_sks_semester']?></td>
                                                <td><?=$data['jumlah_sks_kumulatif']?></td>
                                                <td><?=$data['ip_semester']?></td>
                                                <td><?=$data['ip_kumulatif']?></td>
                                                <td><a class="btn btn-warning btn-sm" href=<?php echo '"update_khs.php?nim='.$nim.'&semester_aktif='.$semester.'"' ?>>Update KHS</a></td>
                                            </tr>
                                        <?php
                                        } ?>
                                        
                                        
                                        
                                        <?php
                                        $db->close();
                                        ?>
                                    <?php
                                    } ?>
                                    

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                                  
                </main>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script type="text/javascript">
            function khs_semester(value){
                let url = "khs_index.php";
                window.location.href= url+"?semester="+value;
            }
        </script>
    </body>
</html>
