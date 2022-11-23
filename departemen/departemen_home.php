<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Departemen</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <?php 
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: ../login.php');
        }
        if($_SESSION['level']!='departemen'){
            if(isset($_SESSION['email'])){
                unset($_SESSION['email']);
                session_destroy();
            }
            header('Location: ../login.php');
        } 
        require_once('../lib/db_login.php');
        $email=$_SESSION['email'];
        $query = "SELECT * FROM users WHERE email='$email'";
                                    
        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);
     ?>

    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Projek Perangkat Lunak</a>
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
                            <a class="nav-link" href="dosen_home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome, <?=$data['username']?></li>
                        </ol>
                        <div class="row">
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List Mahasiswa
                            </div>
                            <div class="card-body">
                            <table class="table table-striped" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Angkatan</th>
                                            <th>Status PKL</th>
                                            <th>Status Skripsi</th>
                                            <th>Dosen Wali</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    require_once('../lib/db_login.php');
                                    
                                        $no = 1;
                                        $query = "SELECT *
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi"
                                                    ;
                                        $result = mysqli_query($db, $query);
                                    
                                        $query2 = "SELECT *, COUNT(*) AS belum_ambil
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_pkl='belum ambil'"
                                                    ;
                                        $result2 = mysqli_query($db, $query2);
                                    
                                        $query3 = "SELECT *, COUNT(*) AS sedang_ambil
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_pkl='sedang ambil'"
                                                    ;
                                        $result3 = mysqli_query($db, $query3);
                                    
                                        $query4 = "SELECT *, COUNT(*) AS lulus
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_pkl='lulus'"
                                                    ;
                                        $result4 = mysqli_query($db, $query4);

                                        $query5 = "SELECT *, COUNT(*) AS belum_ambil
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_skripsi='belum ambil'"
                                                    ;
                                        $result5 = mysqli_query($db, $query5);

                                        $query6 = "SELECT *, COUNT(*) AS sedang_ambil
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_skripsi='sedang ambil'"
                                                    ;
                                        $result6 = mysqli_query($db, $query6);

                                        $query7 = "SELECT *, COUNT(*) AS lulus
                                                    FROM mahasiswa
                                                    INNER JOIN pkl ON 
                                                    mahasiswa.id_pkl_fk = pkl.id_pkl
                                                    INNER JOIN skripsi ON 
                                                    mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                                                    WHERE status_skripsi='lulus'"
                                                    ;
                                        $result7 = mysqli_query($db, $query7);
                                        
                                   

                                    while($data = mysqli_fetch_array($result)){ ?>
                                        <tr>
                                            <td><?=$no++?>.</td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['nim']?></td>
                                            <td><?=$data['angkatan']?></td>
                                            <td><?=$data['status_pkl']?></td>
                                            <td><?=$data['status_skripsi']?></td>
                                            <td><?=$data['dosen_wali']?></td>
                                        </tr>
                                        <?php
                                            } while($data = mysqli_fetch_array($result2)){
                                        ?>
                                                <tr>
                                                    <td>Total Belum Ambil PKL</td>
                                                    <td><?=$data['belum_ambil']?></td>
                                                

                                        <?php
                                            } while($data = mysqli_fetch_array($result3)){
                                            
                                        ?>
                                                
                                                    <td>Total Sedang Ambil PKL</td>
                                                    <td><?=$data['sedang_ambil']?></td>

                                        <?php
                                            } while($data = mysqli_fetch_array($result4)){
                                            
                                        ?>
                                                    <td>Total Lulus PKL</td>
                                                    <td><?=$data['lulus']?></td>
                                                </tr>
                                        <?php
                                            } while($data = mysqli_fetch_array($result5)){
                                            
                                        ?>
                                                <tr>
                                                    <td>Total Belum Ambil Skripsi</td>
                                                    <td><?=$data['belum_ambil']?></td>

                                        <?php
                                            } while($data = mysqli_fetch_array($result6)){
                                            
                                        ?>
                                            
                                                    <td>Total Sedang Ambil Skripsi</td>
                                                    <td><?=$data['sedang_ambil']?></td>
                                                

                                        <?php
                                            } while($data = mysqli_fetch_array($result7)){
                                            
                                        ?>
                                            
                                                    <td>Total Lulus Skripsi</td>
                                                    <td><?=$data['lulus']?></td>
                                                </tr>

                                        <?php
                                            }
                                        ?>
                                    
                                    
                                    
                                    <?php
                                    $db->close();
                                    ?>

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
    </body>
</html>
