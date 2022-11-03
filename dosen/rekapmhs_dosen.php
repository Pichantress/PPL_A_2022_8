<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Dosen</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .view_khs,
            .view_irs{
                color: white;
            }

            .view_khs:hover,
            .view_irs:hover{
                color: gray;
            }
        </style>
    </head>

    <?php 
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: ../login.php');
        }
        if($_SESSION['level']!='dosen'){
            if(isset($_SESSION['email'])){
                unset($_SESSION['email']);
                session_destroy();
            }
            header('Location: ../login.php');
        } 
        require_once('../lib/db_login.php');
        $email=$_SESSION['email'];
        
        $query = "SELECT * FROM users WHERE email='$email' 
                ";
                                    
        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);

        if (isset($_GET['nim'])){
            $nim = $_GET['nim'];
            $query2 = "SELECT * FROM mahasiswa
                        -- INNER JOIN irs ON (irs.nim_mahasiswa_fk = mahasiswa.nim)
                        WHERE nim='$nim'
                ";
                                    
            $sql_ppl2= mysqli_query($db, $query2) or die (mysqli_error($db));
            $data2 = mysqli_fetch_array ($sql_ppl2);
        }
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
                            <a class="nav-link" href="verification_dosen.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Verification
                            </a>
                            <a class="nav-link" href="pkl_dosen.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Rekap PKL
                            </a>
                            <a class="nav-link" href="skripsi_dosen.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Rekap Skripsi
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
                                                    <h5><?=$data2['nama']?></h5>
                                                    <p><?=$data2['nim']?> <br>
                                                        <?=$data2['angkatan']?>
                                                    </p>    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         

                        <h1>Semester</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">1</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=1&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=1&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">2</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=2&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=2&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">3</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=3&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=3&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">4</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=4&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=4&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">5</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=5&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=5&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">6</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=6&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=6&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">7</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=7&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=7&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">8</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=8&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=8&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">9</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=9&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=9&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">10</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=10&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=10&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">11</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=11&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=11&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">12</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=12&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=12&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">13</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=13&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=13&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">14</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="view_irs" href=<?php echo '"irs_index2.php?semester=14&nim='.$data2['nim'].'"'?>>View IRS</a>
                                        <a class="view_khs" href=<?php echo '"khs_index2.php?semester=14&nim='.$data2['nim'].'"'?>>View KHS</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
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
