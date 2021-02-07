<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once 'dbh.inc.php'
?>

<?php

    $update = false; 
    $M_Id='';
    $First_Name='';
    $Last_Name='';
    $Age='';
    $Gender='';
    $Phone='';
    $Email='';
    $Package_Id='';
    $Batch_Number='';
    $Date_Of_Joining='';
    $Member_Id='';
    $Payment_Method='';
    $Amount_Paid='';
    $Payment_Date='';

if (isset($_POST['save'])) {
	# code...
    //member extract
    $M_Id = $_POST['MId'];
    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];    
    $Package_Id = $_POST['PackageType'];
    $Batch_Number = $_POST['BatchNumber'];
    $Date_Of_Joining = $_POST['DateOfJoining'];
    //payment extract
    $Member_Id = $_POST['MemberId'];
    $Payment_Method = $_POST['PaymentMethod'];
    $Amount_Paid = $_POST['AmountPaid'];
    $Payment_Date = $_POST['PaymentDate'];

    
                  $sql1 = "INSERT INTO Member (`Member Id`, `First Name`, `Last Name`, `Age`, `Gender`, `Phone`, `Email`, `Package Id`, `Batch`, `Date Of Joining`) VALUES ('$M_Id', '$First_Name', '$Last_Name', '$Age', '$Gender', '$Phone', '$Email', '$Package_Id', '$Batch_Number', '$Date_Of_Joining');";
                  $query = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

                  $sql2 = "INSERT INTO Payment (`Member Id`, `Payment Method`, `Amount Paid`, `Payment Date`) VALUES ('$Member_Id','$Payment_Method', '$Amount_Paid', '$Payment_Date');";
                  $quer = mysqli_query($conn, $sql2) or die( mysqli_error($conn));

                  $_SESSION['message'] = "Record has been saved!";
                  $_SESSION['msg_type'] = "success";

                  header("Location: ../MemberForm.php?form=success");              
}

//DELETE OPTION
if (isset($_GET['delete'])) {
      # code...
      $memberid = $_GET['delete'];
      $sql = "DELETE FROM Member WHERE `Member Id` = '$memberid';";
      $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

      header("Location: ../General-table.php?delete=success");
      
    }

//EDIT OPTION
if (isset($_GET['edit'])) {
      # code...
        $memberid = $_GET['edit'];
        $update = true; 
        $sql1 = "SELECT * FROM Member WHERE `Member Id` = '$memberid';";
        $query1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

        $sql2 = "SELECT * FROM Payment WHERE `Member Id` = '$memberid';";
        $query2 = mysqli_query($conn, $sql2) or die( mysqli_error($conn));
            //member extract
            
            while ($rows = mysqli_fetch_assoc($query1)) {
              # code...
            $M_Id = $rows['Member Id'];
            $First_Name = $rows['First Name'];
            $Last_Name = $rows['Last Name'];
            $Age = $rows['Age'];
            $Gender = $rows['Gender'];
            $Phone = $rows['Phone'];
            $Email = $rows['Email'];    
            $Package_Id = $rows['Package Id'];
            $Batch_Number = $rows['Batch'];
            $Date_Of_Joining = $rows['Date Of Joining'];

            }
            
           //payment extract 
            while ($rows = mysqli_fetch_assoc($query2)) {
              # code...
            $Member_Id = $rows['Member Id'];
            $Payment_Method = $rows['Payment Method'];
            $Amount_Paid = $rows['Amount Paid'];
            $Payment_Date = $rows['Payment Date'];
            }       
                            
 }

 //UPDATE
 if (isset($_POST['update'])) {
   # code...
  //member extract
    $M_Id = $_POST['MId'];
    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];    
    $Package_Id = $_POST['PackageType'];
    $Batch_Number = $_POST['BatchNumber'];
    $Date_Of_Joining = $_POST['DateOfJoining'];
    //payment extract
    $Member_Id = $_POST['MemberId'];
    $Payment_Method = $_POST['PaymentMethod'];
    $Amount_Paid = $_POST['AmountPaid'];
    $Payment_Date = $_POST['PaymentDate'];

    $sql1 = "UPDATE Member SET `First Name`='$First_Name', `Last Name`='$Last_Name', `Age`='$Age', `Gender`='$Gender', `Phone`='$Phone', `Email`='$Email', `Package Id`='$Package_Id', `Batch`='$Batch_Number', `Date Of Joining`='$Date_Of_Joining' WHERE `Member Id`= '$M_Id';";
    $que = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

    $sql2 = "UPDATE Payment SET `Payment Method`='$Payment_Method', `Amount Paid`='$Amount_Paid', `Payment Date`='$Payment_Date' WHERE `Member Id`= '$Member_Id';";
    $qu = mysqli_query($conn, $sql2) or die( mysqli_error($conn));

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";


    header("Location: ../MemberForm.php?update=success");
 }



