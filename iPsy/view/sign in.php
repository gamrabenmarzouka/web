

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
                <h2 class="form-title">Sign in en tant que </h2>

                <a class="form-submit" href="sign in pa.php">Patient</a>
                <a class="form-submit" href="sign in ps.php">Psychologue</a>

            </div>
        </div>
    </div>
</section>

</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
