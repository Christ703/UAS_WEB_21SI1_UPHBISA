<?php
require "datapesan.php";
$action = $_REQUEST['action'];

if ($action=="Hapus Pesan"){
    $idp = $_POST['idp'];
    hapusPesan($idp);
} 

elseif($action=="Kirim Pesan")
{
    $Subject = $_POST['Subject'];
    $msg = $_POST['msg'];
    $nama = $_POST['uname'];
    $email = $_POST['email'];

    if(tambahPesan($nama, $email, $Subject, $msg)){
        echo "<script>alert('Pesan Telah Terikirim')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";        
    }else {
        echo "<script>alert('Terjadi Kesalahhan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
    }
}



?>