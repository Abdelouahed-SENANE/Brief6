<?php 

include('./Config/connectionDB.php');
include('header.php');


// Create Table To Accounts 

// $sqlCompte = "CREATE TABLE IF NOT EXISTS Accoounts (
//     compteId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     balance FLOAT(10) NOT NULL,
//     devise VARCHAR(5),
//     rib BIGINT NOT NULL,
//     costumerID INT UNSIGNED,
//     FOREIGN KEY (costumerID) REFERENCES costumers(id) ON DELETE CASCADE
//   )";

// if ($connectionDB->query($sqlCompte) === TRUE) {
//     echo "Table MyGuests created successfully";
//   } else {
//     echo "Error creating table: " . $connectionDB->error;
//   }



?>



<body class="h-[100vh] bg-white relative" >



    <!-- ======= overlay ============= -->
        <div class="bg-black opacity-60 absolute top-0 left-0 w-full h-full z-0 hidden" id="overlay"></div>
    <!-- ======= overlay ============= -->
    <div class="w-[80%] mx-auto">
    <!-- Button Add new Costumers  -->
    <button class="w-[200px] bg-slate-800 h-[60px] ml-auto block mt-5 text-white text-xl" id="AddCostumers">
        <a href="formAccount.php">Add Account</a>
    </button>
    <!-- Button Add new Costumers  -->

    <!-- =========== Table Costumers ====== -->
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
             include('./Config/connectionDB.php');
             
             $query = "SELECT * FROM accoounts";

            $accounts = mysqli_query($connectionDB , $query);
            
            if (mysqli_num_rows($accounts) > 0) {
                foreach ($accounts as $account) {
                    echo "
                    <tr class='py-4'>
                    <th class='text-lg py-4 border'>$account[compteId]</th>
                    <th class='text-lg py-4 border'>$account[balance]</th>
                    <th class='text-lg py-4 border'>$account[devise]</th>
                    <th class='text-lg py-4 border'>$account[rib]</th>
                    <th class='text-lg py-4 border'>$account[costumerID]</th>
                    <th class='text-lg py-4 border'>
                        <a href='Update.php?id=$account[compteId]' class='bg-green-500 text-white inline-block w-fit p-1'>Update</a>
                        <a href='DeleteAccount.php?id=$account[compteId]' class='bg-red-500 text-white inline-block w-fit p-1'>Delete</a>
                        <a href='transactionsAccount.php?id=$account[compteId]' class='bg-gray-500 text-white inline-block w-fit p-1'>Transactions</a>
                    </th> 
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