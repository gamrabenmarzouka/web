<?php
session_start();
include_once '../model/psy.php';
include_once '../controller/psyC.php';
echo
$message="";
$psyC= new psyC();

if ( isset($_POST["email"]) &&
    isset($_POST["mdp"]))
    {
if (!empty($_POST["email"]) && 
!empty($_POST["mdp"]) ){
$message=$psyC->connexionAccount( $_POST["email"] , $_POST["mdp"]);
$_SESSION ['e'] = $_POST["email"];
if ($message!='pseudo ou mot de passe incorrect'){
    $_SESSION['m_un']=$_POST["email"];
header('Location:index.php');}
else{
    $message='pseudo ou mot de passe incorrect';
    header("Location: sign in.php?error=Incorect email or password");
    
}



    }
    else{
    $message ="Missing information";
    if (empty($_POST["email"])) {
        header("Location: sign in.php?error=Email is required");
    }
    if (empty($_POST["mdp"])) {
        header("Location: sign in.php?error=Password is required");
    }
}


}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link href="../assets/img/favicon.png" rel="icon">
    <script src="../assets/js/test.js"></script>


    <!-- Font Icon -->
    <link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/stylesign.css">
</head>
<body>
    <div class="main">

  <!-- Sing in  Form -->
  <section class="sign-in">
    <div class="container">
    <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }
                 ?>
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="../assets/images/signin-image.png" alt="sing up image"></figure>
                <a href="sign choix.php" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>

                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="email"/>
                        <div id="erreur_email" style="font-size:10px;font-weight: 40;"></div>

                    </div>
                    <div class="form-group">
                        <label for="mdp"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="mdp" id="mdp" placeholder="Password"/>
                        <div id="erreur_mdp" style="font-size:10px;font-weight: 40;"></div>

                    </div>
                    <div class="form-group">
                    <a href="forgot-password.php" class="footer-link">Forgot Password</a>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
