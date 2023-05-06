<?php
require "datalogin.php";
require "vendor/autoload.php";
$action = $_REQUEST['action'];

if($action=="SignUP")
{
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $akses = $_POST['akses'];
        $no_telp = $_POST['no_telp'];
        if(cekPass($pass, $pass2)){
            tambahLogin($name, $uname, $email, $pass, $akses, $no_telp);
        } else {
            echo "<script>alert('Password yang dimasukkan tidak tepat')</script>";
            echo "<script>window.location.href='../../signup.php'</script>";
        }
}
if($action=="Tambah Admin")
{
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $akses = $_POST['akses'];
        $no_telp = $_POST['no_telp'];
        if(cekPass($pass, $pass2)){
            tambahLoginAdm($name, $uname, $email, $pass, $akses, $no_telp);
        } else {
            echo "<script>alert('Password yang dimasukkan tidak tepat')</script>";
            echo "<script>window.location.href='../../admin/new-admin.php'</script>";
        }
}

    
elseif ($action=="hapus"){
    $id = $_GET['id'];

    if(hapusLogin($id)){
        header('location: index.php');
    } else {
        die("gagal di hapus");
    }
} 
elseif($action == "Edit Profile")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $bio = $_POST['bio'];
    $id = $_POST['id'];
    editProfile($name, $email, $no_telp, $bio, $id);
}
elseif($action == "Update")
{
    $pass = md5($_POST['newpass']);
    $pass2 = md5($_POST['repass']);
    $pass3 = md5($_POST['oldpass']);
    $pass4 = $_POST['pass'];
    $id = $_POST['id'];

    if(cekPass2($pass3, $pass4)){
        if(cekPass($pass, $pass2)){
        updatePass($id, $pass);
    } else {
        echo "<script>alert('Silahkan Periksa Kembali Password yang Dimasukkan')</script>";
        echo "<script>window.location.href='../../profil_edit.php'</script>";
    }
    }
    else {
        echo "<script>alert('Password Lama yang Anda Masukkan Salah')</script>";
        echo "<script>window.location.href='../../profil_edit.php'</script>";
    }
}

elseif ($action=="Login") 
{
    $uname = $_POST['uname'];
    $pass = md5($_POST['pass']);

    
    if(login($uname, $pass)){
        cekakses($uname, $pass);
        // header('location: ../../admin/dash-admin.html');
    } else {
        die("gagal masuk");
    }
}

elseif ($action=="Upload") 
{
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $akses = $_POST['akses'];
    $no_telp = $_POST['no_telp'];
    $bio = $_POST['bio'];
    
    $storage = new \Upload\Storage\FileSystem('../../upload');
    $file = new \Upload\File('image', $storage);
        // Optionally you can rename the file on upload
    $new_filename = $id.$uname.uniqid();
    $file->setName($new_filename);

    // Validate file upload
    // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
    $file->addValidations(array(
        // Ensure file is of type "image/png"
        // new \Upload\Validation\Mimetype('image/png'),

        //You can also add multi mimetype validation
        new \Upload\Validation\Mimetype(array('image/png', 'image/jpeg', 'image/jpg')),

        // Ensure file is no larger than 5M (use "B", "K", M", or "G")
        new \Upload\Validation\Size('10M')
    ));

    // Access data about the file that has been uploaded
    $data = array(
        'name'       => $file->getNameWithExtension(),
        'extension'  => $file->getExtension(),
        'mime'       => $file->getMimetype(),
        'size'       => $file->getSize(),
        'md5'        => $file->getMd5(),
        'dimensions' => $file->getDimensions()
    );
    // Try to upload file
    try {
        // Success!
        $file->upload();
        $image = $file->getNameWithExtension();
    } catch (\Exception $e) {
        // Fail!
        $errors = $file->getErrors();
    };
    uploadFotoProfile($id, $image);
}


?>