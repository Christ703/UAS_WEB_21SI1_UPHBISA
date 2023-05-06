<?php
require "config.php"; 

function tampilReceipt(){   
    global $conn;
    $sql = "SELECT * FROM receipt";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function findReceiptById($id_receipt){
    global $conn;
    $sql = "SELECT * FROM receipt WHERE id_receipt=:id_receipt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_receipt', $id_receipt);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}
function hapusReceipt($id_receipt){
    global $conn;
    $sql = "DELETE FROM receipt WHERE id_receipt=:id_receipt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_receipt', $id_receipt);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}
function tambahReceipt($id, $id_info, $jenis_benefit, $metode, $harga, $id_receipt){
    global $conn;
    $sql = "INSERT INTO receipt (id, id_info, jenis_benefit, metode, harga, id_receipt) VALUES (:id, :id_info, :jenis_benefit, :metode, :harga, :id_receipt)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_info', $id_info);
    $stmt->bindParam(':jenis_benefit', $jenis_benefit);
    $stmt->bindParam(':metode', $metode);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':id_receipt', $id_receipt);
    if($stmt->execute()){
        echo "<script>alert('Item Berhasil Ditambahkan Dalam Keranjang')</script>";
        echo "<script>window.location.href='../../event.php'</script>";
        } else {
            return false;
        }  
}
?>