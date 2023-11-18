<?php 

    include('header.php');
    include('./Config/connectionDB.php');


    $accountID = $_GET['id'];

    $query = "SELECT * FROM transactions WHERE AccountID = $accountID";
    $transactionaccount = mysqli_query($connectionDB , $query);
?>


<body class="h-[100vh] bg-white relative" >



    <!-- ======= overlay ============= -->
        <div class="bg-black opacity-60 absolute top-0 left-0 w-full h-full z-0 hidden" id="overlay"></div>
    <!-- ======= overlay ============= -->
    <div class="w-[80%] mx-auto">
    <!-- Button Add new Costumers  -->
    <button class="w-[200px] bg-slate-800 h-[60px] ml-auto block mt-5 text-white text-xl" id="AddCostumers">
        <a href="formTransactions.php">Add transactions</a>
    </button>
    <!-- Button Add new Costumers  -->

    <!-- =========== Table Costumers ====== -->
    <table class="bg-gray-100 mt-10  mx-auto w-full ">
            <thead class="bg-slate-800 text-white ">
                <tr class="rounded-md">
                    <th class=" min-w-[200px] py-5 text-xl uppercase">
                        ID Transactions
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Montant
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Type
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Account ID
                    </th>
                </tr>
            </thead>
            <tbody class="">
                   
            <?php 

            if (mysqli_num_rows($transactionaccount) > 0) {
                foreach ($transactionaccount as $transaction) {
                    echo "
                    <tr class='py-4'>
                    <th class='text-lg py-4 border'>$transaction[TransactionID]</th>
                    <th class='text-lg py-4 border'>$transaction[Montant]</th>
                    <th class='text-lg py-4 border'>$transaction[Type]</th>
                    <th class='text-lg py-4 border'>$transaction[AccountID]</th>
                </tr>
                    ";
                }
            }else {
                echo 'No Record Founded';
            }
            
            
            
        ?>



                    
                
    </table>
    <!-- =========== Table Costumers ====== -->
</tbody>