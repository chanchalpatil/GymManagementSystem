<?php
    session_start();
	# code...
    include_once 'dbh.inc.php';

    $update = false; 
    $M_Id='';
    $First_Name='';
    $Last_Name='';
    $Age='';
    $Gender='';
    $Phone='';
    $Email='';
    $Package_Id='';
    $Package_Id='';
    $Batch_Number='';
    $Date_Of_Joining='';
    $Member_Id='';
    $Payment_Method='';
    $Amount_Paid='';
    $Payment_Date='';
        

    if (isset($_GET['edit'])) {
    	# code...
    	$memberid = $_GET['edit'];
        $update = true; 
        $sql1 = "SELECT * FROM Member WHERE `Member Id` = '$memberid';";
        $query1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

        $sql2 = "SELECT * FROM Payment WHERE `Member Id` = '$memberid';";
        $query2 = mysqli_query($conn, $sql2) or die( mysqli_error($conn));
            //member extract
            $rows = mysqli_fetch_array($query1);
            
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

            //payment extract
            $row = mysqli_fetch_array($query2);

            $Member_Id = $row['Member Id'];
            $Payment_Method = $row['Payment Method'];
            $Amount_Paid = $row['Amount Paid'];
            $Payment_Date = $row['Payment Date'];


   

        header("Location: ../MemberForm.php?Record-update");
                  exit();

    }
    
?>



<?php
                if(isset($_SESSION['message'])): ?>
                    
                    <div class="alert alert-<?=$_SESSION['mess_type']?>">
                      <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message'])
                      ?>
                    </div>

              <?php endif ?>

              <?php










if (isset($_POST['submit'])) {
    # code...
    include_once 'dbh.inc.php';

    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Batch_Number = $_POST['BatchNumber'];
    $Years_Of_Experience = $_POST['yearsOfExperience'];
    
    $sql = "INSERT INTO Trainer (`First Name`, `Last Name`, `Age`, `Gender`, `Phone`, `Batch`, `Years Of Experience`) VALUES ('$First_Name', '$Last_Name', '$Age', '$Gender', '$Phone', '$Batch_Number',  '$Years_Of_Experience');";
    $result = mysqli_query($conn, $sql);

    header("Location: ../TrainerForm.php?signup=success");
                  exit();
} 
else {
    header("Location: ../TrainerForm.php");
    exit(); 
}