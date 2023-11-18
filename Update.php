<?php 

include('./Config/connectionDB.php');
include('./Config/Redirect.php');
include('header.php');



     if (!empty($_GET['id'])) {
        $costumerID = $_GET['id'];
         try {
            $sql = "SELECT * FROM costumers WHERE id = $costumerID";
            $result = $connectionDB->query($sql);
            $costumer = $result->fetch_assoc();
            $firstname = $costumer['firstname'];
            $lastname = $costumer['lastname'];
            $birthday = $costumer['birthday'];
            $nationalite = $costumer['nationalite'];
            $gender = $costumer['gender'];
         } catch (Exception $e) {
            echo 'Error';
         } 

     } 











?>

<!DOCTYPE html>
<html lang="en">
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
<body >
    <div class="w-full h-[80vh] flex items-center justify-center">
         <!-- =========== Formulaire ================ -->
        <form action="updateController.php" method="post"  class="bg-gray-200 w-[700px] p-5 ">
            <div>
                <input type="hidden" name="id" value="<?php echo $costumerID ?>">
            </div>
            <div class="mb-4">
                <label for="" class="text-xl font-semibold">Nom</label>
                <input type="text" name="firstname" value="<?php echo $firstname;?>" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
                <span class="text-xl block text-red-500 font-medium"></span>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl font-semibold">Prènom</label>
                <input type="text" name="lastname" required value="<?php echo $lastname;?>" class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
                <span class="text-xl block text-red-500 font-medium"></span>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl font-semibold">Date de Naissance</label>
                <input type="date" name="birthday" value="<?php echo $birthday;?>" id="" required class="block p-3 mt-2 w-[350px] outline-none text-xl">
                <span class="text-xl block text-red-500 font-medium"></span>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl font-semibold">Nationalitè</label>
                <input type="text" name="nationality" value="<?php echo $nationalite;?>" required class="block w-full bg-white py-3 px-2 outline-none mt-3 text-xl">
                <span class="text-xl block text-red-500 font-medium"></span>
            </div>
            <div class="mb-4">       
            <label for="" class="text-xl font-semibold">Gendre</label>
                <div class="my-3">
                <?php
                  $checkedmale = ($gender == "Homme") ? "checked" : "";
                  $checkedFemale = ($gender == "Femme") ? "checked" : "";
                ?>

                <input type="radio" name="gender" <?php echo $checkedmale ?>  id="homme" value="Homme" class="">
                <label for="homme" class="text-xl text-medium">Homme</label>
                
                <input type="radio" name="gender"  <?php echo $checkedFemale ?>  id="femme" value="Femme" class="ml-5">
                <label for="femme" class="text-xl text-medium">Femme</label>
                </div>
            </div>

            <div>
                <button type="submit" class="block bg-slate-800 w-[300px] mx-auto text-white py-4 mt-5 text-2xl">Update</button>
            </div>
        </form>

    </div>
   
</body>
</html>