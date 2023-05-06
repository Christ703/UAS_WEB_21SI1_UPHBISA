<?php
session_start();
// error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/pesan/datapesan.php';
include 'function/about/dataabout.php';
include 'function/semesta/semesta.php';
include 'function/info/info.php';

if ($_SESSION['status']=="login") {
$id = $_SESSION['id'];
$rcpt = cetakFaktur($id);
$row = findLoginById($id);
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
                <li class="nav-item"><a class="nav-link" href="profil.php">Welcome <?php echo $row['name'];?></a></li>
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
              <h2>CART</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?php echo $row['name']?> Cart</h2>
            </div>
          </div>
        <?php foreach ($rcpt as $row) {?>
          <div class="col-md-4">
            <div class="right-image">
                        <div class='col-md-12'>
                            <div class='product-item col-md-10'>
                                <a href='event-details.php?id=<?php echo $row['id_info'];?>'><img src='upload/<?php echo $row['images'];?>' alt=''></a>
                                <div class='down-content'>
                                    <a href='event-details.php?id=<?php echo " ".$row['id_info'];?>'><h4><?php echo $row['judul']?></h4></a>

                                    <h6><?php echo $row['orgn'];?></h6>

                                    <h4><small><i class='fa fa-briefcase'></i><?php echo " ".$row['jenis'];?><br> 

                                    <strong><i class='fa fa-building'></i><?php echo " ".$row['lokasi'];?></strong></small></h4>
                                    <small>
                                        <strong title='Posted on'><i class='fa fa-calendar'></i><?php echo" ".$row['tanggal'];?></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="left-content">
                <h2 style="text-transform: capitalize"><?php echo $row['jenis'] . " " . $row['judul'] . " " .  $row['jenis_benefit']?></h2>
                <br>
                <span> Organizer : <?php echo " " . $row['orgn'];?></span><br><br>
                <span> Deskripsi : <?php echo " " . $row['acara_detail'];?></span>
                <span> Event Date : <?php echo " " . $row['tanggal'];?></span> <br> <br>
                <span> Metode : <?php echo " " . $row['metode'];?></span> <br> <br>
                <span> Biaya : Rp. <?php echo " " . $row['harga'];?></span> <br><br>
                <a class="btn btn-primary launch"  href="checkout.php?id_receipt=<?php echo $row['id_receipt']?>" >Check Out</a>
              </div>
            </div>
            <?php };
        if ($rcpt==NULL) {
          echo "<h5 style='margin-left: 35%; text-transform: capitalize'>there are no items in the cart</h5>";
        };
        ?>
        </div>
      </div>
    </div>
    <!-- Pending -->
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Your Receipt On Progress</h2>
            </div>
          </div>
        <?php $pdg=cetakFakturPending($id);foreach ($pdg as $row) {?>
          <div class="col-md-4">
            <div class="right-image">
                        <div class='col-md-12'>
                            <div class='product-item col-md-10'>
                                <a href='event-details.php?id=<?php echo $row['id_info'];?>'><img src='upload/<?php echo $row['images'];?>' alt=''></a>
                                <div class='down-content'>
                                    <a href='event-details.php?id=<?php echo " ".$row['id_info'];?>'><h4><?php echo $row['judul']?></h4></a>

                                    <h6><?php echo $row['orgn'];?></h6>

                                    <h4><small><i class='fa fa-briefcase'></i><?php echo " ".$row['jenis'];?><br> 

                                    <strong><i class='fa fa-building'></i><?php echo " ".$row['lokasi'];?></strong></small></h4>
                                    <small>
                                      <strong title='Posted on'><i class='fa fa-calendar'></i><?php echo" ".$row['tanggal'];?></strong>
                                    </small>
                                </div>
                            </div>
                          </div>
                        </div>
        </div>
        <div class="col-md-7">
            <div class="left-content">
              <h2 style="text-transform: capitalize"><?php echo $row['jenis'] . " " . $row['judul'] . " " .  $row['jenis_benefit']?></h2>
              <br>
                <span> Organizer : <?php echo " " . $row['orgn'];?></span><br><br>
                <span> Deskripsi : <?php echo " " . $row['acara_detail'];?></span>
                <span> Event Date : <?php echo " " . $row['tanggal'];?></span> <br> <br>
                <span> Metode : <?php echo " " . $row['metode'];?></span> <br> <br>
                <span> Biaya : Rp. <?php echo " " . $row['harga'];?></span> <br><br>
                <span> Status : <?php echo " " . $row['status'];?></span> <br><br>
              </div>
            </div>
            <?php };
        if ($pdg==NULL) {
          echo "<h5 style='margin-left: 35%; text-transform: capitalize'>no transactions are in progress</h5>";
        };
        ?>
        </div>
      </div>
    </div>
    <!-- Accpt -->
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Approved Receipt</h2>
            </div>
          </div>
        <?php $acpt=cetakFakturAppr($id);foreach ($acpt as $row) {?>
          <div class="col-md-4">
            <div class="right-image">
                        <div class='col-md-12'>
                            <div class='product-item col-md-10'>
                                <a href='event-details.php?id=<?php echo $row['id_info'];?>'><img src='upload/<?php echo $row['images'];?>' alt=''></a>
                                <div class='down-content'>
                                    <a href='event-details.php?id=<?php echo " ".$row['id_info'];?>'><h4><?php echo $row['judul']?></h4></a>

                                    <h6><?php echo $row['orgn'];?></h6>

                                    <h4><small><i class='fa fa-briefcase'></i><?php echo " ".$row['jenis'];?><br> 

                                    <strong><i class='fa fa-building'></i><?php echo " ".$row['lokasi'];?></strong></small></h4>
                                    <small>
                                        <strong title='Posted on'><i class='fa fa-calendar'></i><?php echo" ".$row['tanggal'];?></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="left-content">
                <h2 style="text-transform: capitalize"><?php echo $row['jenis'] . " " . $row['judul'] . " " .  $row['jenis_benefit']?></h2>
                <br>
                <span> Organizer : <?php echo " " . $row['orgn'];?></span><br><br>
                <span> Deskripsi : <?php echo " " . $row['acara_detail'];?></span>
                <span> Event Date : <?php echo " " . $row['tanggal'];?></span> <br> <br>
                <span> Metode : <?php echo " " . $row['metode'];?></span> <br> <br>
                <span> Biaya : Rp. <?php echo " " . $row['harga'];?></span> <br><br>
                <span> Status : <?php echo " " . $row['status'];?></span> <br><br>
            </div>
        </div>
        <?php };
        if ($acpt==NULL) {
          echo "<h5 style='margin-left: 35%; text-transform: capitalize'>You Have No Approved Transactions</h5>";
        };
        ?>
        </div>
      </div>
    </div>
    <!-- Rejected -->
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Rejected Receipt</h2>
            </div>
          </div>
        <?php $rjt=cetakFaktuRjt($id);foreach ($rjt as $row) {?>
          <div class="col-md-4">
            <div class="right-image">
                        <div class='col-md-12'>
                            <div class='product-item col-md-10'>
                                <a href='event-details.php?id=<?php echo $row['id_info'];?>'><img src='upload/<?php echo $row['images'];?>' alt=''></a>
                                <div class='down-content'>
                                    <a href='event-details.php?id=<?php echo " ".$row['id_info'];?>'><h4><?php echo $row['judul']?></h4></a>

                                    <h6><?php echo $row['orgn'];?></h6>

                                    <h4><small><i class='fa fa-briefcase'></i><?php echo " ".$row['jenis'];?><br> 

                                    <strong><i class='fa fa-building'></i><?php echo " ".$row['lokasi'];?></strong></small></h4>
                                    <small>
                                        <strong title='Posted on'><i class='fa fa-calendar'></i><?php echo" ".$row['tanggal'];?></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="left-content">
                <h2 style="text-transform: capitalize"><?php echo $row['jenis'] . " " . $row['judul'] . " " .  $row['jenis_benefit']?></h2>
                <br>
                <span> Organizer : <?php echo " " . $row['orgn'];?></span><br><br>
                <span> Deskripsi : <?php echo " " . $row['acara_detail'];?></span>
                <span> Event Date : <?php echo " " . $row['tanggal'];?></span> <br> <br>
                <span> Metode : <?php echo " " . $row['metode'];?></span> <br> <br>
                <span> Biaya : Rp. <?php echo " " . $row['harga'];?></span> <br><br>
                <span> Status : <?php echo " " . $row['status'];?></span> <br><br>
            </div>
        </div>
        <?php };
        if ($rjt==NULL) {
          echo "<h5 style='margin-left: 35%; text-transform: capitalize'>You Have no Declined Transactions</h5>";
        };
        ?>
        </div>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 UPH Bisa</p></div>
          </div>
        </div>
      </div>
    </footer>





    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

  <div class="modal fade" id="howto" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body"> 
              <i class="fa fa-close close text-right" data-dismiss="modal"></i><a class="nav"> 
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

<?php } 
else {?>
  
  <!DOCTYPE html>
  <html lang="en">
  
    <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="assets/images/favicon.ico">
  
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
                  
                  <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="signup.php">SignUp</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
  
  
    </body>

    
      
  
      

      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner-content">
                <p>Copyright © 2020 UPH Bisa</p>
                <button style="position:fixed;
                width:180px;
	              height:60px;
	              bottom:40px;
	              right:40px;" 
                type="button" 
                class="btn btn-primary launch" 
                data-toggle="modal" 
                data-target="#howto"> 
                <i class="fa fa-rocket"></i> How To Sponsor</button>
              </div>
            </div>
          </div>


        </div>
      </footer>
  
      <div class="modal fade" id="howto" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
        <div class="modal-dialog"> 
          <div class="modal-content"> 
            <div class="modal-body"> 
                <i class="fa fa-close close text-right" data-dismiss="modal"></i><a class="nav"> 
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
  
  
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  
      <script src="assets/js/custom.js"></script>
      <script src="assets/js/owl.js"></script>
    </body>


  </html>  
<?php 
} ?>
