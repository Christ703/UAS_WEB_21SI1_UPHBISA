<?php
require "config.php"; 
require "vendor/autoload.php";

function findInfoById($id_info){
    global $conn;
    $sql = "SELECT * FROM info WHERE id_info=:id_info";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_info', $id_info);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function tampilInfo(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE tanggal >= CURDATE() 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function infoAll(){   
    global $conn;
    $sql = "SELECT * FROM info 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoLampau(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE tanggal <= CURDATE() 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoBEM(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'BEM' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
// sini 
function tampilInfoSGS(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'SGS' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoAOU(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'Ambassadors' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoHMPSA(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'HMPSA' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoHMPSM(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'HMPSM' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoHMPSSI(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'HMPSSI' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoHMPSTIF(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE orgn = 'HMPSTIF' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoSeminar(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE jenis = 'Seminar' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilInfoTalkshow(){   
    global $conn;
    $sql = "SELECT * FROM info 
    WHERE jenis = 'Talk Show' 
    ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}

function tambahInfo($orgn, $judul, $tanggal, $lokasi, $deskripsi, $acara_detail, $jenis, $harga_gold, $harga_silver, $harga_bronze, $ship_gold, $ship_silver, $ship_bronze){
    global $conn;
    $sql = "INSERT INTO info (orgn, judul, tanggal, lokasi, deskripsi, acara_detail, jenis, harga_gold, harga_silver, harga_bronze, ship_gold, ship_silver, ship_bronze) 
    VALUES (:orgn, :judul, :tanggal, :lokasi, :deskripsi, :acara_detail, :jenis, :harga_gold, :harga_silver, :harga_bronze, :ship_gold, :ship_silver, :ship_bronze)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':orgn', $orgn);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':lokasi', $lokasi);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':acara_detail', $acara_detail);
    $stmt->bindParam(':jenis', $jenis);
    $stmt->bindParam(':harga_gold', $harga_gold);
    $stmt->bindParam(':harga_silver', $harga_silver);
    $stmt->bindParam(':harga_bronze', $harga_bronze);
    $stmt->bindParam(':ship_gold', $ship_gold);
    $stmt->bindParam(':ship_silver', $ship_silver);
    $stmt->bindParam(':ship_bronze', $ship_bronze);
    if($stmt->execute()){
        echo "<script>alert('Informasi Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../admin/events-admin.php'</script>";
        } else {
            return false;
        }    
}

function  hapusInfo($id_info){
    global $conn;
    $sql = "DELETE FROM info WHERE id_info=:id_info";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_info', $id_info);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}

function editInfo($id_info, $orgn, $judul, $tanggal, $lokasi, $deskripsi, $acara_detail, $jenis, $images, $harga_gold, $harga_silver, $harga_bronze, $ship_gold, $ship_silver, $ship_bronze){
    global $conn;
    $sql = "UPDATE info SET orgn=:orgn, judul=:judul, tanggal=:tanggal, 
    lokasi=:lokasi, deskripsi=:deskripsi, acara_detail=:acara_detail, 
    jenis=:jenis, images=:images, harga_gold=:harga_gold, 
    harga_silver=:harga_silver, harga_bronze=:harga_bronze, 
    ship_gold=:ship_gold, ship_silver=:ship_silver, 
    ship_bronze=:ship_bronze 
    
    WHERE id_info=:id_info";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':orgn', $orgn);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':lokasi', $lokasi);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':acara_detail', $acara_detail);
    $stmt->bindParam(':jenis', $jenis);
    $stmt->bindParam(':id_info', $id_info);
    $stmt->bindParam(':images', $images);
    $stmt->bindParam(':harga_gold', $harga_gold);
    $stmt->bindParam(':harga_silver', $harga_silver);
    $stmt->bindParam(':harga_bronze', $harga_bronze);
    $stmt->bindParam(':ship_gold', $ship_gold);
    $stmt->bindParam(':ship_silver', $ship_silver);
    $stmt->bindParam(':ship_bronze', $ship_bronze);
    $stmt->execute();

    if($stmt->execute()){
        echo "<script>alert('Informasi Berhasil Di Edit')</script>";
        echo "<script>window.location.href='../../admin/events-admin.php'</script>";
        } else {
            return false;
        }  
}
function InfoFoto($images, $id_info){
    global $conn;
    $sql = "UPDATE info SET images=:images    
    WHERE id_info=:id_info";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_info', $id_info);
    $stmt->bindParam(':images', $images);
    $stmt->execute();

    if($stmt->execute()){
        echo "<script>alert('Informasi Berhasil Di Edit')</script>";
        echo "<script>window.location.href='../../admin/events-admin.php'</script>";
        } else {
            return false;
        }  
}

?>