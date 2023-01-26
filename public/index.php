<?php

require('../app/init.php');

//checks if the session object has the user id property set
$session->is_logged_in();

//find all data associated to the current login user's id and assign it to a variable
$crud_table = Note::find_all($session->user_id);

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MDIA 3294 - Notes Application</title>

        <!-- tailwindcss -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body class="flex flex-col min-h-screen bg-[#42626e] text-white">

        <!-- Global Menu & Logo -->
        <?php include(get_path('public/partials/header.php')); ?>

        <!-- Page Content -->
        <div class="flex-grow">
            <div class="container mx-auto py-20">

                <!-- Header -->
                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <h1 class="font-bold text-4xl flex-grow">My Notes</h1>
                        <a class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold" href="<?php echo get_public_url('/notes/create.php'); ?>">Add New</a>
                    </div>
                </div>
                <!-- End: Header -->

                <!-- Index Loop -->
                <div class="grid gap-6 grid-cols-12 mt-6">
                    <!-- loop through the crud_table as many times as there are  rows in the table. Each loop creates a note that already exists inside the database -->
                    <?php while($crud = $crud_table->fetch_assoc()): ?>
                        <article class="col-span-4">
                            <div class="rounded overflow-hidden shadow-lg border">
                                <div class="px-6 py-4">
                                    <div class="flex items-center">
                                        <h3 class="font-bold text-2xl mb-1 flex-grow"><?php echo h($crud['name']); ?></h3>
                                        <span class="text-white rounded-full text-sm bg-green-500 px-3 py-1">MDIA <?php echo h($crud['course_number']); ?></span>
                                        <a href="<?php echo get_public_url('/notes/edit.php?id='.h($crud['id'])); ?>" class="text-white rounded-full text-sm bg-purple-500 px-3 py-1 ml-2">Edit</a>
                                        <a href="<?php echo get_public_url('/notes/delete.php?id=' .h($crud['id'])); ?>" class="text-white rounded-full text-sm bg-red-500 px-3 py-1 ml-2">Delete</a>
                                    </div>
                                    <p class="text-xl my-4"><?php echo h($crud['body']); ?></p>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <!-- End: Index Loop -->

            </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php include(get_path('public/partials/footer.php')); ?>
        <!-- End: Global Footer -->

    </body>
</html>