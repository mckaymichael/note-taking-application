<?php

  require('../../app/init.php');
    //checks if the session object has the user id property set
    $session->is_logged_in();

    //get the id of whoever's card this is so it can be deleted.
    $id = $_GET['id'] ?? null;
    if(!$id) redirect('/');
    
    $note = Note::find_by_id($id, $session->user_id);

    //delete id after the delete button (from the form) has been pressed
    if($_SERVER['REQUEST_METHOD'] === 'POST') { 
      
        //Create an object to that will get deleted
        $args = $_POST;
        $args['user_id'] = $session->user_id;

        $note = new Note($args);
        $note->delete();
        
        redirect('/');
    } 

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MDIA 3294 - Note Application - Delete Note</title>

  <!-- tailwindcss -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>
    <body class="flex flex-col min-h-screen bg-[#42626e] text-white">

    <!-- Global Menu & Logo -->
    <div class="border-b">
        <nav class="flex items-center justify-between py-6 container mx-auto">
            <div class="flex">
                <a class="no-underline" href="<?php echo get_public_url('/'); ?>">
                    <span class="text-2xl font-bold">MDIA 3294: Notes Application</span>
                </a>
            </div>

            <div class="w-full flex-grow flex items-center w-auto">
                <ul class="list-reset flex justify-end flex-1 items-center">
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-white-500" href="<?php echo get_public_url('/'); ?>">Notes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--  End: Global Menu & Logo -->
    
    <!-- Page Content -->
    <div class="flex-grow">

        <div class="container mx-auto py-20">

            <!-- Delete Header -->
            <div class="grid grid-cols-12 border-b pb-6">
                <div class="col-span-12 flex items-center">
                    <div class="flex-grow">
                        <p class="text-slate-400"><a class="text-purple-500" href="<?php echo get_public_url('/'); ?>">My Notes</a > / <span>Delete Note</span></p>
                        <h1 class="font-bold text-4xl mt-2">Delete: <?php echo h($note['name']); ?></h1>
                    </div>
                </div>
            </div>
            <!-- End: Delete Header -->

            <!-- Delete Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <!-- set up post request form and correlate it to the id of the current note -->
                    <form action="<?php echo get_public_url('/notes/delete.php?id=' . h($note['id'])); ?>" method="POST">

                    <!-- use the name attribute to pull keys from superglobal $_POST and assign a value to each of the necessary tag inside the form. -->
                        <p class="mb-4">Are you sure you want to delete <strong class="font-bold"><?php echo h($note['name']);?></strong>?</p>
                        <input value="<?php echo h($note['id']);?>" name="id">
                        <button class="bg-red-500 rounded-full py-2 px-4 text-white font-bold">Yes, I'm sure</button>
                    </form>

                </div>
            </div>
            <!-- End: Delete Form -->

        </div>
    </div>
    <!-- End: Page Content -->

    <!-- Global Footer -->
    <div class="border-t text-center p-6">
        <p class="text-slate-400 text-md font-light"> &copy; 2022</p>
    </div>
    <!-- End: Global Footer -->

    </body>
</html>