<?php
require "dataabout.php";
require "vendor/autoload.php";

$action = $_REQUEST['action'];

if ($action=="Hapus Pesan"){
    $idp = $_POST['idp'];
    hapusPesan($idp);
} 

elseif($action=="Kirim Pesan")
{
    $Subject = $_POST['Subject'];
    $msg = $_POST['msg'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    if(tambahPesan($nama, $email, $Subject, $msg)){
        echo "<script>alert('Pesan Telah Terikirim')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";        
    }else {
        echo "<script>alert('Terjadi Kesalahhan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
    }
}
elseif($action=="save1")
{
    $id_abt = $_POST['id_abt'];
    $jenis = $_POST['jenis'];
    $jenis_isi = $_POST['jenis_isi'];
    $image = $_POST['image'];
    
    $storage = new \Upload\Storage\FileSystem('../../upload');
    $file = new \Upload\File('image', $storage);
        // Optionally you can rename the file on upload
    $new_filename = $id_abt.uniqid();
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


    if(simpanAbout($id_abt, $jenis, $jenis_isi, $image)){
        echo "<script>alert('Pesan Telah Terikirim')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";        
    }else {
        echo "<script>alert('Terjadi Kesalahhan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
    }
}

elseif($action=="save2")
{
    $id_abt = $_POST['id_abt'];
    $jenis = $_POST['jenis'];
    $jenis_isi = $_POST['jenis_isi'];
    
    if(simpanAbouts($id_abt, $jenis, $jenis_isi)){
        echo "<script>alert('Pesan Telah Terikirim')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";        
    }else {
        echo "<script>alert('Terjadi Kesalahhan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
    }
}

elseif($action=="save3")
{
    $id_abt = $_POST['id_abt'];
    $jenis = $_POST['jenis'];
    $jenis_isi = $_POST['jenis_isi'];
    $image = $_POST['image'];
    
    if(simpanAbout($id_abt, $jenis, $jenis_isi, $image)){
        echo "<script>alert('Pesan Telah Terikirim')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";        
    }else {
        echo "<script>alert('Terjadi Kesalahhan')</script>";
        echo "<script>window.location.href='../../about-us.php'</script>";
    }
}
?>