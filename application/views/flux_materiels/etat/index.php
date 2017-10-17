<?php
$this->load->view('templates/header');
?>


<title>Etat des flux matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->
<?php // var_dump($inventaires); ?>
<input id="exception" type="hidden" value="<?php echo $exception; ?>">


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('templates/bienvenue_left'); ?>

            <!-- top navigation -->
            <?php $this->load->view('templates/top_navigation') ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 style="margin-left: 3%">Etat des flux matériels</h3>
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

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
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

                                <form method="get" action="<?php echo base_url('index.php/etatFluxMaterielController/inventaire') ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" accept-charset="utf-8">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <!--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">-->
                                            <!--<input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst"/>-->
                                            <input type="text" name="dateinventaire" class="form-control col-md-7 col-xs-12" value="<?php echo $date_inventaire; ?>" id="mydatepickerinventaireflux">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Famille</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="famille" class="select2_single form-control" tabindex="-1">
                                                <?php for ($i = 0; $i < count($typeMateriels); $i++) { ?>
                                                    <?php if($idfamille === $typeMateriels[$i]->id_famille){ ?>
                                                <option value="<?php echo $typeMateriels[$i]->id_famille; ?>" selected=""><?php echo $typeMateriels[$i]->famille; ?></option>
                                                        <?php continue; ?>
                                                    <?php } ?>

                                                    <option value="<?php echo $typeMateriels[$i]->id_famille; ?>"><?php echo $typeMateriels[$i]->famille; ?></option>
                                                 <?php } ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Par</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="par" class="select2_single form-control" tabindex="-1">
                                                <option value="Tous"></option>

                                                <?php if ($par === 'Département') { ?>
                                                    <option value="Département" selected="">Département</option>
                                                <?php } else { ?>
                                                    <option value="Département">Département</option>
                                                <?php } ?>

                                                <?php if ($par === 'Direction') { ?>
                                                    <option value="Direction" selected="">Direction</option>
                                                <?php } else { ?>
                                                    <option value="Direction">Direction</option>
                                                <?php } ?>

                                                <?php if ($par === 'Service') { ?>
                                                    <option value="Service" selected="">Services</option>
                                                <?php } else { ?>
                                                    <option value="Service">Services</option>
                                                <?php } ?>

                                                <?php if ($par === 'Porte') { ?>
                                                    <option value="Porte" selected="">Porte</option>
                                                <?php } else { ?>
                                                    <option value="Porte">Porte</option>
                                                <?php } ?>

                                                <?php if ($par === 'Détenteur') { ?>
                                                    <option value="Détenteur" selected="">Détenteurs</option>
<?php } else { ?>
                                                    <option value="Détenteur">Détenteurs</option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Inventaire</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="x_content">

                                <div id="datatable-checkbox_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <br><br>
                                            <h2>Inventaire du <?php echo $date_inventaire; ?></h2>
                                            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action dataTable no-footer" role="grid" aria-describedby="datatable-checkbox_info">
                                                <thead>
                                                    <tr role="row" class="">
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 180px;"><?php echo $critere; ?></th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 250px;">Famille Matériel</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 190px;">Appartenant(s)</th>
                                                        <th class="sorting_desc" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;" aria-sort="descending">Prêt(s)</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 90px;">Emprunt(s)</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 90px;">Unité</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
<?php for ($i = 0; $i < count($inventaires); $i++) { ?>
                                                        <tr role="row" class="odd">
                                                            <td class=""><?php echo $inventaires[$i]->getCritere(); ?></td>
                                                            <td class="sorting_1"><?php echo $inventaires[$i]->getTypeMateriel(); ?></td>
                                                            <td class=""><?php echo $inventaires[$i]->getAppartenant(); ?></td>
                                                            <td class=""><?php echo $inventaires[$i]->getPrets();   ?></td>
                                                            <td class=""><?php // echo $transferts[$i]->prenom;   ?></td>
                                                            <td class=""><?php echo $inventaires[$i]->getUnite();   ?></td>
                                                        </tr>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <!--                                        <div class="dataTables_info" id="datatable-checkbox_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                                                                                    </div>-->

                                        </div>
                                        <div class="col-sm-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button previous disabled" id="datatable-checkbox_previous">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
                                                    </li>
                                                    <li class="paginate_button active">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0">1</a>
                                                    </li>
                                                    <li class="paginate_button ">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="2" tabindex="0">2</a>
                                                    </li>
                                                    <li class="paginate_button ">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="3" tabindex="0">3</a>
                                                    </li>
                                                    <li class="paginate_button ">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="4" tabindex="0">4</a>
                                                    </li>
                                                    <li class="paginate_button ">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="5" tabindex="0">5</a>
                                                    </li><li class="paginate_button ">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="6" tabindex="0">6</a>
                                                    </li>
                                                    <li class="paginate_button next" id="datatable-checkbox_next">
                                                        <a href="#" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>
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