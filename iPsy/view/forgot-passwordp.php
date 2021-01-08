<?php
include_once "../config.php";
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
                <a href="sign up.php" class="signup-image-link">I haven't signed up yet</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Password Recovery</h2>

                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your email"/>
                        <div id="erreur_email" style="font-size:10px;font-weight: 40;"></div>

                    </div>

                  
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Send"/>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
include_once "../controller/patientC.php";
$test_email = new patientC();

if (isset($_POST['email'])) 
{
     if ($test_email->chercherEmail($_POST['email']) == 0)
    {
        
        $token = uniqid();
       
        $url = "http://localhost/projet/projet/ipsy/view/tokenp.php?token=$token";
        $message = "bonjour,voici votre lien pour la recuperation de votre mot de passe: $url";
        if (mail($_POST['email'], 'Mot de passe oublié', $message, 'From: elyes3077@gmail.com')) 
        {
            try {
            $db = config::getConnexion();
           
            $sql = "UPDATE patient SET token=? WHERE email=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$token, $_POST['email']]);} catch (PDOException $e) {
                $e->getMessage();
            }
        }

        }

        header('Location:forgot-password.php?error=Email déjà envoyé');

    }
     else 
    {


     //   header('Location:sign up.php?error=Email n existe pas faire un autre compte');
    
}

?>
