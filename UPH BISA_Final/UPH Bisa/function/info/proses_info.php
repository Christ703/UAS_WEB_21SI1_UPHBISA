<?php
require "info.php";
require "vendor/autoload.php";
$action = $_REQUEST['action'];

    
if ($action=="hapus"){
    $id_info = $_GET['id'];

    if(hapusInfo($id_info)){
        header('location: index.php');
    } else {
        die("gagal di hapus");
    }
} 

elseif ($action=="Save") 
{   
    $id_info = $_POST['id_info'];
    $orgn = $_POST['orgn'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $acara_detail = $_POST['acara_detail'];
    $jenis = $_POST['jenis'];
    $images = $_POST['images'];
    $harga_gold = $_POST['harga_gold'];
    $harga_silver = $_POST['harga_silver'];
    $harga_bronze = $_POST['harga_bronze'];
    $ship_gold = $_POST['ship_gold'];
    $ship_silver = $_POST['ship_silver'];
    $ship_bronze = $_POST['ship_bronze'];
    
    editInfo($id_info, $orgn, $judul, $tanggal, $lokasi, $deskripsi, $acara_detail, $jenis, $images, $harga_gold, $harga_silver, $harga_bronze, $ship_gold, $ship_silver, $ship_bronze);
}
elseif ($action=="Tambah Event") 
{   
    $orgn = $_POST['orgn'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $acara_detail = $_POST['acara_detail'];
    $jenis = $_POST['jenis'];
    $harga_gold = $_POST['harga_gold'];
    $harga_silver = $_POST['harga_silver'];
    $harga_bronze = $_POST['harga_bronze'];
    $ship_gold = $_POST['ship_gold'];
    $ship_silver = $_POST['ship_silver'];
    $ship_bronze = $_POST['ship_bronze'];

    tambahInfo($orgn, $judul, $tanggal, $lokasi, $deskripsi, $acara_detail, $jenis, $harga_gold, $harga_silver, $harga_bronze, $ship_gold, $ship_silver, $ship_bronze);
}

elseif ($action=="Upload") 
{   
        
        $id_info = $_POST['id_info'];
        
        $storage = new \Upload\Storage\FileSystem('../../upload');
        $file = new \Upload\File('images', $storage);
            // Optionally you can rename the file on upload
        $new_filename = $id_info.$judul.uniqid();
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
            $images = $file->getNameWithExtension();
        } catch (\Exception $e) {
            // Fail!
            $errors = $file->getErrors();
        };
        InfoFoto($images, $id_info);
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
?>