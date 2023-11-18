<?php

include('./Config/connectionDB.php');
include('./Config/Redirect.php');


// Create Table To Custumers 

// $sql = "CREATE TABLE costumers(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(60) NOT NULL,
//     lastname VARCHAR(60) NOT NULL,
//     birthday DATE,
//     nationalite VARCHAR(60) NOT NULL,
//     gender VARCHAR(30) NOT NULL
//     )";

// if ($connectionDB->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
//   } else {
//     echo "Error creating table: " . $connectionDB->error;
//   }
  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $nationalite = $_POST['nationality'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO costumers (firstname , lastname , birthday , nationalite , gender)
    VALUES ('$firstname' , '$lastname' , '$birthday' , '$nationalite' , '$gender') ";

    $query = mysqli_query($connectionDB , $sql);

    $firstname = '';
    $lastname = '';
    $birthday = '';
    $nationalite = '';
    $gender = '';
    Redirect('costumers.php', false);
  
   

    // if ($query) {
    //     echo 'Data Add Succesfully';
    // }else {
    //     echo 'not added';
    // }
    

  }

  $connectionDB->close();

  ?>


















<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Links Tailwind CSS -->
  <link href="./dist/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gray_dark: '#4f5b67',
          }
        }
      }
    }
  </script>
</head>



<body class="h-[100vh] bg-white relative" >

    <?php 
    
    include('header.php');
    
    
    
    ?>

    <!-- ======= overlay ============= -->
        <div class="bg-black opacity-60 absolute top-0 left-0 w-full h-full z-0 hidden" id="overlay"></div>
    <!-- ======= overlay ============= -->
    <div class="w-[80%] mx-auto">
    <!-- Button Add new Costumers  -->
    <button class="w-[200px] bg-slate-800 h-[60px] ml-auto block mt-5 text-white text-xl" id="AddCostumers">Add New Costumer</button>
    <!-- Button Add new Costumers  -->

    <!-- =========== Table Costumers ====== -->
    <table class="bg-gray-100 mt-10  mx-auto w-full ">
            <thead class="bg-slate-800 text-white ">
                <tr class="rounded-md">
                    <th class=" min-w-[200px] py-5 text-xl uppercase">
                        ID
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Nom
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Prènom
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Date de Naissance
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Nationalitè
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Gendre
                    </th>
                    <th class="min-w-[200px] py-5 text-xl uppercase">
                        Actions
                    </th>
                </tr>
            </thead>
            




            <tbody class="">
                   
            <?php 
             include('./Config/connectionDB.php');

             $query = "SELECT * FROM costumers";

            $costumers = mysqli_query($connectionDB , $query);
            
            
            if (mysqli_num_rows($costumers) > 0) {
                foreach ($costumers as $costumer) {
                    echo "
                    <tr class='py-4'>
                    <th class='text-lg py-4 border'>$costumer[id]</th>
                    <th class='text-lg py-4 border'>$costumer[firstname]</th>
                    <th class='text-lg py-4 border'>$costumer[lastname]</th>
                    <th class='text-lg py-4 border'>$costumer[birthday]</th>
                    <th class='text-lg py-4 border'>$costumer[nationalite]</th>
                    <th class='text-lg py-4 border'>$costumer[gender]</th>
                    <th class='text-lg py-4 border'>
                        <a href='Update.php?id=$costumer[id]' class='bg-green-500 text-white inline-block w-fit p-1'>Update</a>
                        <a href='Delete.php?id=$costumer[id]' class='bg-red-500 text-white inline-block w-fit p-1'>Delete</a>
                        <a href='costumerAccounts.php?id=$costumer[id]' class='bg-gray-500 text-white inline-block w-fit p-1'>Accounts</a>
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

    <!-- =========== Formulaire ================ -->
    <form action="" method="post" id="form" class="bg-gray-200 w-[700px] p-5 absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded hidden">
        <div class="mb-4">
            <label for="" class="text-xl font-semibold">Nom</label>
            <input type="text" name="firstname" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
            <span class="text-xl block text-red-500 font-medium"></span>
        </div>
        <div class="mb-4">
            <label for="" class="text-xl font-semibold">Prènom</label>
            <input type="text" name="lastname" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
            <span class="text-xl block text-red-500 font-medium"></span>
        </div>
        <div class="mb-4">
            <label for="" class="text-xl font-semibold">Date de Naissance</label>
            <input type="date" name="birthday" id="" required class="block p-3 mt-2 w-[350px] outline-none text-xl">
            <span class="text-xl block text-red-500 font-medium"></span>
        </div>
        <div class="mb-4">
            <label for="" class="text-xl font-semibold">Nationalitè</label>
            <input type="text" name="nationality" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
            <span class="text-xl block text-red-500 font-medium"></span>
        </div>
        <div class="mb-4">       
        <label for="" class="text-xl font-semibold">Gendre</label>
            <div class="my-3">
            <input type="radio" name="gender" checked  id="homme" value="Homme" class="">
            <label for="homme" class="text-xl text-medium">Homme</label>
            
            <input type="radio" name="gender"   id="femme" value="Femme" class="ml-5">
            <label for="femme" class="text-xl text-medium">Femme</label>
            </div>
        </div>

        <div>
            <button type="submit" class="block bg-slate-800 w-[300px] mx-auto text-white py-4 mt-5 text-2xl">Submit</button>
        </div>
    </form>




    </div>
    
        

    <script>
        const addNewCostmer = document.getElementById('AddCostumers');
        const formData = document.getElementById('form');
        const overlay = document.getElementById('overlay');
        
        addNewCostmer.addEventListener('click', () =>  {
            formData.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        })
        overlay.addEventListener('click', () =>  {
            formData.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        })
    </script>


    

</body>



