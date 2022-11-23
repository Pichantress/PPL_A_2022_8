<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: dosen_home.php');
    }
    if($_SESSION['level']!='dosen'){
        if(isset($_SESSION['email'])){
            unset($_SESSION['email']);
            session_destroy();
        }
        header('Location: dosen_home.php');
    } 
    require_once('../lib/db_login.php');
    $email=$_SESSION['email'];

    if($_SERVER['REQUEST_METHOD']=='POST'){
    $k = $_POST['id'];
    $k = trim($k);
    
    $query = "SELECT *
                FROM mahasiswa
                INNER JOIN dosen ON 
                mahasiswa.dosen_wali = dosen.nama_dosen
                INNER JOIN pkl ON 
                mahasiswa.id_pkl_fk = pkl.id_pkl
                INNER JOIN skripsi ON 
                mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                WHERE dosen_wali = nama_dosen AND email_dosen='$email' AND angkatan='{$k}'"
                ;
    $result = mysqli_query($db, $query);

    $query2 = "SELECT *, COUNT(*) AS belum_ambil
                FROM mahasiswa
                INNER JOIN dosen ON 
                mahasiswa.dosen_wali = dosen.nama_dosen
                INNER JOIN pkl ON 
                mahasiswa.id_pkl_fk = pkl.id_pkl
                INNER JOIN skripsi ON 
                mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                WHERE dosen_wali = nama_dosen AND email_dosen='$email' AND angkatan='{$k}' AND status_pkl='belum ambil'"
                ;
    $result2 = mysqli_query($db, $query2);

    $query3 = "SELECT *, COUNT(*) AS sedang_ambil
                FROM mahasiswa
                INNER JOIN dosen ON 
                mahasiswa.dosen_wali = dosen.nama_dosen
                INNER JOIN pkl ON 
                mahasiswa.id_pkl_fk = pkl.id_pkl
                INNER JOIN skripsi ON 
                mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                WHERE dosen_wali = nama_dosen AND email_dosen='$email' AND angkatan='{$k}' AND status_pkl='sedang ambil'"
                ;
    $result3 = mysqli_query($db, $query3);

    $query4 = "SELECT *, COUNT(*) AS lulus
                FROM mahasiswa
                INNER JOIN dosen ON 
                mahasiswa.dosen_wali = dosen.nama_dosen
                INNER JOIN pkl ON 
                mahasiswa.id_pkl_fk = pkl.id_pkl
                INNER JOIN skripsi ON 
                mahasiswa.id_skripsi_fk = skripsi.id_skripsi
                WHERE dosen_wali = nama_dosen AND email_dosen='$email' AND angkatan='{$k}' AND status_pkl='lulus'"
                ;
    $result4 = mysqli_query($db, $query4);

    }

    $no = 1;
    while($data = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?=$no++?>.</td>
            <td><?=$data['nama']?></td>
            <td><?=$data['nim']?></td>
            <td><?=$data['angkatan']?></td>
            <td><?=$data['status_pkl']?></td>
            <td><?=$data['nilai_pkl']?></td>
        </tr>
<?php
    } while($data = mysqli_fetch_array($result2)){
    
?>
        <tr>
            <td>Total Belum Ambil</td>
            <td><?=$data['belum_ambil']?></td>
        </tr>

<?php
    } while($data = mysqli_fetch_array($result3)){
    
?>
        <tr>
            <td>Total Sedang Ambil</td>
            <td><?=$data['sedang_ambil']?></td>
        </tr>

<?php
    } while($data = mysqli_fetch_array($result4)){
    
?>
        <tr>
            <td>Total Lulus</td>
            <td><?=$data['lulus']?></td>
        </tr>

<?php
    }
?>