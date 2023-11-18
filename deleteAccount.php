<?php 

    include('./Config/connectionDB.php');
    include('./Config/Redirect.php');

    $accountID = $_GET['id'];

    $sql = "DELETE FROM accoounts WHERE compteId = $accountID";


    $delAccount = $connectionDB->query($sql);

    Redirect('accounts.php' , false);
 


?>