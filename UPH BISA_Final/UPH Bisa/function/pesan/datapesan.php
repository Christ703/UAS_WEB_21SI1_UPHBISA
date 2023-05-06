<?php
require "config.php";

function findPesanById($idp){
    global $conn;
    $sql = "SELECT * FROM pesan WHERE idp = :idp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idp', $idp);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function tampilPesan(){   
    global $conn;
    $sql = "SELECT * FROM pesan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilPesanSpesifik(){   
    global $conn;
    $sql = "SELECT * FROM pesan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}

function tambahPesan($uname, $email, $Subject, $msg){
    global $conn;
    $sql = "INSERT INTO pesan (uname, email, Subject, msg) VALUES (:uname, :email, :Subject, :msg)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':Subject', $Subject);
    $stmt->bindParam(':msg', $msg);
    if($stmt->execute()){
        echo "<script>alert('Akun Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
        } else {
            return false;
        }    
}

function  hapusPesan($idp){
    global $conn;
    $sql = "DELETE FROM pesan WHERE idp=:idp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idp', $idp);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "<script>alert('Pesan Berhasil Dihapuskan')</script>";
        echo "<script>window.location.href='../../admin/forum-admin.php'</script>";
    }
    else {
        echo "<script>alert('Terjadi Kesalahan')</script>";
        echo "<script>window.location.href='../../admin/forum-admin.php'</script>";
    }
}

function  updatePesan($name, $email, $no_telp, $bio, $id){
    global $conn;
    $sql = "UPDATE pesan SET name=:name, email=:email, no_telp=:no_telp, bio=:bio where id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':no_telp', $no_telp);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if($stmt->execute()){
        echo "<script>alert('Data Berhasil Di Edit')</script>";
        echo "<script>window.location.href='../../profil.php'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi')</script>";
        echo "<script>window.location.href='../../profil.php'</script>";
    }
}
?>