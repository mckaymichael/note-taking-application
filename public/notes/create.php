<?php

require('../../app/init.php');

//checks if the session object has the user id property set
$session->is_logged_in();

//Single page form processing for a post request
//this occurs when the form is submitted to the page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST;
    $args['user_id'] = $session->user_id;

    $crud = new Note($args);
    $crud->create();

    redirect('/');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDIA 3294 - Note Application - Create Note</title>
    <meta name="robots" content="noindex">

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

            <!-- Create Header -->
            <div class="grid grid-cols-12 border-b pb-6">
                <div class="col-span-12 flex items-center">
                    <div class="flex-grow">
                        <p class="text-slate-400"><a class="text-purple-500" href="<?php echo get_public_url('/'); ?>">My Notes</a> / <span>Add New Note</span></p>
                        <h1 class="font-bold text-4xl mt-2">Add New Note</h1>
                    </div>
                </div>
            </div>
            <!-- End: Create Header -->

            <!-- Create Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <!-- set up post request form -->
                    <form id="create_note" action="<?php echo get_public_url('/notes/create.php'); ?>" method="POST">

                        <!-- use the name attribute to link to superglobal $_POST and assign a value to each of the necessary tag inside the form. Forms an array with the name written in the name attribute-->

                        <!-- Sample tailwind text:input -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="crud_name">Name</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="crud_name" name="name">
                        </div>
                        <!-- End Sample tailwind text:input -->

                        <!-- Sample tailwind textarea -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="crud_body">Body</label>
                            <textarea class="shadow border rounded w-full py-2 px-3 text-gray-700  h-28" id="crud_body" name="body"></textarea>
                        </div>
                        <!-- End Sample tailwind textarea -->

                        <!-- Sample tailwind select -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="crud_course_number">Course Number</label>
                            <select class="shadow border rounded w-full py-2 px-3 text-gray-700 bg-white" id="crud_course_number" name="course_number">
                                <option>3294</option>
                                <option>3295</option>
                            </select>
                        </div>
                        <!-- End Sample tailwind select -->


                        <!-- Sample tailwind button -->
                        <button class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold">Save</button>
                        <!-- End Sample tailwind button -->

                    </form>

                </div>
            </div>
            <!-- End: Create Form -->

        </div>
    </div>
    <!-- End: Page Content -->

    <!-- Global Footer -->
    <?php include(get_path('public/partials/footer.php')); ?>
    <!-- End: Global Footer -->

    <script src="../js/note_app.js"></script>
</body>

</html>