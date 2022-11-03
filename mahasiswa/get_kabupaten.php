<?php

require_once('../lib/db_login.php');


$provinsiID = $_GET['id'];


$query = "SELECT * FROM kabupaten INNER JOIN provinsi ON kabupaten.id_provinsi_fk=".$provinsiID;
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}


while($row = $result->fetch_object()){
        echo '<option value="' . $row->id_kota. '">' . $row->nama_kota . '</option>';
}

$result->free();
$db->close();
?>