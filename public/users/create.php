<?php
  require('../../app/init.php');

  //Single page form processing for a post request
  //this occurs when the form is submitted to the page
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = new User($_POST);
    $user->create();

    redirect('/users/login.php');
  }
  
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MDIA 3294 - Crud Table Application</title>

  <!-- tailwindcss -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex flex-col min-h-screen bg-[#42626e] text-white">

    <!-- Global Menu & Logo -->
    <?php include(get_path('public/partials/header.php')); ?>

    <!-- Page Content -->
    <div class="flex-grow container mx-auto">
      <div class="max-w-screen-2xl px-8 mx-auto py-20">

        <!-- Index Header -->
        <div class="grid grid-cols-12 border-b pb-6">
          <div class="col-span-12 flex items-center">
            <h1 class="font-bold text-4xl flex-grow">Sign Up</h1>
          </div>
        </div>
        <!-- End: Index Header -->

        <!-- Create: Form -->
        <div class="grid grid-cols-12 mt-10">
            <div class="col-span-12">

                <form id="create_user" action="<?php echo get_public_url('/users/create.php');?>" method="POST">     
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2"for="user_name">name</label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_name" type="name" name="name">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2"for="user_email">Email</label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_email" type="email" name="email">
                    </div>      
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2"for="user_password">Password</label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_password" type="password" name="password">
                    </div>                              
                    
                    <button class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold" type="submit">Sign Up</button>

                </form>

            </div>
        </div>
        <!-- End Create Form -->        
        
      </div>
    </div>
    <!-- End: Page Content -->

    <!-- Global Footer -->
    <?php include(get_path('public/partials/footer.php')); ?>

</body>

</html>