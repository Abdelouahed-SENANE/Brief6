
<?php 
include('./Config/connectionDB.php');
include('./Config/Redirect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $nationalite = $_POST['nationality'];
    $gender = $_POST['gender'];
    $costumerID = $_POST['id'];
   
    
    $sql = "UPDATE costumers SET firstname = ? , lastname = ? , birthday = ? , nationalite = ? ,  gender = ?  WHERE id = ?";
    $stmt = $connectionDB->prepare($sql);
    $stmt->bind_param("sssssi", $firstname , $lastname , $birthday , $nationalite , $gender, $costumerID);
    $stmt->execute();
    if ($stmt->execute()) {
        Redirect('costumers.php', false);
   }

}

?>