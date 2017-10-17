<?php
$this->load->view('templates/header');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>

<title>Flux Matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModalCheck" class="modal fade container-fluid" rfole="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Checks des matériels</h4>
            </div>
            <div class="modal-body" >
                <form>
                    <div class="row" id="check_forms">

                    </div>

                    <div class="row" id="valid_checks">
                        <div class="row">
                            <div class="form-group">
                                <form action="<?php echo base_url("index.php/transfertFluxMateriel/ajouterTransfert"); ?>" method="post">
                                    <label for="middle-name" class="control-label col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12 text-right"></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="button" id="ajouterRetour" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 style="margin-left: 3%">Retour Matériels</h3>
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
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Retour</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <!--                                    <ul class="dropdown-menu" role="menu">
                                                                            <li><a href="#">Settings 1</a>
                                                                            </li>
                                                                            <li><a href="#">Settings 2</a>
                                                                            </li>
                                                                        </ul>-->
                                </li>
                                <li><a><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content" style="display: block;">
                            <br>
                            <form method="post" action="<?php echo base_url('index.php/retourMaterielController/valider'); ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Référence</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="reference" name="reference" value="" class="form-control col-md-7 col-xs-12" type="text">

                                    </div>
                                </div>

                                <!--                                <div class="form-group">
                                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantité(s)</label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input id="quantite" name="porte_source" value="" class="form-control col-md-7 col-xs-12" type="text">
                                
                                                                    </div>
                                                                </div>-->



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <!--<button type="button" id="verifierChecks" class="btn btn-block btn-primary">Ajouter</button>-->
                                        <button type="submit" class="btn btn-block btn-primary">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Transferts</h2>
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
                                            <label>
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
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-checkbox" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 5px;">#</th>
                                                    <th>Date du transfert</th>
                                                    <th>Commentaire</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($transferts); $i++) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="">
                                                            <a href="<?php // echo base_url('index.php/retourMaterielController/detailRetourMateriel/' . $transferts[$i]->getId())  ?>"><?php // echo $i + 1;  ?></a>
                                                        </td>
                                                        <td class="">
                                                            <a href="<?php echo base_url('index.php/retourMaterielController/detailRetourMateriel/' . $transferts[$i]->getId()) ?>"><?php echo $transferts[$i]->getDateTransfertFormat(); ?></a>
                                                        </td>
                                                        <td class="">
                                                            <a href="<?php echo base_url('index.php/retourMaterielController/detailRetourMateriel/' . $transferts[$i]->getId()) ?>"><?php echo $transferts[$i]->getCommentaire(); ?></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="text-left">
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
                                                                <a href="<?php echo base_url('index.php/retourMaterielController/page/' . $i); ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo $i; ?></a>
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

            <!-- /page content -->
            <?php $this->load->view('templates/footer'); ?>

            <script>
                $(document).ready(function () {
                    
                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }


                    $("#verifierChecks").click(function () {
                        $('#myModalCheck').modal('toggle');

                        $('#check_forms').html('');

                        for (var i = 0; i < parseInt($('#quantite').val()); i++) {
                            $('#check_forms').prepend('<div class="row">\n\
                                                    <div class="form-group">\n\
                                                        <label for="middle-name" class="control-label col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-12 text-right">Référence:</label>\n\
                                                        <div class="col-md-6 col-sm-6 col-xs-12">\n\
                                                            <input id="reference' + i + '" name="ref" value="" class="form-control col-md-7 col-xs-12" type="text" data-parsley-id="11">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div><br>');
                        }
                    });

                    $("#ajouterRetour").click(function () {
                        var t = parseInt($('#check_forms').children('div').find('input').length);

                        var value = $('#reference' + (t - 1)).val();

                        console.log(value);

                        for (var i = t - 2; i > -1; i--) {
                            value += ";" + $('#reference' + i + '').val();
                        }

                        $.ajax({
                            url: '<?php echo base_url("index.php/ajaxController/ajouterRetourAjax"); ?>',
                            type: 'POST',
                            data: 'quantite=' + $("#quantite").val() + '&reference=' + $("#reference").val() + '&listereference=' + value,
                            dataType: 'json',
                            success: function (json, statut) {
                                console.log(json);
                                window.location.replace("<?php echo base_url(); ?>index.php/retourMaterielController");
                            },
                            error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
//                                $('#myModalCheck').modal('toggle');
//                                window.location.replace("<?php // echo base_url();   ?>index.php/retourMaterielController?quantite=" + $("#quantite").val() + "&porte_source=" + $("#porte_source").val() + "&porte_dest=" + $("#porte_dest").val() + "&transfert=" + $("#transfert").val() + "&type=" + $("#type").val() + "&refmateriel=" + $("#refmateriel").val() + "&listereference=" + value + "&recuperation=" + $('#datetimepickerr').val() + "&transfert=" + $("#transfert").val() + "");
                            },
                            complete: function (resultat, statut) {
                                // alert("sdfds");

                            }
                        });
                    });
                });
            </script>

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>

            </html>