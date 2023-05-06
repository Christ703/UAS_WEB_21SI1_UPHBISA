<?php
session_start();
// error_reporting(0);
include 'config.php';
include '../function/login/datalogin.php';
include '../function/pesan/datapesan.php';
include '../function/about/dataabout.php';
include '../function/semesta/semesta.php';
include '../function/info/info.php';

// $bem = findInfoByIdbem($idbem);

if ($_SESSION['status']=="login") {
$id = $_SESSION['id'];
$item = findLoginById($id);
$rcpt = cetakFaktur($id);
$data = tampilInfo();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="../assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>UPH Bisa | Sponsorship For UPH Events</title>


    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #97020c;
  transition: all 0.5s ease;
}
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: #081D45;
}
.sidebar .nav-links li a:hover{
  background: #081D45;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}
.sidebar .nav-links li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i{
  font-size: 25px;
  color: #333;
}
.home-section .home-content{
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: #C0F2D8;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales{
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li{
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.sales-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover{
  background:  #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales{
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 600px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
  @media (max-width: 400px) {
  .sidebar{
    width: 0;
  }
  .sidebar.active{
    width: 60px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 60px;
    width: calc(100% - 60px);
  }
}

    </style>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">UPH Bisa</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="dash-admin.php" >
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="events-admin.php">
          <i class='bx bx-box' ></i>
          <span class="links_name">Events</span>
        </a>
      </li>
      <li>
        <a href="benefits-admin.php">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Benefits</span>
        </a>
      </li>
      <li>
        <a href="about-admin.php">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">About Us</span>
        </a>
      </li>
      <li>
        <a href="forum-admin.php">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Forum</span>
        </a>
      </li>
      <li>
        <a href="new-admin.php">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">New Admin</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
   
   <section class="home-section">

    <div class="page-heading about-heading header-text" style="background-image: url(../assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
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
            <?php $id_transaksi = $_GET['id'];
                $item = cetakNDApprBYid_trs($id_transaksi);
            ?>
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2 style="color:black;">Need Attention</h2>
                    </div>
                  </div>
  
                  <div class="col-md-12">
                    <div class="service-item">
                      <span style="text-transform: capitalize;"><?php echo $item['judul'] . " " . $item['judul'] . " " .  $item['jenis_benefit']?> </span><br><br>
                      <span><h4>Invoice ID : <?php echo $item['id_transaksi']?> </h4><span>
                        </div>
                        <div class="left-content">
                          <?php if ($item['metode']=="Transfer") {?>
                            <span style="left-text"> Cost : <?php echo $item['harga']?> </span><br>
                            <br><span style="left-text"> Metode : <?php echo $item['metode']?> </span><br>
                            <br><span style="left-text"> Bank Account Name : <?php echo $item['name_trns']?> </span><br>
                            <br><span style="left-text"> Bank Account Number : <?php echo $item['acc_num']?> </span><br>
                          <?php } ?>
                          <?php if ($item['metode']=="Partnership") {?>
                            <span style="left-text"> Cost : <?php echo $item['harga']?> </span><br>
                            <br><span style="left-text"> Metode : <?php echo $item['metode']?> </span><br>
                            <br><span style="left-text"> Sakeholder Name : <?php echo $item['name_trns']?> </span><br>
                            <br><span style="left-text"> Contact : <?php echo $item['acc_num']?> </span><br>
                          <?php } ?>
                          
                        </div>
                    <hr>
                    <?php if ($item['metode']=="Transfer") {?>
                      <div class="left-content">
                        <br><span>Transfer Invoice : </span> <br> <br>
                          <div>
                            <img style="padding-left: 70px"src="../upload/<?php echo $item['image_trns']?>"  alt="" class="img-fluid wc-image">
                            <hr>
                          </div>
                    <?php } ?>
                        <div class="sales-boxes">
                          <div class="top-sales box">
                            <form action="dcs.php" method="POST">
                              <input type="hidden" name="id_transaksi" value="<?php echo $item['id_transaksi']?>">
                              <input type="hidden" name="id_receipt" value="<?php echo $item['id_receipt']?>">
                              <input style="margin-left: 40px; width: 100px" class="btn btn-primary" type="submit" name="action" value="Approve">
                              <input style="margin-left: 40px; width: 100px" class="btn btn-primary" type="submit" name="action" value="Reject">
                              <input style="margin-left: 40px; width: 100px" class="btn btn-primary" type="submit" name="action" value="Pending">
                            </form>
                            <!-- <a href='dcs.php?id=<?php echo $item['id_transaksi']?>?action=Approve'><button style="margin-left: 40px" class='btn'>Approve</a></button>
                            <a href='dcs.php?id=<?php echo $item['id_transaksi']?>?action=Reject'><button style="margin-left: 40px" class='btn'>Reject</a></button>
                            <a href='dcs.php?id=<?php echo $item['id_transaksi']?>?action=Pending'><button style="margin-left: 40px" class='btn'>Pending</a></button> -->
                          </div>                          
                        </div>
                        
                        <br>
                    </div>
                      
                  </div>
                </div>
        </div>
    

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
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

<?php } 
else {?>
  
  <!DOCTYPE html>
  <html lang="en">
  
    <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../assets/images/favicon.ico">
  
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  
      <title>UPH Bisa | Sponsorship For UPH Events</title>
  
  
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  
      <link rel="stylesheet" href="../assets/css/fontawesome.css">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link rel="stylesheet" href="../assets/css/owl.css">
  
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
  
      
  
  
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  
      <script src="../assets/js/custom.js"></script>
      <script src="../assets/js/owl.js"></script>
    </body>


  </html>  
<?php 
} ?>

