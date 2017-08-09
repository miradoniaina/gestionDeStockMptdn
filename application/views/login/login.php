<?php $this->load->view('templates/header');
?>

<title>Login</title>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo base_url("index.php/accesComptesController/login"); ?>" method="post">
                        <h1>Identifiez-Vous!</h1>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="mdp" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->
                            <input class="btn btn-default submit" type="submit" value="S'Identifier">
                            <a class="reset_pass" href="#">Mot de passe oublié?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
<!--                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>-->

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                
                                <img src="<?php echo base_url("assets/images/logo.gif"); ?>" alt="logo.gif" width="200px">
                                <!--<h1><i class="fa fa-paw"></i> MPTDN</h1>-->
                                <!--<p>2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>-->
                            </div>
                        </div>
                    </form>
                </section>
            </div>
  
      </div>
    </div>
</body>
</html>
