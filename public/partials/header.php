<div class="border-b">
    <nav class="flex items-center justify-between py-6 container mx-auto px-8">
        <div class="flex">
            <a class="no-underline" href="<?php echo get_public_url('/'); ?>">
                <span class="text-2xl font-bold">MDIA 3294: Notes Application</span>
            </a>
        </div>

        <div class="w-full flex-grow flex items-center w-auto">
            <ul class="list-reset flex justify-end flex-1 items-center">
                <?php if(is_null($session->user_id)): ?>
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-white-500 mr-5" href="<?php echo get_public_url('/users/create.php'); ?>">Sign Up</a>
                    </li>
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-white-500 mr-5" href="<?php echo get_public_url('/users/login.php'); ?>">Log In</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-white-500 mr-5" href="<?php echo get_public_url('/users/logout.php'); ?>">Log Out</a>
                    </li>                 
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-white-500" href="<?php echo get_public_url('/'); ?>">Notes</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>