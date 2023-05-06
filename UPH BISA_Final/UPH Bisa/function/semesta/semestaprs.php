<?php
require "semesta.php";
require "vendor/autoload.php";
$action = $_REQUEST['action'];

    
if ($action=="Delete"){
    $id_info = $_GET['id'];

    if(hapusInfo($id_info)){
        header('location: index.php');
    } else {
        die("gagal di hapus");
    }
} 

elseif ($action=="SEND") 
{   
    $id_transaksi = $_POST['id_transaksi'];
    $total_transaksi = $_POST['total_transaksi'];
    $name_trns = $_POST['name_trns'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $acc_num = $_POST['acc_num'];
    $id_receipt = $_POST['id_receipt'];
    $status = 'Pending';

    $storage = new \Upload\Storage\FileSystem('../../upload');
    $file = new \Upload\File('image_trns', $storage);
        // Optionally you can rename the file on upload
    $new_filename = $id_transaksi.uniqid();
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
        $image_trns = $file->getNameWithExtension();
    } catch (\Exception $e) {
        // Fail!
        $errors = $file->getErrors();
    };
    cetakFakturTrns($id_transaksi, $total_transaksi, $id_receipt, $tanggal_transaksi, $image_trns);
    BuatTransaksi($id_transaksi, $total_transaksi, $name_trns, $tanggal_transaksi, $acc_num, $image_trns);
    updateStatusRcpt($status, $id_receipt);

    }
elseif ($action=="PROCESS") 
{   
    $id_transaksi = $_POST['id_transaksi'];
    $total_transaksi = $_POST['total_transaksi'];
    $name_trns = $_POST['name_trns'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $acc_num = $_POST['acc_num'];
    $id_receipt = $_POST['id_receipt'];
    $status = 'Pending';
    $image_trns = ' ';

    cetakFakturTrns($id_transaksi, $total_transaksi, $id_receipt, $tanggal_transaksi, $image_trns);
    BuatTransaksi($id_transaksi, $total_transaksi, $name_trns, $tanggal_transaksi, $acc_num, $image_trns);
    updateStatusRcpt($status, $id_receipt);

    }

?>