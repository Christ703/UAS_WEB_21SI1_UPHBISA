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
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>

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
              <h4>Upcoming and On-going</h4>
              <h2>Events</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
          <section class="py-5 my-5">
        <div class="container">
          <h1 class="mb-5"></h1>
          <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
              <div class="p-5">
                <div class="img-circle text-center mb-3">
                <h4 class="text-center">Filter</h4>
                </div>
              </div>
<!-- Navigasi -->
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="account-tab" data-toggle="pill" href="#recent" role="tab" aria-controls="recent" aria-selected="true">
                  Recent Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#fnsh" role="tab" aria-controls="fnsh" aria-selected="false">
                  Old Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="false">
                  All Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#bem" role="tab" aria-controls="bem" aria-selected="false">
                  BEM
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#sgs" role="tab" aria-controls="sgs" aria-selected="false">
                  SGS
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#aou" role="tab" aria-controls="aou" aria-selected="false">
                  AOU
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpsa" role="tab" aria-controls="hmpsa" aria-selected="false">
                  HMPSA
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpsm" role="tab" aria-controls="hmpsm" aria-selected="false">
                  HMPSM
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpssi" role="tab" aria-controls="hmpssi" aria-selected="false">
                  HMPSSI
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpstif" role="tab" aria-controls="hmpstif" aria-selected="false">
                  HMPSTIF
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#seminar" role="tab" aria-controls="seminar" aria-selected="false">
                  Seminar
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#tkshow" role="tab" aria-controls="tkshow" aria-selected="false">
                  TalkShow
                </a>
                </div>
              </div>
              <!-- Recent Avail -->
              <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                  Recent Event & Still Avail
                  <?php
                  echo "
                  <div class='col-md-9'>
                  
                  <div class='row'>
                  ";
                  foreach ($data as  $row) {
                    echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
                    <!-- All -->
                                  <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    Recent Event & Still Avail
                                    <?php
                                      echo "
                                      <div class='col-md-9'>
                    
                                          <div class='row'>
                                            "; $all = infoAll();
                                            foreach ($all as  $row) {
                                              echo "
                                            <div class='col-md-6'>
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
                    
                                      </div>";
                                    ?>
                                    </div>
<!-- Finish -->
                <div class="tab-pane fade" id="fnsh" role="tabpanel" aria-labelledby="fnsh-tab">
                Already Finish Event <br><br>
                <?php $fnsh = tampilInfoLampau();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($fnsh as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- BEM -->
                <div class="tab-pane fade" id="bem" role="tabpanel" aria-labelledby="bem-tab">
                Organized by BEM<br><br>
                <?php $bem = tampilInfoBEM();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($bem as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- SGS -->
                <div class="tab-pane fade" id="sgs" role="tabpanel" aria-labelledby="sgs-tab">
                Organized by SGS<br><br>
                <?php $sgs = tampilInfoSGS();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($sgs as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- AOU -->
                <div class="tab-pane fade" id="aou" role="tabpanel" aria-labelledby="aou-tab">
                Organized by AOU<br><br>
                <?php $aou = tampilInfoAOU();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($aou as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpsa -->
                <div class="tab-pane fade" id="hmpsa" role="tabpanel" aria-labelledby="hmpsa-tab">
                Organized by HMPSA<br><br>
                <?php $hmpsa = tampilInfoHMPSA();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpsa as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpsm -->
                <div class="tab-pane fade" id="hmpsm" role="tabpanel" aria-labelledby="hmpsm-tab">
                Organized by HMPSM<br><br>
                <?php $hmpsm = tampilInfoHMPSM();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpsm as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!--  hmpssi-->
                <div class="tab-pane fade" id="hmpssi" role="tabpanel" aria-labelledby="hmpssi-tab">
                Organized by HMPSSI<br><br>
                <?php $hmpssi = tampilInfoHMPSSI();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpssi as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpstif -->
                <div class="tab-pane fade" id="hmpstif" role="tabpanel" aria-labelledby="hmstif-tab">
                Organized by HMPSTIF<br><br>
                <?php $hmpstif = tampilInfoHMPSTIF();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpstif as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- seminar -->
                <div class="tab-pane fade" id="seminar" role="tabpanel" aria-labelledby="seminar-tab">
                Seminar Event<br><br>
                <?php $seminar = tampilInfoSeminar();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($seminar as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- tkshow -->
                <div class="tab-pane fade" id="tkshow" role="tabpanel" aria-labelledby="tkshow-tab">
                Talk Show Event<br><br>
                <?php $tkshow = tampilInfoTalkshow();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($tkshow as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>

              </div>
          </div>
        </div>

      </section>
          
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
                <i class="fa fa-rocket"></i>How To Sponsor
              </button>
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
              <h4>Upcoming and On-going</h4>
              <h2>Events</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="py-5 my-5">
        <div class="container">
          <h1 class="mb-5"></h1>
          <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
              <div class="p-5">
                <div class="img-circle text-center mb-3">
                <h4 class="text-center">Filter</h4>
                </div>
              </div>
<!-- Navigasi -->
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="account-tab" data-toggle="pill" href="#recent" role="tab" aria-controls="recent" aria-selected="true">
                  Recent Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#fnsh" role="tab" aria-controls="fnsh" aria-selected="false">
                  Old Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="false">
                  All Event
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#bem" role="tab" aria-controls="bem" aria-selected="false">
                  BEM
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#sgs" role="tab" aria-controls="sgs" aria-selected="false">
                  SGS
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#aou" role="tab" aria-controls="aou" aria-selected="false">
                  AOU
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpsa" role="tab" aria-controls="hmpsa" aria-selected="false">
                  HMPSA
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpsm" role="tab" aria-controls="hmpsm" aria-selected="false">
                  HMPSM
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpssi" role="tab" aria-controls="hmpssi" aria-selected="false">
                  HMPSSI
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#hmpstif" role="tab" aria-controls="hmpstif" aria-selected="false">
                  HMPSTIF
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#seminar" role="tab" aria-controls="seminar" aria-selected="false">
                  Seminar
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#tkshow" role="tab" aria-controls="tkshow" aria-selected="false">
                  TalkShow
                </a>
                </div>
              </div>
              <!-- Recent Avail -->
              <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                  Recent Event & Still Avail
                  <?php
                  echo "
                  <div class='col-md-9'>
                  
                  <div class='row'>
                  ";
                  foreach ($data as  $row) {
                    echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
                    <!-- All -->
                                  <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    Recent Event & Still Avail
                                    <?php
                                      echo "
                                      <div class='col-md-9'>
                    
                                          <div class='row'>
                                            "; $all = infoAll();
                                            foreach ($all as  $row) {
                                              echo "
                                            <div class='col-md-6'>
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
                    
                                      </div>";
                                    ?>
                                    </div>
<!-- Finish -->
                <div class="tab-pane fade" id="fnsh" role="tabpanel" aria-labelledby="fnsh-tab">
                Already Finish Event <br><br>
                <?php $fnsh = tampilInfoLampau();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($fnsh as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- BEM -->
                <div class="tab-pane fade" id="bem" role="tabpanel" aria-labelledby="bem-tab">
                Organized by BEM<br><br>
                <?php $bem = tampilInfoBEM();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($bem as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- SGS -->
                <div class="tab-pane fade" id="sgs" role="tabpanel" aria-labelledby="sgs-tab">
                Organized by SGS<br><br>
                <?php $sgs = tampilInfoSGS();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($sgs as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- AOU -->
                <div class="tab-pane fade" id="aou" role="tabpanel" aria-labelledby="aou-tab">
                Organized by AOU<br><br>
                <?php $aou = tampilInfoAOU();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($aou as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpsa -->
                <div class="tab-pane fade" id="hmpsa" role="tabpanel" aria-labelledby="hmpsa-tab">
                Organized by HMPSA<br><br>
                <?php $hmpsa = tampilInfoHMPSA();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpsa as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpsm -->
                <div class="tab-pane fade" id="hmpsm" role="tabpanel" aria-labelledby="hmpsm-tab">
                Organized by HMPSM<br><br>
                <?php $hmpsm = tampilInfoHMPSM();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpsm as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!--  hmpssi-->
                <div class="tab-pane fade" id="hmpssi" role="tabpanel" aria-labelledby="hmpssi-tab">
                Organized by HMPSSI<br><br>
                <?php $hmpssi = tampilInfoHMPSSI();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpssi as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- hmpstif -->
                <div class="tab-pane fade" id="hmpstif" role="tabpanel" aria-labelledby="hmstif-tab">
                Organized by HMPSTIF<br><br>
                <?php $hmpstif = tampilInfoHMPSTIF();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($hmpstif as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- seminar -->
                <div class="tab-pane fade" id="seminar" role="tabpanel" aria-labelledby="seminar-tab">
                Seminar Event<br><br>
                <?php $seminar = tampilInfoSeminar();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($seminar as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>
<!-- tkshow -->
                <div class="tab-pane fade" id="tkshow" role="tabpanel" aria-labelledby="tkshow-tab">
                Talk Show Event<br><br>
                <?php $tkshow = tampilInfoTalkshow();
                  echo "
                  <div class='col-md-9'>

                      <div class='row'>
                        ";
                        foreach ($tkshow as  $row) {
                          echo "
                        <div class='col-md-6'>
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

                  </div>";
                ?>
                </div>

              </div>
          </div>
        </div>

      </section>

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
