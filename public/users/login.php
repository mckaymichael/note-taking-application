<?php
  require('../../app/init.php');

  //looks for a submission made to this page from a form
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //takes in the submitted email into the form
    //return a mysql results object that lets us know if there is a user
    $requested_user = USER::find_user_by_email($_POST['email']);

    //num rows returns how many records in the database have that email name
    //we don't want multiple emails matching, and if it returns 0, no email exists
    if($requested_user->num_rows == 1) {
      //get data associated to the user and turn it into an associative array
      $user_data = $requested_user->fetch_assoc();
      //create user object from user_data
      $user = new User($user_data);

      //if the password from the form matches the password in the database, return true or false and redirect user to the user page
      if($user->validate_password($_POST['password'])) {
        $session->login($user->id);
        redirect('/');
      } else {
        echo 'Incorrect Password';

        exit;
      }
    }
  }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MDIA 3294 - To-Do Application</title>
  <meta name="robots" content="noindex">

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
            <h1 class="font-bold text-4xl flex-grow">Login</h1>
          </div>
        </div>
        <!-- End: Index Header -->

        <!-- Login: Form -->
        <div class="grid grid-cols-12 mt-10">
            <div class="col-span-12">

                <form action="<?php echo get_public_url("/users/login.php"); ?>" method="POST">

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2" for="user_email">Email</label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_email" type="email" name="email">
                    </div>      
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2" for="user_password">Password</label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_password" type="password" name="password">
                    </div>             
                    
                    <button class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold" type="submit">Log In</button>                        
                
                </form>

            </div>
        </div>
        <!-- End Logout Form -->         
    
      </div>
    </div>
    <!-- End: Page Content -->

    <!-- Global Footer -->
    <?php include(get_path('public/partials/footer.php')); ?>

</body>

</html>