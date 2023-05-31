<?php
require 'parts/header.php';
?>
    <div class="container my-5 mx-auto" style="max-width: 700px;">
    <h1 class="h1 mb-4 text-center">Customer Service Feedback Form</h1>

        <div class="text-center mt-4">
            <h3>Please login with your existing account or sign up a new account to continue</h3>
        </div>
<?php if ( isUserLoggedIn() ) { ?>
    <div class="card p-4">
            <?php require dirname(__DIR__) .  '/parts/message_error.php'; ?>
            <?php require dirname(__DIR__) .  '/parts/message_success.php'; ?>
            <?php require dirname(__DIR__) .  '/parts/questions.php'; ?>
        </div>
    <div class="text-center mt-4">
            <a href="/results" class='m-2 text-decoration-none'>View Result</a>
            <a href="/logout" class='m-2  text-decoration-none'>Logout</a>
        <?php } else { ?>
            <div class="mt-4 d-flex justify-content-center gap-3">
                <a href="/login" class='m-2 btn btn-primary'>Login</a>
                <a href="/signup" class='m-2 btn btn-primary'>Sign Up</a>
            </div>
        <?php } ?>
    </div>
    </div>
<?php
require 'parts/footer.php';