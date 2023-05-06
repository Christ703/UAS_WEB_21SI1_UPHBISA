<?php
session_start();
error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/pesan/datapesan.php';

$data = tampilPesan();

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
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-3-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>our clients</h4>
              <h2>forum</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="services section-background">
      <div class="container">
        <div class="row">
          <?php foreach($data as  $row){
            //rev. edit bagian forum
            echo "
            <a class='col-md-4' href='*forum'> 
            <div class='service-item'>
              <div class='icon'>
                <i class='fa fa-user'></i>
              </div>
              <div class='down-content'>
                <h4>".$row['uname']."</h4>
                <p class='n-m'><em>".$row['Subject']."</em></p>
              </div>
            </div>
          </a>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Send us a Message</h2>
              </div>
            </div>
                    <form action="function/pesan/prosespesan.php" method="POST">
                      <div class="col-md-8">
                        <div class="contact-form">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                Jenis Pesan: 
                                <br>
                                <ul>
                                <br>
                                <li><input name="Subject" type="radio" value="Saran"> Saran</li><br>
                                <li><input name="Subject" type="radio" value="Keluhan"> Keluhan</li><br>
                                <li><input name="Subject" type="radio" value="Testimonial"> Testimonial</li><br>
                              </div>
                              <div class="col-lg-12">
                                Silahkan Masukkan Pesan Anda
                                <br><br>
                                <textarea name="msg" rows="6" class="form-control" id="msg" placeholder="Your Message" ></textarea>
                                <script>
                                  ClassicEditor
                                  .create( document.querySelector( '#msg' ) )
                                  .then( editor => {
                                    console.log( editor );
                                  } )
                                  .catch( error => {
                                    console.error( error );
                                  } );
                                  </script>
                              </div>
                                <input type="hidden" name="nama" value="<?php echo $row['uname'];?>">
                                <input type="hidden" name="email" value="<?php echo $row['email'];?>">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <input type="submit" name="action" value="Kirim Pesan" class="btn btn-primary">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item active" href="testimonials.php">Forum</a>
                      <a class="dropdown-item" href="benefits.php">Benefits</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-3-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>our clients</h4>
              <h2>Forum</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="services section-background">
      <div class="container">
        <div class="row">
          <?php foreach($data as  $row){
            //rev. edit bagian forum
            echo "
            <a class='col-md-4' href='*forum'> 
            <div class='service-item'>
              <div class='icon'>
                <i class='fa fa-user'></i>
              </div>
              <div class='down-content'>
                <h4>".$row['uname']."</h4>
                <p class='n-m'><em>".$row['Subject']."</em></p>
              </div>
            </div>
          </a>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Send us a Message</h2>
              </div>
            </div>
                    <form action="function/pesan/prosespesan.php" method="POST">
                      <div class="col-md-8">
                        <div class="contact-form">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                Jenis Pesan: 
                                <br>
                                <ul>
                                <br>
                                <li><input name="Subject" type="radio" value="Saran"> Saran</li><br>
                                <li><input name="Subject" type="radio" value="Keluhan"> Keluhan</li><br>
                                <li><input name="Subject" type="radio" value="Testimonial"> Testimonial</li><br>
                              </div>
                              <div class="col-lg-12">
                                Silahkan Masukkan Pesan Anda
                                <br><br>
                                <textarea name="msg" rows="6" class="form-control" id="msg" placeholder="Your Message" ></textarea>
                                <script>
                                  ClassicEditor
                                  .create( document.querySelector( '#msg' ) )
                                  .then( editor => {
                                    console.log( editor );
                                  } )
                                  .catch( error => {
                                    console.error( error );
                                  } );
                                  </script>
                              </div>
                                <input type="hidden" name="nama" value="<?php echo $row['uname'];?>">
                                <input type="hidden" name="email" value="<?php echo $row['email'];?>">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <input type="submit" name="action" value="Kirim Pesan" class="btn btn-primary">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
