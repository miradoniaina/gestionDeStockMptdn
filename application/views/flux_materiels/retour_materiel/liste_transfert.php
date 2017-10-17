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
           <?php $this->load->view('templates/bienvenue_left'); ?>

            <!-- top navigation -->
            <?php $this->load->view('templates/top_navigation'); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-5">
                        <div class="page-title">
                            <div class="text-center">
                                <h3>Listes des Transferts Matériels</h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2></h2>
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
                            <div id="datatable-checkbox_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="datatable-checkbox_length">
                                            <label>Matériels non récupérer 
<!--                                                <select name="datatable-checkbox_length" aria-controls="datatable-checkbox" class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries-->
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="datatable-checkbox_filter" class="dataTables_filter">
                                            <!--                                            <label>Search:
                                                                                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-checkbox">
                                                                                        </label>    -->
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action dataTable no-footer" role="grid" aria-describedby="datatable-checkbox_info">
                                            <thead>
                                                <tr role="row" class="">
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 180px;">Matériel</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 150px;">Transfert</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 75px;">Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 132px;">Quantité(s)</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 190px;">Date de récupération</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;" aria-sort="descending">Auteur du transfert</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 90px;">Porte Source</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 90px;">Porte Dest</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 150px;">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($transferts); $i++) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class=""><?php echo $transferts[$i]->designation; ?></td>
                                                        <td class="sorting_1"><?php echo $transferts[$i]->transfert ?></td>
                                                        <td class=""><?php echo $transferts[$i]->type; ?></td>
                                                        <td class=""><?php echo $transferts[$i]->quantite; ?></td>
                                                        <td class=""><?php echo $transferts[$i]->date_recuperation; ?></td>
                                                        <td class=""><?php echo $transferts[$i]->prenom; ?></td>
                                                        <td class=""><?php echo $transferts[$i]->porte_source; ?></td>
                                                        <td class="">
                                                            <?php echo $transferts[$i]->porte_dest; ?>
                                                        </td>
                                                        <th class="">
                                                            <a href="<?php echo base_url("index.php/retour_materiel/listeTransfertController/fiche/" . $transferts[$i]->id_detail_transfert); ?>" class="fa fa-check btn btn-primary"></a>
                                                        </th>
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


                <div class="row">
                    
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