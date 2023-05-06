<?php
require "config.php"; 

function tampilBenefit(){   
    global $conn;
    $sql = "SELECT * FROM bnft";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}



function findBenefitById($id_benefit){
    global $conn;
    $sql = "SELECT * FROM bnft WHERE id_benefit=:id_benefit";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_benefit', $id_benefit);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function markValue($x){
    if ($x == 0)
    {
        ?><i class="fa fa-remove"></i><?php
    }
    elseif ($x == 1) {
        ?><i class="fa fa-check"></i><?php
    }
    elseif ($x == 2) {
        ?><i class="fa fa-check"></i><?php
    }
    elseif ($x == 3) {
        ?><i class="fa fa-check"></i><?php
    }
}

function markKalimat($x){
        if ($x == 0)
        {
            echo "None";
        }
        elseif ($x == 1) {
            echo "Small";
        }
        elseif ($x == 2) {
            echo "Medium";
        }
        elseif ($x == 3) {
            echo "Large";
        }
}
function mark30s($x){
        if ($x == 0)
        {
            echo "None";
        }
        elseif ($x == 1) {
            echo "10 Committeess";
        }
        elseif ($x == 2) {
            echo "All Committeess";
        }
        elseif ($x == 3) {
            echo "All Committeess & Participants";
        }
}

function  hapusBenefit($id_info){
    global $conn;
    $sql = "DELETE FROM bnft WHERE id_benefit=:id_benefit";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_info', $id_info);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}

function tambahBenefit($benefit, $bronze, $silver, $gold){
    global $conn;
    $sql = "INSERT INTO bnft (benefit, judul, tanggal, lokasi, deskripsi, acara_detail, jenis) VALUES :benefit, :bronze, :silver, :gold)";
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