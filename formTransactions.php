
<?php 

include('./Config/connectionDb.php');
include('./Config/Redirect.php');
include('header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $montant = $_POST['montant'];
    $type = $_POST['type'];
    $account = $_POST['account'];

    $sql = "INSERT INTO transactions (Montant , Type , AccountID   )
    VALUES ('$montant' , '$type' , '$account'  ) ";

    $query = mysqli_query($connectionDB , $sql);


    Redirect('transactions.php', false);



}

     $sql = "SELECT * FROM Accoounts";
    $Accounts = mysqli_query($connectionDB , $sql);

$connectionDB->close();




?>


<!-- =========== Formulaire ================ -->
<form action="" method="post" class="bg-gray-200 w-[500px] p-5 absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded ">
    
    <div class="mb-4">
        <label for="" class="text-xl font-semibold">Montant</label>
        <input type="number"  name="montant" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
    </div>
    <div class="mb-4">
        <label for="" class="text-xl font-semibold">Devise</label>
        <select name="type" required id="" class="block py-2 px-1 text-xl mt-2 w-full">
            <option value="">--Choisir Type</option>
            <option value="Dèbit">Dèbit</option>
            <option value="Crèdit">Crèdit</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="" class="text-xl font-semibold">Costumer</label>
        <select name="account" required id="" class="block py-2 px-1 text-xl mt-2 w-full">
            <option value="">--Choisir Account</option>
            <?php 
                
            if (mysqli_num_rows($Accounts) > 0) {
                foreach($Accounts as $account) {
                    
                    echo "
                    <option value='$account[compteId]'>$account[compteId]</option>
                    
                    ";
                    
                }


            }else {
                echo 'Record Not exist';
            }
            
            
            ?>

        </select>
    </div>


    <div>
        <button type="submit" class="block bg-slate-800 w-[300px] mx-auto text-white py-4 mt-5 text-2xl">Submit</button>
    </div>
</form>