<?php
    include_once 'db.php';
    //Han Vui Ern Samuel B1700483
    if (isset($_GET['confirm'])) {
        //get vaccinationID from current vaccination
        $vaccinationID = $_GET['vID'];                     

        $sql = "UPDATE tb_vaccinations SET status='In Progress' where vaccinationID='$vaccinationID';";
        $result = mysqli_query($conn,$sql);

        $sql ="SELECT * FROM tb_vaccinations WHERE vaccinationID='$vaccinationID'" ;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $batchNo = $row['batchNo'];

        $sql ="SELECT * FROM tb_batches WHERE batchNo ='$batchNo'" ;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        
        $updatedQuantAv = $row['quantityAvailable'] -1;

        $sql = "UPDATE tb_batches SET quantityAvailable='$updatedQuantAv' where batchNo='$batchNo';";
        $result = mysqli_query($conn,$sql);
        echo '<script>alert("You have successfully confirmed the vaccination appointment");window.location.href = "vaccination.php";</script>';
        exit();
        
    }

    if (isset($_GET['record'])) {

    }