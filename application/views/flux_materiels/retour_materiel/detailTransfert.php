<?php
$this->load->view('templates/header');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>

<title>Flux Matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!--Logo-->
                    <?php $this->load->view('templates/logo'); ?>
                    <!--Logo-->

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <!--<img src="<?php // echo base_url()                                                                 ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">-->
                        </div>
                        <div class="profile_info">
                            <span>Bienvenue,</span>
                            <h2><?php echo $this->session->userdata("nom") . " " . $this->session->userdata("prenom"); ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php $this->load->view("templates/sidebarmenufooter"); ?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->

                    <!-- /menu footer buttons -->
                    <!-- sidebar menu -->

                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->

                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <!--<img src="<?php // echo base_url();                                                                 ?>/assets/images/img.jpg" alt="">-->
                                    <?php echo $this->session->userdata("prenom"); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profil </a></li>
                                    <!--                                    <li>
                                                                            <a href="javascript:;">
                                                                                <span class="badge bg-red pull-right">50%</span>
                                                                                <span>Settings</span>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="javascript:;">Help</a></li>-->
                                    <li><a href="<?php echo base_url('index.php/accesComptesController/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <!--                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-envelope-o"></i>
                                                                    <span class="badge bg-green">6</span>
                                                                </a>-->
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                                 ?>/images/img.jpg" alt="Profile Image" /></span>-->
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                                 ?>/images/img.jpg" alt="Profile Image" /></span>-->
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <!--<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <!--<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Retours Matériels <small>A enregistrer</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br>
                                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    <div class="x_content">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Matériel</th>
                                                    <th>Quantité</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <label class="control-label">Date:
                                            </label>
                                            <div class="">
                                                <input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Commentaire:</label>
                                            <div class="">
                                                <textarea id="textarea" name="commentaire" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Enregistrer</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Transfert <small>du : <?php echo $transfert->getDateTransfertFormat(); ?></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                    <div class="message_wrapper">
                                        <h4 class="heading">Commentaire</h4>
                                        <blockquote class="message"><?php echo $transfert->getCommentaire(); ?></blockquote>
                                        <br>
                                    </div>
                                    <br>


                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <h2>Détails du transfert</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <!--                                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                                                        </div>-->
                                        </div>


                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">Matériel </th>
                                                    <th class="column-title">Quantité </th>
                                                    <th class="column-title">porte source </th>
                                                    <th class="column-title">porte dest </th>
                                                    <th class="column-title">Récupération </th>
                                                    <th class="column-title">transfert </th>
                                                    <th class="column-title no-link last"><span class="nobr">type</span>
                                                    </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php for ($i = 0; $i < count($transferts); $i++) { ?>
                                                    <tr class="even pointer">
                                                        <td class="a-center ">
                                                            <div style="position: relative;">
                                                                <?php echo $transferts[$i]->getDesignationMateriel(); ?>
                                                            </div>
                                                        </td>
                                                        <td class=" "><?php echo $transferts[$i]->getQuantite() ?></td>
                                                        <td class=" "><?php echo $transferts[$i]->getNumeroPorteSource(); ?></td>
                                                        <td class=" "><?php echo $transferts[$i]->getNumeroPorteDest(); ?></td>
                                                        <td class=" "><?php echo $transferts[$i]->getDateRecuperationFormat(); ?></td>
                                                        <td class=" "><?php echo $transferts[$i]->getTransfert(); ?></td>
                                                        <td class="a-right a-right "><?php echo $transferts[$i]->getType(); ?></td>
                                                        <td class=" last"><a href="#"><button class="fa fa-check btn btn-primary"></button></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <script>
                $(document).ready(function () {

                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }
                });
            </script>

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>

            </html>