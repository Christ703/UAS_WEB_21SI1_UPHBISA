<?php

session_start();
error_reporting(0);

include 'config.php';
include '../function/login/datalogin.php';
include '../function/info/info.php';

if ($_SESSION['status']=="login") {
$id = $_SESSION['id'];
$row = findLoginById($id);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="../assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>UPH Bisa | Sponsorship For UPH Events</title>


    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
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
        <a href="events-admin.php" class="active">
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
              <h4>Events</h4>
              <h2><?php echo $info['judul'];?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action='../function/info/proses_info.php' method='POST' enctype='multipart/form-data'>
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <div class="section-heading">
              <h2>Edit Detail Event <?php echo $info['judul']?></h2>
            </div>
            <p class="lead">
            
                    <h5>Judul Event:</h5>
                    <input class='form-control col-md-5' type='text' name='judul' value="<?php echo $info['judul'];?>"> &nbsp;&nbsp;
                    <br>
                    <h5>Detail Acara: </h5> 
                    <textarea id="acara_detail" type='text' name='acara_detail' ><?php echo $info['acara_detail'];?></textarea>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '#acara_detail' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
                    <br>
                    <h5>Lokasi: </h5>  <input class='form-control col-md-5' type='text' name='lokasi' value="<?php echo $info['lokasi'];?>"> 
                    <br>
                    <h5>Tanggal: </h5>  <input class='form-control col-md-5' type='date' name='tanggal' value="<?php echo $info['tanggal'];?>"> 
                    <br>
                    <h5>Jenis Event: </h5>
                    <input class='form-control col-md-5' type='text' name='jenis' value="<?php echo $info['jenis'];?>"> 
                    <hr>
                    <h2>Harga</h2>
                    <br>  
                    <h5>Gold</h5>
                    <input class='form-control col-md-5' type='text' name='harga_gold' value="<?php echo $info['harga_gold'];?>"> 
                    <br><h5>Silver</h5>
                    <input class='form-control col-md-5' type='text' name='harga_silver' value="<?php echo $info['harga_silver'];?>"> 
                    <br><h5>Bronze</h5>
                    <input class='form-control col-md-5' type='text' name='harga_bronze' value="<?php echo $info['harga_bronze'];?>"> 
                    <br>  
                    <hr>
                    <h3>PartnerShip </h3><br>
                    Gold Partnership
                    <textarea id="ship_gold" class='form-control col-md-5' type='text' name='ship_gold'> <?php echo $info['ship_gold'];?> </textarea><br>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '#ship_gold' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                    </script>
                    Silver Partnership
                    <textarea id="ship_silver" class='form-control col-md-5' type='text' name='ship_silver'> <?php echo $info['ship_silver'];?> </textarea><br>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '#ship_silver' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                    </script>
                    Bronze Partnership
                    <textarea id="ship_bronze" class='form-control col-md-5' type='text' name='ship_bronze'> <?php echo $info['ship_bronze'];?> </textarea><br>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '#ship_bronze' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                    </script>
                  <hr>
              <br>
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="contact-form">
              <div class="form-group">
                <input type='hidden' name='id_info' value="<?php echo $info['id_info'];?>">
                <input type='hidden' name='images' value="<?php echo $info['images'];?>">
                <input type="submit" name="action" value="Tambah Event" class="btn btn-primary col-md-12">
              </div>
            </div>

            <div>
              <img src="../upload/<?php echo $info['images']?>"  alt="" class="img-fluid wc-image">
            </div>

            <br>

              <!-- <input class='btn btn-primary col-md-12' type='file' name='images' accept='.jpg, .png, .jpeg' value=''> -->

            <br>
            <br>
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
              <h5>Nama Organisasi: </h5> <input class='form-control col-md-5' type='text' name='orgn' value='<?php echo $info['orgn'];?>'>
              <br>
              <h5>Deskripsi Organisasi: </h5> 
              <textarea id="deskripsi"class='form-control' type='text' name='deskripsi' ><?php echo $info['deskripsi'];?></textarea>
              
              <script name='deskripsi'>
                        ClassicEditor
                                .create( document.querySelector( '#deskripsi' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>          
              <br>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </form>  

   
    
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

<?php }
else {
  echo "<script>alert('Akses Ditolak')</script>";
  echo "<script>window.location.href='../login.php'</script>";
}?>

