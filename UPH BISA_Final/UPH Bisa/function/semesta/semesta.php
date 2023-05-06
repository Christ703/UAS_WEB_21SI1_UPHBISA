<?php
require "config.php";
require "vendor/autoload.php";

function cetakFaktur($id){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, info.tanggal, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi
    FROM 
    ((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE 
    receipt.id = :id AND receipt.status = ' '";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakFakturPending($id){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, info.tanggal, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi, receipt.status
    FROM 
    ((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE 
    receipt.id = :id AND receipt.status = 'Pending' ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakFaktuRjt($id){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, info.tanggal, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi, receipt.status
    FROM 
    ((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE 
    receipt.id = :id AND receipt.status = 'Rejected'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakFakturAppr($id){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, info.tanggal, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi, receipt.status
    FROM 
    ((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE 
    receipt.id = :id AND receipt.status = 'Approved'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakFaktuPrf($id){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi, receipt.status
    FROM 
    (((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
                    INNER JOIN trns ON receipt.id_receipt = trns.id_receipt)
                    WHERE receipt.id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakFaktuPrfAd($idu){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi, receipt.status
    FROM 
    (((receipt      INNER JOIN login_db     ON  receipt.id = login_db.id) 
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
                    INNER JOIN trns ON receipt.id_receipt = trns.id_receipt)
                    WHERE receipt.id=:idu";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idu', $idu);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakAllFaktur(){
    global $conn;
    $sql = "SELECT trns.status, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    trns.total_transaksi, info.images, info.id_info, info.lokasi
    FROM 
    (((trns         INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE trns.status = 'Approved'
    ORDER BY trns.tanggal_transaksi DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakRejectFaktur(){
    global $conn;
    $sql = "SELECT trns.status, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    trns.total_transaksi, info.images, info.id_info, info.lokasi
    FROM 
    (((trns         INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE trns.status = 'Rejected'
    ORDER BY trns.tanggal_transaksi DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakRcpSponsorShip(){
    global $conn;
    $sql = "SELECT trns.status, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    trns.total_transaksi, info.images, info.id_info, info.lokasi
    FROM 
    (((trns         INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE receipt.metode = 'Partnership'
    ORDER BY trns.tanggal_transaksi DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function jumlahTerbanyak(){
    global $conn;
    $sql = "SELECT trns.status, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    trns.total_transaksi, info.images, info.id_info, info.lokasi,
    receipt.id, count(info.id_info) as Jumlah
    FROM 
    (((trns         INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    group by info.id_info ORDER by count(info.id_info) DESC;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function jumlahTerbanyakNama(){
    global $conn;
    $sql = "SELECT trns.status, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
    trns.total_transaksi, info.images, info.id_info, info.lokasi,
    receipt.id, count(login_db.id) as Jumlah
    FROM 
    (((trns         INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
    group by login_db.id ORDER by count(login_db.id) DESC;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function jumlahDana(){
    global $conn;
    $sql = "SELECT sum(total_transaksi) as Dana
    FROM trns_approval WHERE status = 'Approved'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function jumlahEvent(){
    global $conn;
    $sql = "SELECT count(id_info) as Total
    FROM info";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function trsAkhhir(){
    global $conn;
    $sql = "SELECT * FROM trns ORDER BY tanggal_transaksi DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakNDAppr(){
    global $conn;
        $sql = "SELECT trns_approval.id_transaksi, trns_approval.status, info.jenis, info.judul, receipt.jenis_benefit,
        info.orgn, info.acara_detail, trns.tanggal_transaksi, login_db.name, receipt.metode,
        trns.total_transaksi, info.images, info.id_info, info.lokasi
        FROM 
        ((((trns_approval           INNER JOIN trns         ON  trns_approval.id_transaksi = trns.id_transaksi) 
                                    INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                                    INNER JOIN login_db     ON  receipt.id = login_db.id)  
                                    INNER JOIN info         ON  receipt.id_info =  info.id_info)
        WHERE 	trns_approval.status=' ' OR 
        		trns_approval.status='Pending'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function cetakNDApprBYid_trs($id_transaksi){
    global $conn;
    $sql = "SELECT info.judul, receipt.jenis_benefit, info.orgn, info.tanggal, login_db.name, 
    receipt.metode, receipt.harga, trns_approval.image_trns, info.lokasi, trns_approval.id_transaksi, trns_approval.acc_num,
    trns_approval.name_trns, receipt.id_receipt
    FROM 
    ((((trns_approval           INNER JOIN trns         ON  trns_approval.id_transaksi = trns.id_transaksi) 
                                INNER JOIN receipt      ON  trns.id_receipt = receipt.id_receipt) 
                                INNER JOIN login_db     ON  receipt.id = login_db.id)  
                                INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE trns_approval.id_transaksi = :id_transaksi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}


function cetakReceipt($id_receipt){
    global $conn;
    $sql = "SELECT receipt.id_receipt, info.jenis, info.judul, receipt.jenis_benefit,
    info.orgn, info.acara_detail, info.tanggal, login_db.name, receipt.metode,
    receipt.harga, info.images, info.id_info, info.lokasi
    FROM 
    ((receipt   INNER JOIN login_db     ON  receipt.id = login_db.id) 
                INNER JOIN info         ON  receipt.id_info =  info.id_info)
    WHERE 
    receipt.id_receipt = :id_receipt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_receipt', $id_receipt);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function cetakFakturTrns($id_transaksi, $total_transaksi, $id_receipt, $tanggal_transaksi, $image_trns){
    global $conn;
    $sql = "INSERT INTO trns (id_transaksi, total_transaksi, id_receipt, tanggal_transaksi, image_trns)
    VALUES (:id_transaksi, :total_transaksi, :id_receipt, :tanggal_transaksi, :image_trns)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->bindParam(':total_transaksi', $total_transaksi);
    $stmt->bindParam(':id_receipt', $id_receipt);
    $stmt->bindParam(':tanggal_transaksi', $tanggal_transaksi);
    $stmt->bindParam(':image_trns', $image_trns);
    $stmt->execute();
    } 

function BuatTransaksi($id_transaksi, $total_transaksi, $name_trns, $tanggal_transaksi, $acc_num, $image_trns){
    global $conn;
    $sql = "INSERT INTO trns_approval (id_transaksi, total_transaksi, name_trns, tanggal_transaksi, acc_num, image_trns)
    VALUES (:id_transaksi, :total_transaksi, :name_trns, :tanggal_transaksi, :acc_num, :image_trns)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->bindParam(':total_transaksi', $total_transaksi);
    $stmt->bindParam(':name_trns', $name_trns);
    $stmt->bindParam(':tanggal_transaksi', $tanggal_transaksi);
    $stmt->bindParam(':acc_num', $acc_num);
    $stmt->bindParam(':image_trns', $image_trns);
    
    if ($stmt->execute()) {
        echo "<script>alert('Your Transaction Will Be Processed')</script>";
        echo "<script>window.location.href='../../home.php'</script>";
    }else {
        echo "<script>alert('An Error Occurred In Process')</script>";
        echo "<script>window.location.href='../../home.php'</script>";
    } 
}

function updateStatusAppr($status, $id_transaksi){
    global $conn;
    $sql = "UPDATE trns_approval set status = :status WHERE id_transaksi = :id_transaksi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->execute();
}
function updateStatusTrns($status, $id_transaksi){
    global $conn;
    $sql = "UPDATE trns set status = :status WHERE id_transaksi = :id_transaksi";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->execute();
}
function updateStatusRcpt($status, $id_receipt){
    global $conn;
    $sql = "UPDATE receipt set status = :status WHERE id_receipt = :id_receipt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id_receipt', $id_receipt);
    $stmt->execute();
}



?>