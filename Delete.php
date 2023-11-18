
<?php
include('./Config/connectionDB.php');
include('./Config/Redirect.php');

$costumerID = $_GET['id'];

$delQuery = "DELETE FROM costumers WHERE id = $costumerID";

$queryDel = mysqli_query($connectionDB , $delQuery);

if ($queryDel) {
    Redirect('costumers.php', false);
}else {
    echo 'data not deleted';
}




?>