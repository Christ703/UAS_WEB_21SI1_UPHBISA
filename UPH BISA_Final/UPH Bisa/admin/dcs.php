<?php 
include 'config.php';
require '../function/login/datalogin.php';
require '../function/pesan/datapesan.php';
require '../function/about/dataabout.php';
require '../function/semesta/semesta.php';
require '../function/info/info.php';

$input = $_REQUEST['action'];
$id_transaksi = $_POST['id_transaksi'];
$id_receipt = $_POST['id_receipt'];

if ($input=="Approve") {
    $status="Approved";
    updateStatusAppr($status, $id_transaksi);
    updateStatusTrns($status, $id_transaksi);
    updateStatusRcpt($status, $id_receipt);
    echo "<script>alert('Successfully Updated Status')</script>";
    echo "<script>window.location.href='dash-admin.php'</script>";
}
elseif ($input=="Reject") {
    $status="Rejected";
    updateStatusAppr($status, $id_transaksi);
    updateStatusTrns($status, $id_transaksi);
    updateStatusRcpt($status, $id_receipt);
    echo "<script>alert('Successfully Updated Status')</script>";
    echo "<script>window.location.href='dash-admin.php'</script>";
} 
elseif ($input=="Pending") {
    $status="Pending";
    updateStatusAppr($status, $id_transaksi);
    updateStatusTrns($status, $id_transaksi); 
    updateStatusRcpt($status, $id_receipt);
    echo "<script>alert('Successfully Updated Status')</script>";
    echo "<script>window.location.href='dash-admin.php'</script>";
} 
?>