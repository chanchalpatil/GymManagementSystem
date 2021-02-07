<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once 'dbh.inc.php'
?>

<?php

    $trainerid=0;
    $update = false; 
    $First_Name='';
    $Last_Name='';
    $Age='';
    $Gender='';
    $Phone=''; 
    $Batch_Number='';
    $Years_Of_Experience='';
    
if (isset($_POST['save'])) {
    # code...
    //trainer extract
    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Batch_Number = $_POST['BatchNumber'];
    $Years_Of_Experience = $_POST['yearsOfExperience'];

    
                $sql = "INSERT INTO Trainer (`First Name`, `Last Name`, `Age`, `Gender`, `Phone`, `Batch`, `Years Of Experience`) VALUES ('$First_Name', '$Last_Name', '$Age', '$Gender', '$Phone', '$Batch_Number',  '$Years_Of_Experience');";
                $result = mysqli_query($conn, $sql);

                $_SESSION['message'] = "Record has been saved!";
                $_SESSION['msg_type'] = "success";

                header("Location: ../TrainerForm.php?trainerform=success");            
}

//DELETE OPTION
if (isset($_GET['delete'])) {
      # code...
      $trainerid = $_GET['delete'];
      $sql = "DELETE FROM Trainer WHERE `Trainer Id` = '$trainerid';";
      $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

      header("Location: ../General-table.php?delete=success");
      
    }

//EDIT OPTION
if (isset($_GET['edit'])) {
      # code...
        $trainerid = $_GET['edit'];
        $update = true; 
        $sql1 = "SELECT * FROM Trainer WHERE `Trainer Id` = '$trainerid';";
        $query1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

            //trainer extract
            
            while ($rows = mysqli_fetch_assoc($query1)) {
              # code...
            $First_Name = $rows['First Name'];
            $Last_Name = $rows['Last Name'];
            $Age = $rows['Age'];
            $Gender = $rows['Gender'];
            $Phone = $rows['Phone'];
            $Batch_Number = $rows['Batch'];    
            $Years_Of_Experience = $rows['Years Of Experience'];
            
            }
                                     
 }

 //UPDATE
 if (isset($_POST['update'])) {
   # code...
  //trainer extract
    $trainerid= $_POST['trainerid'];
    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Batch_Number = $_POST['BatchNumber'];
    $Years_Of_Experience = $_POST['yearsOfExperience'];

    $sql1 = "UPDATE Trainer SET `First Name`='$First_Name', `Last Name`='$Last_Name', `Age`='$Age', `Gender`='$Gender', `Phone`='$Phone', `Batch`='$Batch_Number', `Years Of Experience`='$Years_Of_Experience' WHERE `Trainer Id`= '$trainerid';";
    $que = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";


    header("Location: ../MemberForm.php?update=success");
 }





