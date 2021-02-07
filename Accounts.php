
<?php
 include_once 'includes/dbh.inc.php';
 $que = "SELECT p.`Payment Id`, m.`First Name`, m.`Last Name`, 
 m.`Email`, p.`Payment Date`, p.`Payment Method`,
 pac.`Amount(in INR)` AS `Package Cost`, p.`Amount Paid`,
 pac.`Amount(in INR)`- p.`Amount Paid` AS `Amount Due`
 FROM Payment p
 JOIN Member m
 ON p.`Member Id` = m.`Member Id`
 JOIN Package pac
 ON m.`Package Id` = pac.`Package Id`
 ORDER BY `Payment Id` ASC;";

 
 $ress = mysqli_query($conn, $que) or die( mysqli_error($conn));

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
  <link href="css/table-responsive.css" rel="stylesheet">

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
                  <li><a href="pricing_table.html" style="font-size: 14px;">Pricing Table</a></li>
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
        <h3><i class="fa fa-angle-right"></i>ACCOUNTS</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Payments</h4>
              <section id="unseen">
                <table class="table table-hover table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>Payment Id</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Payment Date</th>
                      <th>Payment Method</th>
                      <th class="numeric">Package Cost (in INR)</th>
                      <th class="numeric">Amount Paid (in INR)</th>
                      <th class="numeric">Amount Due (in INR)</th>
                      <th>CONTACT</th>
                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                            while($rows = mysqli_fetch_array($ress))
                            {
                        ?>
                            <tr>
                              <td><?php echo $rows['Payment Id']?></td>
                              <td><?php echo $rows['First Name']?></td>
                              <td><?php echo $rows['Last Name']?></td>
                              <td><?php echo $rows['Email']?></td>
                              <td><?php echo $rows['Payment Date']?></td>
                              <td><?php echo $rows['Payment Method']?></td>
                              <td><?php echo $rows['Package Cost']?></td>
                              <td><?php echo $rows['Amount Paid']?></td>
                              <td><?php echo $rows['Amount Due']?></td>
                              <td><a href="contactform.php" style="color: red">Send mail</a></td>
                            </tr>
                        <?php

                            }

                        ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>

        
        <!-- /row -->
        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <section>
      <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">       
        <a href="Accounts.php" class="go-top">
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
</body>

</html>
