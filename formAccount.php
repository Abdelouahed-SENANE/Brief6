
<?php 

include('./Config/connectionDb.php');
include('./Config/Redirect.php');
include('header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $balance = $_POST['balance'];
    $devise = $_POST['devise'];
    $rib = $_POST['rib'];
    $costumerID = $_POST['costumer'];

    $sql = "INSERT INTO accoounts (balance , devise , rib , costumerID )
    VALUES ('$balance' , '$devise' , '$rib' , '$costumerID' ) ";

    $query = mysqli_query($connectionDB , $sql);

    $balance = '';
    $devise = '';
    $rib = '';
    $costumerID = '';
    Redirect('accounts.php', false);



}

     $sql = "SELECT * FROM costumers";
    $costumers = mysqli_query($connectionDB , $sql);
           
$connectionDB->close();




?>


<!-- =========== Formulaire ================ -->
<form action="" method="post" class="bg-gray-200 w-[500px] p-5 absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded ">
    
    <div class="mb-4">
        <label for="" class="text-xl font-semibold">Balance</label>
        <input type="number"  name="balance" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
    </div>
    <div class="mb-4">
        <label for="devise" class="text-xl font-semibold">Devise</label>
        <select name="devise" required id="" class="block py-2 px-1 text-xl mt-2 w-full">
            <option value="">--Choisir Devise</option>
            <option value="DHs">DHs</option>
            <option value="Euro">Euro</option>
            <option value="Dollar">Dollar</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="" class="text-xl font-semibold">R.I.B</label>
        <input type="text" name="rib" id="" required class="block p-3 mt-2  outline-none text-xl w-full">
    </div>

    <div class="mb-4">
        <label for="" class="text-xl font-semibold">Costumer</label>
        <select name="costumer" required id="" class="block py-2 px-1 text-xl mt-2 w-full">
            <option value="">--Choisir Custumer</option>
            <?php 

            if (mysqli_num_rows($costumers) > 0) {
                foreach($costumers as $costumer) {
                    
                    echo "
                    <option value='$costumer[id]'>$costumer[lastname]</option>
                    
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