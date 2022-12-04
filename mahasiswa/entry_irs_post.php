<?php

require_once('../lib/db_login.php');
$nim = $_GET['nim'];
$semester = $_POST['semester'];
$total_sks= $_POST['total_sks'];
$file = $_FILES['file']['name'];
$ekstensi_file = array('pdf');
$folder = '../assets/file/';
$ekstensi=strtolower(end(explode('.', $_FILES['file']['name'])));
$ekstensi_ok = in_array($ekstensi, $ekstensi_file, $folder.$file);

if(!($ekstensi_ok)){
    header("location:entry_irs_post.php?pesan=gagal");
}else{
    move_uploaded_file($source, $folder, $file);
}

$query = "INSERT INTO `irs` (`nim_mahasiswa_fk`, `semester_aktif`, `jumlah_sks`, `file`) VALUES ('$nim', '$semester', '$total_sks', '$file');";
$result = $db->query($query);
if(!$result){
    die("Could not query the database: <br />".$db_error.'<br>Query: '.$query5);
}
header("location:irs_index.php");

?>