<?php
require "config.php";
require "vendor/autoload.php";

function findLoginById($id){
    global $conn;
    $sql = "SELECT * FROM login_db WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}
function findLoginByIdAdm($idu){
    global $conn;
    $sql = "SELECT * FROM login_db WHERE id=:idu";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idu', $idu);
    $stmt->execute();
    $hasil = $stmt->fetch();
    return $hasil;
}

function tampilDataLogin(){   
    global $conn;
    $sql = "SELECT * FROM login_db WHERE akses = 'user'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}
function tampilDataAdmin(){   
    global $conn;
    $sql = "SELECT * FROM login_db WHERE akses = 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $hasil = $stmt->fetchAll();
    return $hasil;
}

function tambahLogin($name, $uname, $email, $pass, $akses, $no_telp){
    global $conn;
    $sql = "INSERT INTO login_db (name, uname, email, pass, akses, no_telp) VALUES (:name, :uname, :email, :pass, :akses, :no_telp)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':no_telp', $no_telp);
    $stmt->bindParam(':akses', $akses);
    if($stmt->execute()){
        echo "<script>alert('Akun Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../login.php'</script>";
        } else {
            return false;
        }    
}
function tambahLoginAdm($name, $uname, $email, $pass, $akses, $no_telp){
    global $conn;
    $sql = "INSERT INTO login_db (name, uname, email, pass, akses, no_telp) VALUES (:name, :uname, :email, :pass, :akses, :no_telp)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':no_telp', $no_telp);
    $stmt->bindParam(':akses', $akses);
    if($stmt->execute()){
        echo "<script>alert('Akun Berhasil Ditambahkan')</script>";
        echo "<script>window.location.href='../../admin/new-admin.php'</script>";
        } else {
            return false;
        }    
}

function  hapusLogin($id){
    global $conn;
    $sql = "DELETE FROM login_db WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}

function  editProfile($name, $email, $no_telp, $bio, $id){
    global $conn;
    $sql = "UPDATE login_db SET name=:name, email=:email, no_telp=:no_telp, bio=:bio where id=:id";
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
// function  uploadFotoProfile($id, $name, $uname, $email, $pass, $akses, $no_telp, $bio, $image){
function  uploadFotoProfile($id, $image){
global $conn;
    $sql = "UPDATE login_db SET  image=:image where id=:id";
    // $sql = "UPDATE login_db SET name=:name, uname=;uname email=:email pass=:pass akses=:akses no_telp=:no_telp image=:image where id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    // $stmt->bindParam(':bio', $bio);
    // $stmt->bindParam(':name', $name);
    // $stmt->bindParam(':uname', $uname);
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':pass', $pass);
    // $stmt->bindParam(':akses', $akses);
    // $stmt->bindParam(':no_telp', $no_telp);
    $stmt->bindParam(':image', $image);
    $stmt->execute();
    if($stmt->execute()){
        echo "<script>alert('Data Berhasil Di Edit')</script>";
        echo "<script>window.location.href='../../profil.php'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan. Silahkan Coba Lagi')</script>";
        echo "<script>window.location.href='../../profil.php'</script>";
    }
}

// function akses($id, $name){
//     global $conn;
//     $sql = "SELECT * FROM login_db WHERE akses = :akses, name=:name";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':akses', $akses);
//     $stmt->bindParam(':name', $name);
//     $stmt->execute();
//     $hasil = $stmt->fetch();
//     return $hasil;
// }

// function login($uname, $pass){
//     global $conn;
//     if (isset($_POST["login"])) {
//         if (empty($_POST["uname"]) || empty($_POST["pass"])) 
//         {
//             $message = '<label>All field is required</label>';
//         }
//     else {
//             $sql = "SELECT * FROM login_db WHERE uname = :uname AND pass = :pass";
//             $stmt = $conn-> prepare($sql);
//             $stmt -> execute(
//              array(
//                     'uname' => $_POST['uname'],
//                     'pass' => $_POST['pass']
//             ));
//                 $count = $stmt->rowCount();
//                 if($count > 0)
//                 {
//                     $_SESSION ["uname"] = $_POST["uname"];
//                     header("location : loginhasil.php");
//                 }
//                 else {
//                     header("location : logingagal.php");
//                 };            
//         }
//     }
    // catch (PDOException $error) {
    //     $message = $error->getMessage();
    // }
// }

function login($uname, $pass){
    global $conn;
    $sql = "SELECT * FROM login_db WHERE uname = :uname AND pass = :pass"; // buat queri select
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute(); // jalankan query

    $count = $stmt->rowCount(); // mengecek row
    if($count == 1) { // jika rownya ada 
            return true;
        }else{
            echo "<script>alert('Login Gagal. Silahkan Cek Username dan Password')</script>";
            echo "<script>window.location.href='../../login.php'</script>";
        }
}
function updatePass($id, $pass){
    global $conn;
    $sql = "UPDATE login_db SET pass = :pass WHERE id = :id"; // buat queri select
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute(); // jalankan query

    if($stmt->execute()) { // jika rownya ada 
        session_start();
        session_destroy();
        echo "<script>alert('Password Berhasil Di Update. Silahkan Login Kembali')</script>";
        echo "<script>window.location.href='../../login.php'</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan')</script>";
            echo "<script>window.location.href='../../home.php'</script>";
        }
}

function cekPass($pass, $pass2){
    if($pass==$pass2) { // jika rownya ada 
            return true;
        }else{
            return false;
        }
}
function cekPass2($pass3, $pass4){
    if($pass3==$pass4) { // jika rownya ada 
            return true;
        }else{
            return false;
        }
}

function cekakses($uname, $pass)
{
        global $conn;
        $sql = "SELECT * FROM login_db WHERE uname = :uname AND pass = :pass";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute(); // jalankan query

        session_start();
        $data=$stmt->fetch();
        if($data['akses']=="admin"){
                $_SESSION['id']=$data['id'];
                $_SESSION['status']="login";
                echo "<script>alert('Login Sukses. Selamat Datang Kembali')</script>";
                echo "<script>window.location.href='../../admin/dash-admin.php'</script>";
        }
        else{
                $_SESSION['id']=$data['id'];
                $_SESSION['status']="login";
                // $_SESSION['status']="login";
                echo "<script>alert('Login Sukses. Selamat Datang Kembali')</script>";
                echo "<script>window.location.href='../../home.php'</script>";
        }
    }
?>