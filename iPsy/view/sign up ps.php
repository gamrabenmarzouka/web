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
    <style>
    .signup-image {
        margin-top: 200px;
    }
    .select-style {
    padding: 0;
    margin: 0;
    border: 1px solid rgb(17, 113, 126);
    width: 120px;
    border-radius: 3px;
    overflow: hidden;
    background-color: #ffffff;
    background: rgb(255, 255, 255);
    position: relative;
}
.select-style select {
    padding: 5px 8px;
    width: 130%;
    border: none;
    box-shadow: none;
    background-color: transparent;
    background-image: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.select-style:after {
    top: 50%;
    left: 85%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: #ffffff;
    border-top-color: #ffffff;
    border-width: 5px;
    margin-top: -2px;
    z-index: 100;
}
.select-style select:focus {
    outline: none;
}
</style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="addpsy.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom" id="nom" placeholder="Nom"/>
                                <div id="erreur_nom" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                            <div class="form-group">
                                <label for="prénom"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="prénom" id="prénom" placeholder="Prénom"/>
                                <div id="erreur_prénom" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                            <div class="form-group">
                                <label for="email" ><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                                <div id="erreur_email" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="mdp" id="mdp" placeholder="Mot de pass"/>
                                <div id="erreur_mdp" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_mdp" id="re_mdp" placeholder="Répéter votre mot de pass"/>
                                <div id="erreur_re_mdp" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                            <div class="form-group">
                                <label for="adresse"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="adresse" id="adresse" placeholder="Adresse"/>
                            </div>
                            <div class="form-group">
                                <label for="sépcialité"><i class="zmdi zmdi-assignment-o"></i></label>
                                <input type="text" name="spécialité" id="sépcialité" placeholder="Spécialité"/>
                            </div>
                     
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" >
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../assets/images/signup-image.svg" alt="sing up image" ></figure>
                        <a href="sign in.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


    <!-- JS -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
