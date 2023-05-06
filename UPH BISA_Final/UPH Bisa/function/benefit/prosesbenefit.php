<?php
require "info.php";
$action = $_REQUEST['action'];

    
if ($action=="Delete"){
    $id_info = $_GET['id'];

    if(hapusInfo($id_info)){
        header('location: index.php');
    } else {
        die("gagal di hapus");
    }
} 

elseif ($action=="Add") 
{   
    $benefit = $_POST['benefit'];
    $gold = $_POST['gold'];
    $silver = $_POST['silver'];
    $bronze = $_POST['bronze'];  
    tambahBenefit($id_info, $orgn, $judul, $tanggal, $lokasi, $deskripsi, $acara_detail, $jenis, $images);
}

?>