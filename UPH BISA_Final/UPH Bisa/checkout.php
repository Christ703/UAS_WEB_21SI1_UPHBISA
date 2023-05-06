<?php
session_start();
error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/pesan/datapesan.php';
include 'function/about/dataabout.php';
include 'function/semesta/semesta.php';
include 'function/info/info.php';

// $bem = findInfoByIdbem($idbem);

if ($_SESSION['status']=="login"){
$id = $_SESSION['id'];
$item = findLoginById($id);
$rcpt = cetakFaktur($id);
$data = tampilInfo();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>UPH Bisa | Sponsorship For UPH Events</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>  
    
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="home.php"><h2>UPH Bisa <em>Sponsorship</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>

                <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="testimonials.php">Forum</a>
                      <a class="dropdown-item" href="benefits.php">Benefits</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="profil.php">Welcome <?php echo $item['name'];?></a></li>
          </div>
        </div>
      </nav>
    </header>

    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Your Receipt</h4>
              <h2>CHECK OUT</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body"> 
              <a style="margin-left: 97%" type="button" href="home.php"><i class="fa fa-close close"></i></a>
            <!-- Konten Floating -->
            <?php $id_receipt = $_GET['id_receipt'];
                $item = cetakReceipt($id_receipt);
                $metod = $item['metode'];
            ?>
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2 style="color:black;">Payment</h2>
                    </div>
                  </div>
  
                  <div class="col-md-12">
                    <div class="service-item">
                      <span><h3>Invoice ID : <?php $invoice=uniqid(); echo $invoice?> </h3><span>
                    </div>
                    <div class="left-content">
                        <h5 style="text-transform: capitalize"> Receipt #<?php echo $item['judul'];?></h5><br>
                        <span>Nama Event : <?php echo $item['jenis'] . " " . $item['judul'] . " " .  $item['jenis_benefit']?> </span><br>
                        <br><span> Metode : <?php echo $item['metode']?> </span><br>
                        <br><span> Harga : <?php echo $item['harga']?> </span><br>
                        <hr>
                        
                        <br>
                      </div>
                      <?php if($metod=='Transfer'){?>
                        <form action="function/semesta/semestaprs.php" method="POST" enctype='multipart/form-data'>
                          <input type="hidden" name="id_transaksi" value="<?php echo $invoice?>">
                          <input type="hidden" name="total_transaksi" value="<?php echo $item['harga']?>">
                          <input type="hidden" name="id_receipt" value="<?php echo $id_receipt?>">
                          <h5>Please Fill This Form</h5><br>
                          <span>Account Sender Name</span>
                          <input type="text" name="name_trns" class="form-control" required="Please Fill"> 
                          <br><span>Date Transfer</span> 
                          <input type="date" name="tanggal_transaksi" class="form-control" required="Please Fill"> 
                          <br><span>Account Number</span>
                          <input type="text" name="acc_num" class="form-control" required="Please Fill"> 
                          <br><h5>Total: Rp. <?php echo $item['harga']?></h5><br>
                          <br><span>Upload Transfer Invoice</span> 
                          <br>
                          <input class='btn btn-primary' type='file' name='image_trns' accept='.jpg, .png, .jpeg' value="" required="Please Fill">
                          <hr>
                          <input type="submit" class="btn btn-primary launch" name="action" value="SEND">
                        </form>
                      <?php } ?>
                      
                      <?php if ($metod=='Partnership'){?>
                        <form action="function/semesta/semestaprs.php" method="POST" enctype='multipart/form-data'>
                          <input type="hidden" name="id_transaksi" value="<?php echo $invoice?>">
                          <input type="hidden" name="total_transaksi" value="<?php echo $item['harga']?>">
                          <input type="hidden" name="id_receipt" value="<?php echo $id_receipt?>">
                          <h5>Please Fill This Form</h5><br>
                          <span>Responsible Party Name</span>
                          <input type="text" name="name_trns" class="form-control" required="Please Fill"> 
                          <br><span>Pickup Date</span> 
                          <input type="date" name="tanggal_transaksi" class="form-control" required="Please Fill"> 
                          <br><span>Where To Contact</span>
                          <input type="text" name="acc_num" class="form-control" required="Please Fill"> 
                          <hr>
                          <input type="submit" class="btn btn-primary launch" name="action" value="PROCESS">
                        </form>
                      <?php } ?>
                      
                    </div>
                </div>
        </div>
    

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

  <div class="modal fade" id="howto" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body"> 
              <i class="fa fa-close close text-right" href="cart.php"></i>
            <!-- Konten Floating -->
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2 style="color:black;">How to Sponsor</h2>
                    </div>
                  </div>
  
                  <div class="col-md-12">
                    <div class="service-item">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player style="margin-left: 3px;" src="https://assets7.lottiefiles.com/packages/lf20_v33gmcrb.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                      <h5>STEP 1</h5>
                      <p style="margin: 0;"> Choose The Event You Want To Sponsor </p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="service-item">
                      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
                      <lottie-player style="margin-left: 3px;" src="https://lottie.host/2c1ce8ca-3937-4265-9255-03a6b0d819d9/zrlYpBy4uU.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                      <h5>STEP 2</h5>
                      <p style="margin: 0;"> Choose How You Want To Sponsors</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="service-item">
                      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
                      <lottie-player style="margin-left: 3px;" src="https://lottie.host/ec2cc087-96db-46b9-80f4-fb4b7e472875/73kQDlRXNa.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                      <h5>STEP 3</h5  >
                      <p style="margin: 0;">Proceed and Wait For Confirmation</p>
                  </div>
                </div>
                <div class="text-right"> 
                  <Button class="btn btn-primary launch"  data-dismiss="modal">Close</Button> 
                </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</html>

<?php }?>
