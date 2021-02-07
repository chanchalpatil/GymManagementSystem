<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>THE ENERGY HUB</title>

  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
  

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-size: 16px;
        font-family: 'Acme', sans-serif;
        font-family: 'Kalam', cursive;
  
      }
    </style>



  </head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="home.php" class="logo"><b>THE ENERGY<span>HUB</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="index.php" style="font-size: 18px;">Logout</a></li>
        </ul>
      </div>
    </header>
          <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="about.php"><img src="img/favicon.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered" style="font-size: 16px;"> MORE ABOUT US?</h5>
          <li class="mt">
            
              <li class="sub-menu">
                <a href="javascript:;">
                 <i class="fa fa-dashboard"></i>
                 <span style="font-size: 17px;">Dashboard</span>
                </a>
                <ul class="sub">
                  <li><a href="gallery.html" style="font-size: 14px;">Gallery</a></li>
                  <li><a href="pricing_table.html" style="font-size: 14px;">Pricing Chart</a></li>                 
                </ul>  
              </li>
          </li>  

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span style="font-size: 17px;">Forms</span>
              </a>
            <ul class="sub">
              <li><a href="TrainerForm.php" style="font-size: 14px;">Trainer Form</a></li>
              <li><a href="MemberForm.php" style="font-size: 14px;">Member Form</a></li>
              <li><a href="contactform.php" style="font-size: 14px;">Contact Form</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span style="font-size: 17px;">Data Tables</span>
              </a>
              <ul class="sub">
                <li><a href="General-table.php" style="font-size: 14px;">General</a></li>
                <li><a href="Batch-n-Package.php" style="font-size: 14px;">Batches n Packages</a></li>
                <li><a href="count.php" style="font-size: 14px;">Count</a></li>
                <li><a href="Accounts.php" style="font-size: 14px;">Accounts</a></li>
              </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>MEMBER ENROLLMENT</h3>
               <!-- MEMBER FORM -->
              
      <?php require_once 'includes/member.inc.php'; ?>
      <?php

      if(isset($_SESSION['message'])): ?>
                    
              <div class="alert alert-<?=$_SESSION['msg_type']?>">
                      <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                      ?>
              </div>

      <?php endif ?>
              
        <div class="row mt">
          <div class="col-lg-11">
            <div class="form-panel">
              <div class=" form">

                <form class="cmxform form-horizontal style-form" id="MemberForm" method="POST" action="includes/member.inc.php">
                
          
                  <h4><i class="fa fa-angle-right"></i><b> Member Details</b></h4><br>
                  <div class="form-group ">
                    <label for="cid" class="control-label col-lg-2"> Member ID </label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cid" type="number" value="<?php echo $M_Id ?>" name="MId" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> First Name </label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="text" value="<?php echo $First_Name ?>" name="FirstName" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> Last Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="text" value="<?php echo $Last_Name ?>" name="LastName" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> Age</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="number" value="<?php echo $Age ?>" name="Age" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> Gender</label>
                    <div class="col-lg-10">
                    <div class="radio">
                      <select class="form-control round-form" value="<?php echo $Gender ?>" name="Gender">
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                          <option value="Others">Others</option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> Phone </label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" minlength="10" type="tel" value="<?php echo $Phone ?>" name="Phone" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                      <input class="form-control round-form " id="cemail" type="email" value="<?php echo $Email ?>" name="Email" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="curl" class="control-label col-lg-2">Choice of package</label>
                    <div class="col-lg-10">
                    <div class="radio">
                    <select class="form-control round-form" value="<?php echo $Package_Id ?>" name="PackageType" >
                        <option value="101">monthly + no membership</option>
                        <option value="102">monthly + membership</option>
                        <option value="103">3 month + no membership</option>
                        <option value="104">3 month + membership</option>
                        <option value="105">6 month + membership compulsory</option>
                        <option value="106">1 year + membership compulsory</option>
                    </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Choice of Batch</label>
                    <div class="col-lg-10">
                    <div class="radio">
                    <select class="form-control round-form" value="<?php echo $Batch_Number ?>" name="BatchNumber">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                       
                    </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Date of joining</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="date" value="<?php echo $Date_Of_Joining ?>" name="DateOfJoining" required />
                    </div>
                  </div>
                  
                  <section>

                  <h4><i class="fa fa-angle-right"></i><b> Payment Details</b></h4><br>

                  <div class="form-group ">
                    <label for="cid" class="control-label col-lg-2">Member ID</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cid" type="number" value="<?php echo $Member_Id ?>" name="MemberId" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Payment Method</label>
                    <div class="col-lg-10">
                    <div class="radio">
                    <select class="form-control round-form" value="<?php echo $Payment_Method ?>" name="PaymentMethod">
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                    </select>
                    </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Amount paid</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="number" value="<?php echo $Amount_Paid ?>" name="AmountPaid" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"> Payment Date</label>
                    <div class="col-lg-10">
                      <input class=" form-control round-form" id="cname" type="date" value="<?php echo $Payment_Date ?>" name="PaymentDate" required />
                    </div>
                  </div>

                  <div class="form-group">
                    <?php
                      if ($update == true):
                    ?>
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-info" type="submit" name="update">Update</button></div>
            
                    <?php else: ?>
                      <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="save">SAVE</button></div>
                    
                    <?php endif; ?>
                  </div>
                 
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
     
        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <section>
      <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">       
        <a href="MemberForm.php" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
   </section>   
     </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/Member-form-script.js"></script>

</body>

</html>
