<?php 

    include('header.php');
    include('./Config/connectionDB.php');


    $costumerID = $_GET['id'];

    $query = "SELECT * FROM accoounts WHERE costumerID = $costumerID";
    $accountsCostumer = mysqli_query($connectionDB , $query);


?>



<!-- =========== Table Costumers ====== -->
<div class="container mx-auto w-[80%]">
    <!-- ======== Infos Client ======== -->
    <div class="p-5 border-2 border-gray-600 w-[270px] mt-5">
        <table>
            <tbody class="">
                <?php 
                    include('./Config/connectionDB.php');

                    $query = "SELECT * FROM costumers WHERE id = $costumerID";
        
                    $costumers = mysqli_query($connectionDB , $query);
                    
                    if (mysqli_num_rows($costumers) > 0) {
                        foreach($costumers as $costumer) {
                            echo "
                        <tr>
                            <th class='mr-1 inline-block w-[100px] text-left'>Nom :</th>
                            <th class=' mr-1 inline-block w-[100px] text-left'>$costumer[lastname]</th>
                        </tr>
                        <tr>
                            <th class='mr-1 inline-block w-[100px] text-left'>Prènom :</th>
                            <th class=' mr-1 inline-block w-[100px] text-left'>$costumer[firstname]</th>
                        </tr>
                        <tr>
                            <th class='mr-1 inline-block w-[100px] text-left'>Nèe le :</th>
                            <th class=' mr-1 inline-block w-[100px] text-left'>$costumer[birthday]</th>
                        </tr>
                        <tr>
                            <th class='mr-1 inline-block w-[100px] text-left'>Nationalitè :</th>
                            <th class=' mr-1 inline-block w-[100px] text-left'>$costumer[nationalite]</th>
                        </tr>
                            
                            ";
                        }
                    }
                ?>



            </tbody>
        </table>
    </div>
    <table class="bg-gray-100 mt-10  mx-auto w-full ">
        <thead class="bg-slate-800 text-white ">
            <tr class="rounded-md">
                <th class=" min-w-[200px] py-5 text-xl uppercase">
                    ID Accounts
                </th>
                <th class="min-w-[200px] py-5 text-xl uppercase">
                    Balance
                </th>
                <th class="min-w-[200px] py-5 text-xl uppercase">
                    Devise
                </th>
                <th class="min-w-[200px] py-5 text-xl uppercase">
                    RIB
                </th>
                <th class="min-w-[200px] py-5 text-xl uppercase">
                    Costumer ID
                </th>
                <th class="min-w-[200px] py-5 text-xl uppercase">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="">
                   
            <?php 
                if (mysqli_num_rows($accountsCostumer)) {
                    foreach ($accountsCostumer as $account) {
                        echo "
                        <tr class='py-4'>
                        <th class='text-lg py-4 border'>$account[compteId]</th>
                        <th class='text-lg py-4 border'>$account[balance]</th>
                        <th class='text-lg py-4 border'>$account[devise]</th>
                        <th class='text-lg py-4 border'>$account[rib]</th>
                        <th class='text-lg py-4 border'>$account[costumerID]</th>
                        <th class='text-lg py-4 border'>
                            <a href='DeleteAccount.php?id=$account[compteId]' class='bg-red-500 text-white inline-block w-fit p-1'>Delete</a>
                            <a href=transactionsAccount.php?id=$account[compteId]' class='bg-gray-500 text-white inline-block w-fit p-1'>Transactions</a>
                        </th> 
                    </tr>
                        ";

                    }
                }
            
            ?>
        </tbody>
     
</table>

</div>

            <!-- =========== Table Costumers ====== -->