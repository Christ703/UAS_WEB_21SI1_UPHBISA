<?php
require "config.php";
require "vendor/autoload.php";

function findaboutById($id_abt){
    global $conn;
    $sql = "SELECT * FROM about WHERE id_abt = :id_abt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_abt', $id_abt);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function tampilabout(){   
    global $conn;
    $sql = "SELECT * FROM about";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}

function tambahabout($jenis, $jenis_isi, $image){
    global $conn;
    $sql = "INSERT INTO about (jenis, jenis_isi, image) VALUES (:jenis, :jenis_isi, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':jenis', $jenis);
    $stmt->bindParam(':jenis_isi', $jenis_isi);
    $stmt->bindParam(':image', $image);
    if($stmt->execute()){
        echo "<script>alert('Informasi Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
        } else {
            return false;
        }    
}

function  hapusabout($id_abt){
    global $conn;
    $sql = "DELETE FROM about WHERE id_abt=:id_abt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_abt', $id_abt);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "<script>alert('Informasi Berhasil Dihapuskan')</script>";
        echo "<script>window.location.href='../../admin/forum-admin.php'</script>";
    }
    else {
        echo "<script>alert('Terjadi Kesalahan')</script>";
        echo "<script>window.location.href='../../admin/forum-admin.php'</script>";
    }
}

function  simpanAbout($id_abt, $jenis, $jenis_isi, $image){
    global $conn;
    $sql = "UPDATE about SET jenis =:jenis, jenis_isi=:jenis_isi, image=:image where id_abt=:id_abt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_abt', $id_abt);
    $stmt->bindParam(':jenis', $jenis);
    $stmt->bindParam(':jenis_isi', $jenis_isi);
    $stmt->bindParam(':image', $image);
    $stmt->execute();
    if($stmt->execute()){
        echo "<script>alert('Informasi Telah di Update')</script>";
        echo "<script>window.location.href='../../admin/about-admin.php'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi')</script>";
        echo "<script>window.location.href='about-admin.php'</script>";
    }
}

function  simpanAbouts($id_abt, $jenis, $jenis_isi){
    global $conn;
    $sql = "UPDATE about SET jenis =:jenis, jenis_isi=:jenis_isi where id_abt=:id_abt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_abt', $id_abt);
    $stmt->bindParam(':jenis', $jenis);
    $stmt->bindParam(':jenis_isi', $jenis_isi);
    $stmt->execute();
    if($stmt->execute()){
        echo "<script>alert('Informasi Telah di Update')</script>";
        echo "<script>window.location.href='../../admin/about-admin.php'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi')</script>";
        echo "<script>window.location.href='about-admin.php'</script>";
    }
}
?>