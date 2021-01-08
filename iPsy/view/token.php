<?php 
include_once "../config.php";
if(isset($_GET['token'])&&$_GET['token']!='')
{
    try{$db=config::getConnexion();
$stmt=$db->prepare('SELECT email From psy WHERE token = ?');
$stmt->execute([$_GET['token']]);
$email=$stmt->fetchColumn();} catch (PDOException $e) {
    $e->getMessage();
}

if($email)
{ ?>
    
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
 
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="../assets/images/signin-image.png" alt="sing up image"></figure>
               
            </div>

            <div class="signin-form">
                <h2 class="form-title">Réinitialiser votre mot de pass</h2>

                <form method="POST" class="register-form" id="login-form">
 
                    <div class="form-group">
                        <label for="mdp"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="newpass" id="newpass" placeholder="Password"/>
                        <div id="erreur_mdp" style="font-size:10px;font-weight: 40;"></div>

                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Sauvegarder"/>
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
}
}

if(isset($_POST['newpass']))
{
  try{  $db=config::getConnexion();
  $sql="UPDATE psy SET mdp=?,token='NULL' WHERE email=?";
    $stmt=$db->prepare($sql);
    $stmt->execute([$_POST['newpass'],$email]);
   header('Location:sign in.php');} catch (PDOException $e) {
    $e->getMessage();
}
}
?>