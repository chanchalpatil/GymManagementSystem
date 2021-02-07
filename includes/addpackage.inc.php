<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once 'dbh.inc.php'
?>

<?php

    $update = false; 
    $Package_Id='';
    $Package_Name='';
    $Amount='';
   
    
if (isset($_POST['save'])) {
    # code...
    //trainer extract
    $Package_Id = $_POST['packageid'];
    $Package_Name = $_POST['packagename'];
    $Amount = $_POST['amount'];
    
    
                $sql = "INSERT INTO Package (`Package Id`, `Package Type`,`Amount(in INR)`) VALUES ('$Package_Id', '$Package_Name', '$Amount');";
                $result = mysqli_query($conn, $sql);

                $_SESSION['message'] = "Package details has been saved!";
                $_SESSION['msg_type'] = "success";

                header("Location: ../addpackage.php?add=success");            
}

//DELETE OPTION
if (isset($_GET['delete'])) {
      # code...
      $packageid = $_GET['delete'];
      $sql = "DELETE FROM Package WHERE `Package Id` = '$packageid';";
      $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

      header("Location: ../Batch-n-Package.php?delete=success");
      
    }

//EDIT OPTION
if (isset($_GET['edit'])) {
      # code...
        $packageid = $_GET['edit'];
        $update = true; 
        $sql1 = "SELECT * FROM Package WHERE `Package Id` = '$packageid';";
        $query1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

            //trainer extract
            
            while ($rows = mysqli_fetch_assoc($query1)) {
              # code...
            $Package_Id = $rows['Package Id'];
            $Package_Name = $rows['Package Type'];
            $Amount = $rows['Amount(in INR)'];
            }
                                     
 }

 //UPDATE
 if (isset($_POST['update'])) {
   # code...
  //trainer extract
    $Package_Id = $_POST['packageid'];
    $Package_Name = $_POST['packagename'];
    $Amount = $_POST['amount'];


    $sql1 = "UPDATE Package SET `Package Id`='$Package_Id', `Package Type`='$Package_Name', `Amount(in INR)` ='$Amount' WHERE `Package Id` = '$Package_Id';";
    $que = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

    
    $_SESSION['message'] = "Package details have been updated!";
    $_SESSION['msg_type'] = "warning";


    header("Location: ../addpackage.php?update=success");
 }





