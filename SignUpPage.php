<html>
    <head>
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/SignUpPage.css">
        <script src="js/SignUpPage.js"></script>
        <?php include "C:/xampp/htdocs/Abstract/EMAILOTP/Login and Signup Form with Email Verification - PHP/controllerUserData.php" ?>
    </head>
    <body>
        <div class="sign-up-form">
           
            <h1>Sign Up Now</h1>
            <form action="php/record_SignUPinfo.php"  method="POST">
                
                <input type="email" class="input-box" placeholder="Enter Email" id="username" name="email" required>
                <input type="email" class="input-box" placeholder="Your Name (PROTOTYPE `Not Required`)" id="username" name="name" >
                <input type="email" class="input-box" placeholder="Mobile Number (PROTOTYPE `Not Required`)" id="username" name="mobile_number">                      
                <input type="password" class="input-box" placeholder="Create Password" id="password" name="password" required >
                <p><span><input type="checkbox" required></span> I agree to the  <a href="TermsPopUp.html">Terms of Services</a></p>
                <button type="submit" class="signup-btn" name="signup">Customer Sign Up</button>
                <button type="button" class="signup-btn" onclick="document.location.href='OwnerRegistration.html'">Owner Sign Up</button>
                <hr>
                <p class="or">OR</p>
                <button type="button" class="google-btn">Login with Google</button>
                <p>Have an account? <a href="SignInPage.html">Sign In</a></p>

            </form>
    
        </div>

    </body>
    </html>
