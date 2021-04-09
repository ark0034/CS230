<?php
require "includes/header.php"
?>

<main>
    <link rel="stylesheet" href="../css/signup.css">
    <div class="bg-cover">
        <div class="h-100 container center-me">
            <div class="my-auto">
                <div class="signup-form">
                
                    <form action="../includes/login-helper.php" method="post">

                        <h1 class="h3 mb-3 fw-normal">Please Login</h1>
                        <p class="hint-text">Welcome back to Priti Creations</p>

                        <label for="name" class="visually-hidden">Username or Email address</label>
                        <input type="text" class="form-control" name="uname_email" placeholder="Username or Email" required autofocus>
                        
                        <label for="inputPassword" class="visually-hidden">Password</label>
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                        
                        <div class="checkbox mb-3">
                            <button class="w-100 btn btn-lg btn-primary" name="login-submit" type="submit">Login</button>
                            <p class="mt-5 mb-3 text-muted">&copy; 2021–5ever</p>
                        </div>

                        <a class="navbar-brand" href="signup.php">Don't have an account? Register Here!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>