<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Entry PKL</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: pkl_mahasiswa.php');
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
$id_pkl_fk = $data['id_pkl_fk'];

if (isset($_POST["submit"])) {

    $valid = TRUE;
    
    $nilai_pkl= test_input($_POST['nilai_pkl']);
    if (!preg_match("/^[0-9]*$/", $nilai_pkl)) {
        $error_nilai_pkl = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $status = $_POST['status'];
            if ($status == '' || $status == 'none') {
                $error_status = "Status is required";
                $valid = FALSE;
            }

    if ($valid) {
        $query = "UPDATE `pkl` SET `status_pkl`='$status', `nilai_pkl`='$nilai_pkl' WHERE `id_pkl` = '$id_pkl_fk' ";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
        }
    }

    if ($valid) {
        $email=$_SESSION['email'];
        $query = "SELECT * FROM users 
            INNER JOIN mahasiswa ON users.email=mahasiswa.email
            WHERE users.email='$email'";
        $sql_ppl= mysqli_query($db, $query) or die (mysqli_error($db));
        $data = mysqli_fetch_array ($sql_ppl);
        $nim= $data['nim'];
        $name= $data['nama'];

        $query2 = "INSERT INTO `verifikasi` (`id_verifikasi`, `nim_verifikasi`, `nama_verifikasi`, `tipe_verifikasi`, `status_verifikasi`) VALUES (NULL, '$nim', '$name', 'PKL', 'BELUM TERVERIFIKASI');";
        $result2 = $db->query($query2);
        if(!$result2){
            die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
        }else{
            $db->close();
            header('Location: pkl_mahasiswa.php');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add PKL</h3></div>
                                    <div class="card-body">
                                    <form action="" method="POST" autocomplete="on">
                                        <div class="form-group">
                                            <label for="status">Status PKL</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="none" <?php if (!isset($status)) echo 'selected' ?>>--Select Status--</option>
                                                <option value="Belum Ambil" <?php if (isset($status) && $status == "belum_ambil") echo 'selected' ?>>Belum Ambil</option>
                                                <option value="Sedang Ambil" <?php if (isset($status) && $status == "sedang_ambil") echo 'selected' ?>>Sedang Ambil</option>
                                                <option value="Lulus" <?php if (isset($status) && $status == "lulus") echo 'selected' ?>>Lulus</option>
                                            </select>
                                            <div class="error"><?php if (isset($error_status)) echo $error_status ?></div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="h5" for="nilai_pkl">Nilai PKL</label>    </br>
                                            <input type="text" id="nilai_pkl" name="nilai_pkl">
                                            <div class="error"><?php if (isset($error_nilai_pkl)) echo $error_nilai_pkl ?></div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn btn-outline-success btn-lg px-5" name="submit" value="submit">Submit</button>
                                            <br><br>
                                            <a href="pkl_mahasiswa.php" class="btn btn-outline-danger btn-lg px-5">Cancel</a>
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