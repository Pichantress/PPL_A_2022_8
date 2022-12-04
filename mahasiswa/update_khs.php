<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update KHS</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: irs_index.php');
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
$semester = $_GET['semester_aktif'];
$nim = $_GET['nim'];

if (isset($_POST["submit"])) {

    $valid = TRUE;

    $jumlah_sks_semester= test_input($_POST['jumlah_sks_semester']);
    if (!preg_match("/^[0-9]*$/", $jumlah_sks_semester)) {
        $error_jumlah_sks_semester = "Pake angka";
        $valid = FALSE;
    }
    $jumlah_sks_kumulatif= test_input($_POST['jumlah_sks_kumulatif']);
    if (!preg_match("/^[0-9]*$/", $jumlah_sks_kumulatif)) {
        $error_jumlah_sks_kumulatif = "Pake angka";
        $valid = FALSE;
    }
    $ip_semester= test_input($_POST['ip_semester']);
    if ($ip_semester== '') {
        $error_ip_semester = "Harus diisi";
        $valid = FALSE;
    }
    $ip_kumulatif= test_input($_POST['ip_kumulatif']);
    if ($ip_kumulatif == '') {
        $error_ip_kumulatif = "Harus diisi";
        $valid = FALSE;
    }
    $ekstensi_diperbolehkan    = array('pdf');
    $transkrip    = $_FILES['update_khs']['name'];
    $x        = explode('.', $transkrip);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['update_khs']['size'];
    $file_tmp    = $_FILES['update_khs']['tmp_name']; 
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){ 
            move_uploaded_file($file_tmp, '../assets/file/khs/'.$transkrip);
        }
        else{
            echo 'UKURAN FILE TERLALU BESAR!';
        }
    }
    else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }
    if ($valid) {
        $query = "UPDATE `khs` SET `jumlah_sks_semester`='$jumlah_sks_semester', `jumlah_sks_kumulatif`='$jumlah_sks_kumulatif', `ip_semester`='$ip_semester', `ip_kumulatif`='$ip_kumulatif', 
                `dokumen`='$transkrip' WHERE `nim_mahasiswa_fk` = '$nim' AND semester_aktif='$semester'";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
        }else{
            $db->close();
            header('Location: khs_index.php');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update KHS</h3></div>
                                    <div class="card-body">
                                    <form action="" method="POST" autocomplete="on" Enctype="Multipart/Form-Data">
                                    <div class="form-group">
                                            <label class="h5" for="jumlah_sks_semester">Jumlah Sks Semester</label>    </br>
                                            <input type="text" id="jumlah_sks_semester" name="jumlah_sks_semester">
                                            <div class="error"><?php if (isset($error_jumlah_sks_semester)) echo $error_jumlah_sks_semester ?></div>
                                        </div>
                                        <br>                                       
                                        <div class="form-group">
                                            <label class="h5" for="jumlah_sks_kumulatif">Jumlah sks Kumulatif</label>    </br>
                                            <input type="text" id="jumlah_sks_kumulatif" name="jumlah_sks_kumulatif">
                                            <div class="error"><?php if (isset($error_jumlah_sks_kumulatif)) echo $error_jumlah_sks_kumulatif ?></div>
                                        </div>
                                        <br>                                        
                                        <div class="form-group">
                                            <label class="h5" for="ip_semester">Ip Semester</label>    </br>
                                            <input type="text" id="ip_semester" name="ip_semester">
                                            <div class="error"><?php if (isset($error_ip_semester)) echo $error_ip_semester ?></div>
                                        </div>
                                        <br>
                                        
                                        <div class="form-group">
                                            <label class="h5" for="ip_kumulatif">Ip Kumulatif</label>    </br>
                                            <input type="text" id="ip_kumulatif" name="ip_kumulatif">
                                            <div class="error"><?php if (isset($error_ip_kumulatif)) echo $error_ip_kumulatif ?></div>
                                        </div>
                                        <br />
                                        <div class="form-group">
											<input type="file" name="update_khs" accept=".pdf" class="form_control" />
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <button type="submit" class="btn btn btn-outline-success btn-lg px-5" name="submit" value="submit">Submit</button>
                                            <br><br>
                                            <a href="khs_index.php" class="btn btn-outline-danger btn-lg px-5">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

</body>


<?php
$db->close();
?>