<?php
$this->load->view('templates/header');
?>


<title>Bon de sortie</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

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
                            <h3>BON DE SORTIE</h3>
                        </div>

                        <div class="title_right">

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Liste <small> bon de sortie </small></h2>

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
                                    <div class="text-left">
                                        <a href="<?php echo base_url('index.php/sortieStockController'); ?>" class="btn btn-lg btn-primary">Nouvelle Sortie</a>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>date</th>
                                                <th>commentaire</th>
                                                <th>bon de sortie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($sorties); $i++) { ?>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td><a href="#"><?php echo $sorties[$i]->getDateMvtFormatted(); ?></a></td>
                                                    <td><?php echo $sorties[$i]->getCommentaire(); ?></td>
                                                    <td>
                                                        <!--<div class="fa-hover col-md-3 col-sm-4 col-xs-12">-->
                                                        <a href="<?php echo base_url('index.php/sortieStockController/bon/' . $sorties[$i]->getId()); ?>"><i class="fa fa-file-pdf-o"></i> télécharger</a>
                                                        <!--</div>-->
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
                                        <ul class="pagination">
                                            <?php if ($pagination->getFirst() == 1) { ?>
                                                <li class="paginate_button previous disabled" id="datatable-checkbox_previous">
                                                    <a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="paginate_button previous" id="datatable-checkbox_previous">
                                                    <a href="<?php echo base_url('index.php/sortieStockController/previousPage/' . $pagination->getFirst()); ?>" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a>
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
                                                    <a href="<?php echo base_url('index.php/sortieStockController/page/' . $i); ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo $i; ?></a>
                                                </li>
                                            <?php } ?>

                                            <?php if ($pagination->getLast() == $pagination->getSizePage()) { ?>
                                                <li class="paginate_button next disabled" id="datatable-checkbox_next">
                                                    <a href="#" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a>
                                                </li>
                                            <?php } else { ?> 
                                                <li class="paginate_button next" id="datatable-checkbox_next">
                                                    <a href="<?php echo base_url('index.php/sortieStockController/nextPage/' . $pagination->getLast()) ?>" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0">Next</a>
                                                </li>
                                            <?php } ?>  
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /page content -->
            </div>


            <?php $this->load->view('templates/footer'); ?>

            <script>

                function initListeMateriel(json) {
                $("#listemateriel").children().remove();
                for (var i = 0; i < json.recherche.length; i++) {
                $("#listemateriel").append('<div class="row">\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                                <label>' + json.recherche[i].designation + '</label>\n\
                                                        </div>\n\
                                                        <div class="col-sm-12 col-md-12">\n\
\n\                                                         <input type="hidden" value="' + json.recherche[i].designation + '">\n\
\n\                                                         <input type="hidden" value="' + json.recherche[i].id_materiel + '">\n\
                                                            <input type="hidden" value="' + json.recherche[i].reference_materiel + '">\n\
                                                            <button type="button" class="btn btn-primary choisir_materiel fa fa-check"></button>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <br><br>');
                }
                $(".choisir_materiel").click(function () {
                $("#materiel").val($(":focus").prev().val());
                $("#idMateriel").val($(":focus").prev().prev().val());
                $("#nommateriel").val($(":focus").prev().prev().prev().val());
                $('#myModalMateriel').modal('toggle');
                });
                }





                $(document).ready(function () {

                $(".fournisseur").click(function () {

                $("#fournisseur").val($(":focus").parent().prev().children("a").text());
                $("#id_fournisseur").val($(":focus").prev().val());
                $('#myModal').modal('toggle');
                });
                $(".materiels").click(function () {
                $("#materiel").val($(":focus").parent().prev().children("a").text());
                $("#idMateriel").val($(":focus").prev().val());
                $('#myModalMateriel').modal('toggle');
                });
                $("#idfamille").change(function () {

                $.ajax({
                url: '<?php echo base_url("index.php/AjaxController/rechercheMateriel"); ?>',
                        type: 'POST',
                        data: 'idfamille=' + $("#idfamille").val() + '&materiel=' + $("#recherchem").val(),
                        dataType: 'json',
                        success: function (json, statut) {
                        initListeMateriel(json);
//                                alert("success");
                        },
                        error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
                        alert("echec");
                        },
                        complete: function (resultat, statut) {
                        // alert("sdfds");
                        }
                });
                });
                $("#recherchem").keyup(function (touche) {
                $.ajax({
                url: '<?php echo base_url("index.php/AjaxController/rechercheMateriel"); ?>',
                        type: 'POST',
                        data: 'idfamille=' + $("#idfamille").val() + '&materiel=' + $("#recherchem").val(),
                        dataType: 'json',
                        success: function (json, statut) {

                        initListeMateriel(json);
//                                alert("success");
                        },
                        error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
                        alert("echec");
                        },
                        complete: function (resultat, statut) {
                        // alert("sdfds");
                        }
                });
                });
                $("#parcourirMateriel").click(function () {
                $('#myModalMateriel').modal('toggle');
                $.ajax({
                url: '<?php echo base_url("index.php/AjaxController/rechercheMateriel"); ?>',
                        type: 'POST',
                        data: 'idfamille=' + $("#idfamille").val() + '&materiel=' + $("#recherchem").val(),
                        dataType: 'json',
                        success: function (json, statut) {
                        initListeMateriel(json);
//                                alert("success");
                        },
                        error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
                        alert("echec");
                        },
                        complete: function (resultat, statut) {
                        // alert("sdfds");
                        }
                });
                });
                $("#confirmer").click(function () {

                $("#myModalConfirmation").modal("toggle");
                $("#dateconf").val($("#dateMvt").val());
                $("#comconf").val($("#textarea").val());
                });
//                    $("#confirmation_entrees").click(function () {
//                        console.log("1111");
//
//                        $.ajax({
//                            url: '<?php // echo base_url("index.php/entreeStockController/entreenregistrerAjax");         ?>',
//                            type: 'POST',
//                            data: 'dateMvt=' + $("#dateMvt").val() + '&commentaire=' + $("#textarea").val(),
//                            dataType: 'json',
//                            success: function (json, statut) {
//                                $("#myModalConfirmation").modal("toggle");
//                                alert("Enregistrement réussie");
//                            },
//                            error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
//                            },
//                            complete: function (resultat, statut) {
//                                // alert("sdfds");
//                            }
//                        });
//                    });

                var now = new Date();
                $('#dateMvt').val(now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + now.getDate() + " " + now.getHours() + ":" + now.getMinutes());
                if ($("#exception").val() != "") {
                alert($('#exception').val());
                }
                });
            </script>

            <script src="<?php echo base_url('assets/AngularJS') ?>/angular.min.js"></script>
            <script src="<?php echo base_url('assets/AngularJS/angular-1.5.8') ?>/angular-route.min.js"></script>

            <script src="<?php echo base_url('assets/AngularJS/angular-1.5.8') ?>/angular-resource.min.js"></script>

            <script src="<?php echo base_url('assets/AngularJS') ?>/myJS/app.js"></script>

            <script src="<?php echo base_url('assets/AngularJS') ?>/myJS/controller.js"></script> 

            <script src="<?php echo base_url('assets/AngularJS') ?>/myJS/services.js"></script>

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>
            </html>