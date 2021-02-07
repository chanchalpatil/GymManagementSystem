<?php
 
 include_once 'includes/dbh.inc.php';
 $query1 = "SELECT * FROM Member;";
 $res1 = mysqli_query($conn, $query1) or die( mysqli_error($conn));

 $query2 = "SELECT * FROM Trainer;";
 $res2 = mysqli_query($conn, $query2) or die( mysqli_error($conn));

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
        <h3><i class="fa fa-angle-right"></i> GENERAL DATA</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Member Data</h4>
              <section id="unseen">
                <table class="table table-hover table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th class="numeric">Member ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th class="numeric">Age</th>
                      <th>Gender</th>
                      <th class="numeric">Phone</th>
                      <th class="Email">Email</th>
                      <th>Package ID</th>
                      <th class="numeric">Batch</th>
                      <th class="Date">Date of joining</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php 
                            while($rows = mysqli_fetch_array($res1))
                            {
                        ?>
                            <tr>
                              <td><?php echo $rows['Member Id'];?></td>
                              <td><?php echo $rows['First Name'];?></td>
                              <td><?php echo $rows['Last Name'];?></td>
                              <td><?php echo $rows['Age'];?></td>
                              <td><?php echo $rows['Gender'];?></td>
                              <td><?php echo $rows['Phone'];?></td>
                              <td><?php echo $rows['Email'];?></td>
                              <td><?php echo $rows['Package Id'];?></td>
                              <td><?php echo $rows['Batch'];?></td>
                              <td><?php echo $rows['Date Of Joining'];?></td>
                              <td>
                                
                              <a href="MemberForm.php?edit=<?php echo $rows['Member Id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                
                              </td>
                              <td>

                              <a href="includes/member.inc.php?delete=<?php echo $rows['Member Id'];?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
          
                              </td>
                              
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

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Trainer Data</h4>
              <section id="unseen">

                <table class="table table-hover table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th class="numeric">Trainer ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th class="numeric">Age</th>
                      <th>Gender</th>
                      <th class="numeric">Phone</th>
                      <th class="numeric">Batch</th>
                      <th class="numeric">Years of Experience</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                            while($rows = mysqli_fetch_array($res2))
                            {
                        ?>
                            <tr>
                              <td><?php echo $rows['Trainer Id']?></td>
                              <td><?php echo $rows['First Name']?></td>
                              <td><?php echo $rows['Last Name']?></td>
                              <td><?php echo $rows['Age']?></td>
                              <td><?php echo $rows['Gender']?></td>
                              <td><?php echo $rows['Phone']?></td>
                              <td><?php echo $rows['Batch']?></td>
                              <td><?php echo $rows['Years Of Experience']?></td>
                              <td>
                                
                              <a href="TrainerForm.php?edit=<?php echo $rows['Trainer Id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                
                              </td>
                              <td>

                              <a href="includes/trainer.inc.php?delete=<?php echo $rows['Trainer Id'];?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
          
                              </td>
                              
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
        <a href="General-table.php" class="go-top">
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
