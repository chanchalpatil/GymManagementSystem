<?php
    session_start();
	# code...
    include_once 'dbh.inc.php';
    error_reporting(0);
    if (isset($_GET['delete'])) {
    	# code...
    	$memberid = $_GET['delete'];
        $sql = "DELETE FROM Member WHERE `Member Id` = '$memberid';";
        $query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

        header("Location: ../General-table.php?Record-deleted");
                  exit();

    }
    
?>

