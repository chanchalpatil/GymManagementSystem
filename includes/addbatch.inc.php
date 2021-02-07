<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once 'dbh.inc.php'
?>

<?php

    $update = false; 
    $Batch_number='';
    $Timings='';
   
    
if (isset($_POST['save'])) {
    # code...
    //trainer extract
    $Batch_number = $_POST['batch'];
    $Timings = $_POST['timings'];
    
    
                $sql = "INSERT INTO Batch (`Batch No`, `Timings`) VALUES ('$Batch_number', '$Timings');";
                $result = mysqli_query($conn, $sql);

                $_SESSION['message'] = "Batch details have been saved!";
                $_SESSION['msg_type'] = "success";

                header("Location: ../addbatch.php?addbatch=success");            
}

//DELETE OPTION
if (isset($_GET['delete'])) {
      # code...
      $batchno = $_GET['delete'];
      $sql = "DELETE FROM Batch WHERE `Batch No` = '$batchno';";
      $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

      header("Location: ../Batch-n-Package.php?delete=success");
      
    }

//EDIT OPTION
if (isset($_GET['edit'])) {
      # code...
        $batchno = $_GET['edit'];
        $update = true; 
        $sql1 = "SELECT * FROM Batch WHERE `Batch No` = '$batchno';";
        $query1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

            //trainer extract
            
            while ($rows = mysqli_fetch_assoc($query1)) {
              # code...
            $Batch_number = $rows['Batch No'];
            $Timings = $rows['Timings'];
         
            }
                                     
 }

 //UPDATE
 if (isset($_POST['update'])) {
   # code...
  //trainer extract
    $Batch_number = $_POST['batch'];
    $Timings = $_POST['timings'];
    


    $sql1 = "UPDATE Batch SET `Batch No`='$Batch_number', `Timings`='$Timings' WHERE `Batch No`= '$Batch_number';";
    $que = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

    
    $_SESSION['message'] = "Batch details have been updated!";
    $_SESSION['msg_type'] = "warning";


    header("Location: ../addbatch.php?update=success");
 }





