<?php
require "includes/header.php"
?>


<main>
    <link rel="stylesheet" href="../css/signup.css">
    <div class="bg-cover">
        <div class="h-100 container center-me">
            <div class="my-auto">
                <div class="signup-form">
                
                    <form action="../includes/signup-helper.php" method="post">

                        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
                        <p class="hint-text">Welcome to Priti Creations! Create your account!</p>

                        <div class="form-group">
                            <div class="row">
                                <div class="column" style="margin-right: 10px;">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required autofocus>
                                </div>
                                <div class="column">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required autofocus>
                                </div>
                            </div>
                        </div>
                            
                        <input type="text" class="form-control" name="uname" placeholder="User Name" required autofocus>

                        <label for="inputEmail" class="visually-hidden">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>

                        <label for="inputPassword" class="visually-hidden">Password</label>
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                        
                        <label for="confirmPassword" class="visually-hidden">Confirm Password</label>
                        <input type="password" id="confirmPassword" class="form-control" name="confirmpassword" placeholder="Password Again.." required>
                        
                        <div class="checkbox mb-3">
                            <button class="w-100 btn btn-lg btn-primary" name="signup-submit" type="submit">Sign up</button>
                            <p class="mt-5 mb-3 text-muted">&copy; 2021–5ever</p>
                        </div>

                        <a class="navbar-brand" href="login.php">Already have an account? Login Here!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>