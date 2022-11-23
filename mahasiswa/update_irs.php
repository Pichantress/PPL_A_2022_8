<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update IRS</title>
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

    $total_sks= test_input($_POST['total_sks']);
    if (!preg_match("/^[0-9]*$/", $total_sks)) {
        $error_nilai_pkl = "Only letters and white space allowed";
        $valid = FALSE;
    }

    if ($valid) {
        $query = "UPDATE `irs` SET `jumlah_sks`='$total_sks' WHERE semester_aktif='$semester' AND nim_mahasiswa_fk='$nim'";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
        }else{
            $db->close();
            header('Location: irs_index.php');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add IRS</h3></div>
                                    <div class="card-body">
                                    <form action="" method="POST" autocomplete="on">
                                        <br>
										<div class="form-group">
                                            <label name="total_sks">SKS</label>    </br>
                                            <input type="text" id="total_sks" name="total_sks">
                                            <div class="error"><?php if (isset($error_total_sks)) echo $error_total_sks ?></div>
                                        </div>
                                        <br>
										<div class="form-control">
											<input type="file" id="upload" name="upload" hidden ="hidden" />
											<button type="button" id="button_upload">CHOOSE A FILE</button>
											<span id="custom_text">No file chosen, yet.</span>
											<script type="text/javascript">
												const realUploadBTN = document.getElementById("upload");
												const buttonUpload = document.getElementById("button_upload");
												const customText = document.getElementById("custom_text");
												
												customText.addEventListener("click", funtion(){
													realUploadBTN.click();
												});
												realUploadBTN.addEventListener("change", funtion(){
													if(realUploadBTN.value){
														customText.innerHTML= realUploadBTN.value;
													}else{
														customText.innerHTML= "No file chosen, yet.";
													}
												}
											</script>
											<style>
												#button_upload{
													padding: 2px;
													color: white;
													background-color: blue;
													border: 1px solid #000;
													border-radius: 5px;
													cursor: pointer;
												}
												#button_upload:hover{
													background-color: $00b28f;
												}
												#customText{
													margin: left;
													font-family: sans-serif;
													color: #000;
												}
											</style>
										</div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn btn-outline-success btn-lg px-5" name="submit" value="submit">Submit</button>
                                            <br><br>
                                            <a href="irs_index.php" class="btn btn-outline-danger btn-lg px-5">Cancel</a>
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