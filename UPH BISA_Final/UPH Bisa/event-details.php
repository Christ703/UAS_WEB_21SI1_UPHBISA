<?php
session_start();
error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/info/info.php';
include 'function/receipt/datareceipt.php';

$id_info = $_GET['id'];
$info = findInfoById($id_info);
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

                <li class="nav-item active"><a class="nav-link" href="event.php">Events</a></li>

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


    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4><?php echo $info['orgn']?></h4>

              <h2><?php echo $info['judul']?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-8">
              <p class="lead">
                   <i class="fa fa-map-marker"></i> <?php echo $info['lokasi']?> &nbsp;&nbsp;
                   <i class="fa fa-calendar"></i> <?php echo $info['tanggal']?> &nbsp;&nbsp;
              </p>

              <br>
              <br>
              
              <div class="form-group">
                <h5><?php echo $info['judul']?></h5>
              </div>

              <p><?php echo $info['acara_detail']?></p>  <br> 

              Jenis Event :<p><?php echo $info['jenis']?></p> <br> <hr>
              <h3>Cost </h3><br>
              Gold :<span> Rp. <?php echo $info['harga_gold']?></span><br><br>
              Silver :<span> Rp. <?php echo $info['harga_silver']?></span><br><br>
              Bronze :<span> Rp. <?php echo $info['harga_bronze']?></span><br><br>
              <hr><h3>PartnerShip </h3><br>
              Gold Partnership
              <p><?php echo $info['ship_gold']?></p>

              <br>Silver Partnership
              <p><?php echo $info['ship_silver']?></p>

              <br>Bronze Partnership
              <p><?php echo $info['ship_bronze']?></p>
              <br>
              <br>
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="contact-form">
              <div class="form-group">
                <button type="button" 
                class="filled-button btn-block" 
                data-toggle="modal" 
                data-target="#sponsor">Sponsor for this event</button>
              </div>
            </div>

            <div>
              <img src="upload/<?php echo $info['images']?>"  alt="" class="img-fluid wc-image">
            </div>

            <br>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="sponsor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body"> 
            <div class="text-right"> 
              <i class="fa fa-close close" data-dismiss="modal"></i> 
            </div> 
            <div class="tabs mt-3"> 
              Choose Method
              <ul class="nav nav-tabs" id="myTab" role="tablist"> 
                <li class="nav-item" role="presentation"> 
                  <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                    <img src="assets/images/transfer.png" width="50" height="50"> 
                  </a> 
                </li> 
                <li class="nav-item" role="presentation"> 
                      <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> 
                    <img src="assets/images/products.png" width="50" height="50"> 
                  </a> 
                </li> 
              </ul> 
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                        <form action="function/receipt/prosesreceipt.php" method="POST">
                        <div class="mt-4 mx-4">
                          <div class="text-center"> 
                            <h5>Bank Transfer</h5> 
                          </div> 
                          <div class="form mt-3"> 
                            <div class="inputbox"> 
                              <span>Event Name</span>
                              <h5><?php echo $info['judul'];?></h5>
                              <br>
                            </div>
                            <div class="inputbox"> 
                              <span>Benefit Type</span>
                              <select class='form-control' name="jenis_benefit" id="benefit">
                                <option value="gold">Gold</option>
                                <option value="silver">Silver</option>
                                <option value="bronze">Bronze</option>
                              </select>
                              <br>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                            <input type="hidden" name="id_info" value="<?php echo $_GET ['id'];?>">
                            <input type="hidden" name="id_receipt" value="<?php echo uniqid();?>">
                            <input type="hidden" name="metode" value="Transfer">
                            <button class="btn btn-success btn-block" type="submit" name="action" value="Add">Make Receipt</button>
                            <!-- <input type="submit" name="action" value="Update" class="btn btn-primary"> -->
                            <br>
                          </div>
                        </form>
                        </div>
                      </div>
                    <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab"> 
                      <div class="mt-4 mx-4">
                          <form action="function/receipt/prosesreceipt.php" method="POST">
                          <div class="text-center"> 
                            <h5>Sponsorship</h5> 
                          </div> 
                          <div class="form mt-3"> 
                            <div class="inputbox"> 
                              <span>Event Name</span>
                              <h5><?php echo $info['judul'];?></h5>
                              <br>
                            </div>
                        <div class="inputbox"> 
                          <span>Benefit Type</span>
                          <select class='form-control' name="jenis_benefit" id="benefit">
                            <option value="gold">Gold</option>
                            <option value="silver">Silver</option>
                            <option value="bronze">Bronze</option>
                          </select>
                          <br>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                        <input type="hidden" name="id_info" value="<?php echo $_GET ['id'];?>">
                        <input type="hidden" name="id_receipt" value="<?php echo uniqid();?>">
                        <input type="hidden" name="metode" value="Partnership">
                        <button class="btn btn-success btn-block" type="submit" name="action" value="Add">Make Receipt</button>
                      </div>
                    </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="section-heading">
              <h2>About <?php echo $info['orgn']?></h2>
            </div>

            <p class="lead">
                   <i class="fa fa-map-marker"></i> <?php echo $info['lokasi']?>
              </p>

            <p><?php echo $info['deskripsi']?></p>
            <br>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
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

                <li class="nav-item active"><a class="nav-link" href="event.php">Events</a></li>

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


    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Maaf</h4>

              <h2>Silahkan Login <br>Terlebih Dahulu UNTUK MEMBACA LEBIH LANJUT</h2>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
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

<?php } ?>