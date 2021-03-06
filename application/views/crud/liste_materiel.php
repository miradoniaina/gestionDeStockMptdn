<?php
$this->load->view('templates/header');
?>


<title>Flux Matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<!--<input id="exception" type="hidden" value="<?php // echo $exception;              ?>">-->

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('templates/bienvenue_left'); ?>

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
                                    <!--<img src="<?php // echo base_url();                                             ?>/assets/images/img.jpg" alt="">-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                             ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                             ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 style="margin-left: 1%">Listes des Matériels</h3>
                        </div>

                        <div class="title_right">
                            <!--                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Search for...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default" type="button">Go!</button>
                                                                </span>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <!--</div>-->

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <!--<h2>Nos Matériels</h2>-->
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
                                    <div class="table-responsive">
                                        <a href="<?php echo base_url('index.php/nouveauMaterielController'); ?>" class="btn btn-lg btn-primary text-right">Nouveau Matériel</a>
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th>
                                                        <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                                    </th>
                                                    <th class="column-title">désignation </th>
                                                    <th class="column-title">référence </th>
                                                    <th class="column-title">famille </th>
                                                    <th class="column-title">unité </th>
                                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                    <th class="bulk-actions" colspan="7">
                                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php for ($i = 0; $i < count($materiels); $i++) { ?>
                                                    <tr class="even pointer">
                                                        <td class="a-center ">
                                                            <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                                        </td>
                                                      
                                                        <td class=" "><?php echo $materiels[$i]->designation; ?></td>
                                                        <td class=" "><?php echo $materiels[$i]->reference_materiel; ?></td>
                                                        <td class=" "><?php echo $materiels[$i]->famille; ?></td>
                                                        <td class=" "><?php echo $materiels[$i]->unite; ?></td>
                                                        <td class=" last">
                                                            <a href="#">
                                                                <form action="#" method="post">
                                                                    <a href="<?php echo base_url('index.php/listeMaterielController/ficheMateriel/' . $materiels[$i]->id_materiel); ?>" class="btn btn-primary glyphicon glyphicon-pencil"></a>
                                                                    <a href="<?php echo base_url('index.php/listeMaterielController/supprimer/' . $materiels[$i]->id_materiel) ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                                </form>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            <div class="col-sm-5">

                                            </div>
                                            <div class="col-sm-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
                                                    <ul class="pagination">
                                                        <?php if ($pagination->getFirst() == 1) { ?>
                                                            <li class="paginate_button previous disabled" id="datatable-checkbox_previous">
                                                                <a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="paginate_button previous" id="datatable-checkbox_previous">
                                                                <a href="<?php echo base_url('index.php/listeMaterielController/previousPage/' .$pagination->getFirst()) ; ?>" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
                                                            </li>
                                                        <?php } ?>
                                                        <?php for ($i = $pagination->getFirst(); $i < $pagination->getLast(); $i++) { ?>
                                                            <?php if ($page == $i) { ?>
                                                                <li class="paginate_button active">
                                                                    <a href="#" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo $i; ?></a>
                                                                </li>   
                                                                <?php continue; ?>
                                                            <?php } ?>

                                                            <li class="paginate_button">
                                                                <a href="<?php echo base_url('index.php/listeMaterielController/page/' . $i); ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo $i; ?></a>
                                                            </li>
                                                        <?php } ?>

                                                        <?php if ($pagination->getLast() == $pagination->getSizePage()) { ?>
                                                            <li class="paginate_button next disabled" id="datatable-checkbox_next">
                                                                <a href="#" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a>
                                                            </li>
                                                        <?php } else { ?> 
                                                            <li class="paginate_button next" id="datatable-checkbox_next">
                                                                <a href="<?php echo base_url('index.php/listeMaterielController/nextPage/'.$pagination->getLast()) ?>" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a>
                                                            </li>
                                                        <?php } ?>  
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /page content -->
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>
            <?php $this->load->view('templates/footer'); ?>

            <script src="<?php echo base_url("assets"); ?>/vendors/validator/validator.js"></script>

            </body>
            </html>