<?php
$this->load->view('templates/header');
?>

<title>Etats des mouvements des stocks</title>

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
                            <!--<img src="<?php echo base_url() ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">-->
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
                                    <!--<img src="<?php echo base_url(); ?>/assets/images/img.jpg" alt="">-->
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
                                            <span class="image"><img src="<?php echo base_url('assets') ?>/images/img.jpg" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="<?php echo base_url('assets') ?>/images/img.jpg" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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

                        <!--<div class="title_right">-->
                        <div class="text-center">
                            <h3>Etat des Mouvements des Stocks</h3>
                        </div>
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="form-group">
                                <form action="<?php echo base_url('index.php/etatDesMvtsStocksController/etat') ?>" method="post">
                                    
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Du: </label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="date" name="du"  class="form-control" placeholder="Default Input">
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jusqu'à:</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="date" name="jusqua" class="form-control" placeholder="Default Input">
                                    </div>

                                    <input class="btn btn-default" type="submit" value="voir etats">

                                </form>
                            </div>
                        </div>

                        <!--                        <form class="form-horizontal">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                        <div class="input-prepend input-group">
                                                          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                          <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2016 - 01/25/2016">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </form>-->

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                          <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                        </th>
                                        <th class="column-title">Référence </th>
                                        <th class="column-title">Matériel </th>
                                        <th class="column-title">Quantité Initiale </th>
                                        <th class="column-title">Entrée</th>
                                        <th class="column-title">Sortie</th>
                                        <th class="column-title">Quantité Finale </th>
                                        <th class="column-title">Unité </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 0; $i < count($etats); $i++) { ?>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                          <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                            </td>
                                            <td class=" "><?php echo $etats[$i]->getReference(); ?></td>
                                            <td class=" "><?php echo $etats[$i]->getMateriel(); ?></td>
                                            <td class=" "><?php echo $etats[$i]->getQuantiteInitiale(); ?> </td>
                                            <td class=" "><?php echo $etats[$i]->getEntree(); ?></td>
                                            <td class=" "><?php echo $etats[$i]->getSortie(); ?></td>
                                            <td class=" "><?php echo $etats[$i]->getQuantiteFinale(); ?></td>
                                            <td class=" "><?php echo $etats[$i]->getUnite(); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <form action="<?php echo base_url('index.php/etatDesMvtsStocksController/exporterExcel'); ?>" method="post">
                                <input type="hidden" name="du" value="<?php echo $du; ?>">
                                <input type="hidden" name="jusqua" value="<?php echo $jusqua; ?>">
                                <input type="submit" class="btn btn-primary" value="export excel"> 
                            </form>

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

            </body>

            </html>