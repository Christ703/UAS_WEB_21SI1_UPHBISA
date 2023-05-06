<?php
session_start();
// error_reporting(0);
include 'config.php';
include 'function/login/datalogin.php';
include 'function/semesta/semesta.php';

if ($_SESSION['status']=="login") {
$id = $_SESSION['id'];
$row = findLoginById($id);
$hstry = cetakFaktuPrf($id)
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
                <li class="nav-item active"><a class="nav-link" href="profil.php">Welcome <?php echo $row['name'];?></a></li>
                
                
            </ul>
          </div>
        </div>
      </nav>
    </header>

    
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-1-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            </div>
          </div>
        </div>
      </div>
    </div>
    <body>
      <section class="py-5 my-5">
        <div class="container">
          <h1 class="mb-5"></h1>
          <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
              <div class="p-4">
                <div class="img-circle text-center mb-3">
                <img src="upload/<?php echo $row['image'];?>"  alt="Image" class="shadow">
                </div>
                <h4 class="text-center"><?php echo $row['name'];?></h4>
              </div>
<!-- Navigasi -->
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                  <i class="fa fa-home text-center mr-1"></i> 
                  Account
                </a>
                <a class="nav-link" id="trans-tab" data-toggle="pill" href="#trans" role="tab" aria-controls="trans" aria-selected="false">
                  <i class="fa fa-tv text-center mr-1"></i> 
                  Transaction History
                </a>
                <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                  <i class="fa fa-key text-center mr-1"></i> 
                  Password
                </a>
                </div>
              </div>
<!-- Account Preview -->
              <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                  <h3 class="mb-4">Welcome <?php echo $row['name'];?></h3>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label><?php echo $row['name'];?></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label></label>
                          <!-- <input type="text" class="form-control" value="Acharya"> -->
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label><?php echo $row['email'];?></label>
                          <!-- <input type="text" class="form-control" value="kiranacharya287@gmail.com"> -->
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          Phone:
                          <label><?php echo $row['no_telp'];?></label>
                          <!-- <input type="text" class="form-control" value="Kiran Workspace"> -->
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                          <label>Designation</label>
                          <input type="text" class="form-control" value="">
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Bio</label>
                          <p> <?php echo $row['bio'];?> </p>
                      </div>
                    </div>
                  </div>
                  <div>
                    <br>
                    <a class="btn btn-primary" href="profil_edit.php">Edit Account</a>
                  </div>
                </div>
<!-- Password -->
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                  <h3 class="mb-4">Want to Make Edits to Your Account?</h3>
                  <div>
                    <a class="btn btn-primary" href="profil_edit.php">Edit Account</a>
                  </div>
                </div>

<!-- Transaksi -->
                              <div class="tab-pane fade" id="trans" role="tabpanel" aria-labelledby="trans-tab">
                                <h3 class="mb-4">Transaction History</h3>
                                <div class="row">
                                  <div class="col-md-6">
                                      <table style="width:207%">
                                      <thead>
                                          <tr>
                                              
                                              <th class="border-gray-200" scope="col">ID</th>
                                              
                                              <th class="border-gray-200" scope="col">Date</th>
                                              <th class="border-gray-200" scope="col">Event</th>
                                              <th class="border-gray-200" scope="col">Benefit</th>
                                              <th class="border-gray-200" scope="col">Status</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($hstry as $row){?>
                                          <tr>
                                              <td><?php echo $row['id_receipt'];?></td>
                                              <td><?php echo $row['tanggal_transaksi'];?></td>
                                              <td><?php echo $row['judul'];?></td>
                                              <td style="text-transform: capitalize;"><?php echo $row['jenis_benefit']?></td>
                                              <?php if ($row['status']=='Approved') {?>
                                                <td><span class="badge bg-success"><?php echo $row['status'];?></span></td>
                                              <?php ;} elseif ($row['status']=='Rejected') {?>
                                                <td><span class="badge bg-danger"><?php echo $row['status'];?></span></td>
                                              <?php ;} elseif ($row['status']=='Pending'||$row['status']==' ') {?>
                                                <td><span class="badge bg-warning"><?php echo $row['status'];?></span></td>
                                              <?php }?>
                                          </tr>
                                          <?php } ?>
                                      </tbody>
                                  </table>
                                  
                                  </div>
                                </div>
                              </div>
              </div>
          </div>
        </div>


      </section>
    
    
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">

              
              <p>Copyright © 2020 UPH Bisa</p>
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

              <h2>Silahkan Login <br>Anda Bleum Melakukan Proses Login</h2>
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
              <p>Copyright © 2023 UPH Bisa</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


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