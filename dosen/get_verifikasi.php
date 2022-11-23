<?php

require_once('../lib/db_login.php');


$nim = $_GET['nim'];
$tipe = $_GET['tipe_verifikasi'];


$query = "UPDATE `verifikasi` INNER JOIN `mahasiswa` ON verifikasi.nim_verifikasi=mahasiswa.nim
            SET `status_verifikasi`='SUDAH TERVERIFIKASI'
            WHERE `nim_verifikasi` = $nim AND `tipe_verifikasi`= '$tipe'";
$result = $db->query($query);
if(!$result){
die("Could not query the database: <br />".$db_error.'<br>Query: '.$query);
}else{
    echo "<script> alert('work gan') </script>";
$db->close();
header('Location: verification_dosen.php');
}


?>