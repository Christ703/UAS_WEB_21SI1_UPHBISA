<?php
require "config.php"; 

function tampilTransaksi(){   
    global $conn;
    $sql = "SELECT * FROM trns";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}



function findTransaksiById($id_transkasi){
    global $conn;
    $sql = "SELECT * FROM trns WHERE id_transkasi=:id_transkasi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_benefit', $id_benefit);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}


function  hapusTransaksi($id_info){
    global $conn;
    $sql = "DELETE FROM trns WHERE id_transkasi=:id_transkasi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_info', $id_info);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}

function tambahTransaksi($benefit, $bronze, $silver, $gold){
    global $conn;
    $sql = "INSERT INTO trns (benefit, judul, tanggal, lokasi, deskripsi, acara_detail, jenis) VALUES :benefit, :bronze, :silver, :gold)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':benefit', $benefit);
    $stmt->bindParam(':bronze', $bronze);
    $stmt->bindParam(':silver', $silver);
    $stmt->bindParam(':silver', $gold);
    if($stmt->execute()){
        echo "<script>alert('Informasi Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../admin/events-admin.php'</script>";
        } else {
            return false;
        }    
}
?>