<?php
session_start();
error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/info/info.php';

$data = tampilInfo();

if ($_SESSION['status']=="login") {
$id = $_SESSION['id'];
$row = findLoginById($id);
?>

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
                <li class="nav-item active">
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
                <li class="nav-item"><a class="nav-link"a href="profil.php">Welcome <?php echo $row['name'];?></a></li>
                
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Advertise Your Brands!</h4>
            <h2>Explore Countless Events For Your Needs</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Professional Events</h4>
            <h2>Top Quality Events Organized by Students</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Lots of Benefits</h4>
            <h2>Pick the Best Plans for Your Neeeds</h2>
          </div>
        </div>
      </div>
    </div>

    <?php
          echo "
          <div class='latest-products'>
            <div class='container'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='section-heading'>
                    <h2>Featured Events</h2>
                  </div>
                </div>";
                foreach ($data as  $row) {
                  echo "
                <div class='col-md-4'>
                  <div class='product-item'>
                    <a href='event-details.php?id=".$row['id_info']."'><img src='upload/".$row['images']."' alt=''></a>
                      <div class='down-content'>
                        <a href='event-details.php?id=".$row['id_info']."'><h4> ".$row['judul']."</h4></a>

                          <h6>".$row['orgn']."</h6>

                          <h4><small><i class='fa fa-briefcase'></i> ".$row['jenis']. "<br> 

                          <strong><i class='fa fa-building'></i> ".$row['lokasi']. "</strong></small></h4>
                          <small>
                            <strong title='Posted on'><i class='fa fa-calendar'></i> ".$row['tanggal']." </strong> &nbsp;&nbsp;&nbsp;&nbsp;
                          </small>
                      </div>
                  </div>
                </div>
            ";}
            echo "
              </div>
            </div>
          </div>";
          ?>


    <div class="services" style="background-image: url(assets/images/image\ BG\ 4.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Event Posts</h2>

              <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php $lm = tampilInfoLampau();
          foreach ($lm as  $row) {?>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="upload/<?php echo $row['images']?>" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#"><?php echo $row['judul']?></a></h4>

                <p style="margin: 0;"> <?php echo $row['orgn']?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row['tanggal']?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row['jenis']?></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Teams</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jason Sutanto</h4>
                  <p class="n-m"><em>"The best advertisement ever made!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Wilbert Wisely</h4>
                  <p class="n-m"><em>"Absolutely amazing!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Christoper Alexander Chai</h4>
                  <p class="n-m"><em>"Definitely worth investing!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Gilbert Januar Simwin</h4>
                  <p class="n-m"><em>"Worth every pennies"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Samuel Zakaria</h4>
                  <p class="n-m"><em>"I have never seen such professional conducts of events"</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    
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
	              left:40px;" 
                type="button" 
                class="btn btn-primary launch" 
                data-toggle="modal" 
                data-target="#howto"> 
                <i class="fa fa-rocket"></i> How To Sponsor</button>
                <a href="cart.php"><button style="position:fixed;
                width:180px;
	              height:60px;
	              bottom:40px;
	              right:40px;" 
                type="button" 
                class="btn btn-primary launch" 
                >Cart</button></a>
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
                <li class="nav-item active">
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

    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Advertise Your Brands!</h4>
            <h2>Explore Countless Events For Your Needs</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Professional Events</h4>
            <h2>Top Quality Events Organized by Students</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Lots of Benefits</h4>
            <h2>Pick the Best Plans for Your Neeeds</h2>
          </div>
        </div>
      </div>
    </div>

    
          <?php
          echo "
          <div class='latest-products'>
            <div class='container'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='section-heading'>
                    <h2>Featured Events</h2>
                  </div>
                </div>";
                foreach ($data as  $row) {
                  echo "
                <div class='col-md-4'>
                  <div class='product-item'>
                    <a href='event-details.php'><img src='upload/".$row['images']."' alt=''></a>
                      <div class='down-content'>
                        <a href='event-details.php'><h4> ".$row['judul']."</h4></a>

                          <h6>".$row['orgn']."</h6>

                          <h4><small><i class='fa fa-briefcase'></i> ".$row['jenis']. "<br> 

                          <strong><i class='fa fa-building'></i> ".$row['lokasi']. "</strong></small></h4>
                          <small>
                            <strong title='Posted on'><i class='fa fa-calendar'></i> ".$row['tanggal']." </strong> &nbsp;&nbsp;&nbsp;&nbsp;
                          </small>
                      </div>
                  </div>
                </div>
            ";}
            echo "
              </div>
            </div>
          </div>";
          ?>
        

    <div class="services" style="background-image: url(assets/images/image\ BG\ 4.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Event Posts</h2>

              <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php $lm = tampilInfoLampau();
          foreach ($lm as  $row) {?>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="upload/<?php echo $row['images']?>" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4><a href="#"><?php echo $row['judul']?></a></h4>

                <p style="margin: 0;"> <?php echo $row['orgn']?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row['tanggal']?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row['jenis']?></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Teams</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jason Sutanto</h4>
                  <p class="n-m"><em>"The best advertisement ever made!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Wilbert Wisely</h4>
                  <p class="n-m"><em>"Absolutely amazing!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Christoper Alexander Chai</h4>
                  <p class="n-m"><em>"Definitely worth investing!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Gilbert Januar Simwin</h4>
                  <p class="n-m"><em>"Worth every pennies"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Samuel Zakaria</h4>
                  <p class="n-m"><em>"I have never seen such professional conducts of events"</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
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
	              left:40px;" 
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