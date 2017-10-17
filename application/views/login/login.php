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
                        <h1>Identification</h1>
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
                            <p class="change_link">Nouveau personnel?
                                <a href="#signup" class="to_register"> Créer un compte </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <img src="<?php echo base_url("assets/images/logo.gif"); ?>" alt="logo.gif" width="200px">
                                <!--<p>©2017 Ministère des Postes, des Télécommunications et du développement numérique </p>-->
                            </div>
                        </div>
                    </form>
                </section>
            </div>


            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="<?php echo base_url('index.php/accesComptesController/inscription') ?>" method="post" novalidate="" enctype="multipart/form-data" accept-charset="utf-8">
                        <h1>Creation de compte</h1>
                        <div>
                            <input type="email" name="email" value="rado@gmail.com" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="text" name="nom" value="eddy" class="form-control" placeholder="Nom" required="" />
                        </div>
                        <div>
                            <input type="text" name="prenom" value="miradoniaina" class="form-control" placeholder="Prénom" required="" />
                        </div>
                        <div>
                            <input type="text" name="matricule" value="356 897" class="form-control" placeholder="Matricule" required="" />
                        </div>
                        <div>
                            <select name="idService" class="form-control">
                                <option disabled="" selected="">Service</option>
                                <?php for($i=0; $i < count($services);$i++){ ?>
                                <option value="<?php echo $services[$i]->id_service; ?>"><?php echo $services[$i]->service; ?></option>
                                <?php } ?>s
                            </select>
                        </div>
                        <br>

                        <div>
                            <input type="text" name="porte" value="117" class="form-control" placeholder="Porte (ex: 116)" required="" />
                        </div>

                        <div>
                            <input type="text" name="telephone" value="034 56 889 77" class="form-control" placeholder="Téléphone" required="" />
                        </div>
                        
                        <div>
                            <label class="text-left">Profil <span class="required">*</span>
                            </label>
                            <!--<div class="col-md-6 col-sm-6 col-xs-12">-->
                                <input id="email" name="image" required="required" class="form-control" type="file">
                            <!--</div>-->
                        </div>
                        <br>

                        <div>
                            <input type="password" name="mdp" value="itu" class="form-control" placeholder="Mot de passe" required="" />
                        </div>
                        
                        <div>
                            <textarea id="textarea" ame="poste" placeholder="Poste (ex: Assistante DGO)" required="required" n class="form-control">assistant</textarea>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-lg btn-default submit">Valider</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">déjà inscrit?
                                <a href="#signin" class="to_register"> Se connecter </a>
                            </p>

                            <div class="clearfix"></div>
                            <br/>

                            <div>
                                <img src="<?php echo base_url("assets/images/logo.gif"); ?>" alt="logo.gif" width="200px">
                                 <!--<p>©2017 Ministère des Postes, des Télécommunications et du développement numérique </p>-->
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets"); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets"); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets"); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url("assets"); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="<?php echo base_url("assets"); ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <link href="<?php echo base_url("assets"); ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="<?php echo base_url("assets"); ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <link href="<?php echo base_url("assets"); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url("assets"); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url("assets"); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets"); ?>/build/css/custom.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url("assets"); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("assets"); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url("assets"); ?>/vendors/nprogress/nprogress.js"></script>

    <script src="<?php echo base_url("assets"); ?>/vendors/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url("assets"); ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/vendors/google-code-prettify/src/prettify.js"></script>
    <script src="<?php echo base_url("assets"); ?>/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/vendors/starrr/dist/starrr.js"></script>

    <!-- gauge.js -->
    <script src="<?php echo base_url("assets"); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url("assets"); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url("assets"); ?>/vendors/skycons/skycons.js"></script>
    <
    <!-- DateJS -->
    <script src="<?php echo base_url("assets"); ?>/vendors/DateJS/build/date.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url("assets"); ?>/build/js/custom.js"></script>
</body>
</html>
