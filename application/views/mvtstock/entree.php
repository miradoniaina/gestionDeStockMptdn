<?php
$this->load->view('templates/header');
?>


<title>Entrées des Stocks</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">

<div id="myModalConfirmation" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>

            <div class="modal-body" >
                <div class="row text-center">
                    Etes-vous sûres?
                </div>

                <div class="row text-center">
                    <div class="row text-center">
                        <div class="form-group text-center">
                            <form action="<?php echo base_url('index.php/entreeStockController/entreenregistrer') ?>" method="post">
                                <input type="hidden" name="dateMvt" id="dateconf">
                                <input type="hidden" name="commentaire" id="comconf">
                                <button type="submit" id="confirmation_entrees" class="btn btn-success">Oui</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog" ng-app="myApp">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fournisseur</h4>
            </div>
            <div class="modal-body">
                <div class="text-center" ng-controller="fournisseursCtrl">
                    <!--<input name="" ng-model="search" value="" type="text" class="form-control col-md-2 col-xs-12" placeholder="taper le fournisseur ici">-->
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Taper le fournisseur ici ..." ng-model="search">
                            <span class="input-group-btn">
                            </span>
                        </div>
                    </div>
                    <br><br><br><br>

                    <div class="row" ng-repeat="fournisseur in fournisseurs| orderBy:'societe' | filter : search">
                        <div style="margin-top: 1%;" class="col-sm-6 text-right">
                            <a href="#">{{fournisseur.societe}} </a>
                        </div>
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary fournisseur fa fa-check" ng-click="ajouterFournisseur(fournisseur.societe, fournisseur.id_fournisseur)"></button>
                        </div> 
                        <br> <br><br>
                    </div>
                    <br><br>
                    <div class="row">
                        <a href="<?php echo base_url('index.php/nouveauMaterielController/'); ?>" class="btn btn-lg btn-default">Nouveau fournisseur</a>
                    </div>
                </div>

                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="myModalMateriel" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Matériels</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <?php // for ($i = 0; $i < count($fournisseurs); $i++) {   ?>

                    <div class="row">
                        <div style="margin-top: 1%;" class="col-sm-6 text-right">
                            <a href="#"><?php // echo $fournisseurs[$i]->societe;                                       ?> </a>
                        </div>

                        <div class="form-group">
                            <form>
                                <div class="container-fluid">
                                    <h1>Choix du matériel</h1>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-6">
                                            <select class="select2_single form-control" id="idfamille" name="idfamille">
                                                <?php for ($i = 0; $i < count($familleMateriel); $i++) { ?>
                                                    <option value="<?php echo $familleMateriel[$i]->id_famille; ?>"><?php echo $familleMateriel[$i]->famille; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
                                            <input id="recherchem" name="porte_source" value="" type="text" class="form-control col-md-2 col-xs-12" placeholder="taper le matériel ici">
                                        </div>
                                    </div>

                                    <br>
                                    <div id="listemateriel">

                                    </div>
                                    <br>
                                    <div class="row">
                                        <a href="<?php echo base_url('index.php/nouveauMaterielController/'); ?>" class="btn btn-lg btn-default">Nouveau matériel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php // }   ?>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
                            <h3 style="margin-left: 3%">Entrées des Stocks</h3>
                        </div>

                        <div class="title_right">

                        </div>
                    </div>
                    <div class="clearfix text-right" style="margin-right: 1%">
                        <a href="<?php echo base_url('index.php/entreeStockController/entrees') ?>" class="btn btn-lg btn-primary">Bon d'entrée</a>
                        <br><br>
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Entrée</h2>
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
                                <form method="post" action="<?php echo base_url("index.php/entreeStockController/entreeajouter"); ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fournisseur <span class="required"></span>

                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input name="fournisseur" type="text" class="form-control" id="fournisseur" readonly="readonly" placeholder="" value="<?php echo set_value('fournisseur'); ?>">
                                            <input name="idFournisseur" type="hidden" id="id_fournisseur" value="<?php echo set_value('idFournisseur'); ?>">
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">...</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Matériel <span class="required"></span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" name="nommateriel" value="<?php echo set_value('materiel'); ?>" class="form-control" id="nommateriel" readonly="" placeholder="">
                                            <input type="hidden" name="materiel" value="<?php echo set_value('materiel'); ?>" class="form-control" id="materiel" readonly="" placeholder="">
                                            <input type="hidden" name="idMateriel" class="form-control" id="idMateriel" name="idMateriel" readonly="readonly" placeholder="" value="<?php echo set_value('idMateriel'); ?>">
                                        </div>

                                        <div>
                                            <button type="button" id="parcourirMateriel" class="btn btn-info">...</button>  
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantité</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" name=quantite class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo set_value('quantite'); ?>">
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-block btn-primary">Ajouter</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> Entrées à enregistrer <small>enregistrements des entrées multiples</small></h2>
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
                                    <tbody>
                                        <?php for ($i = 0; $i < count($sousEntrees); $i++) { ?>
                                            <tr>

                                                <th scope="row"></th>
                                                <td><?php echo $sousEntrees[$i]->getMateriel(); ?></td>
                                                <td><?php echo $sousEntrees[$i]->getQuantite(); ?></td>

                                                <td>
                                                    <form>
                                                        <input type="hidden" value="<?php echo $i; ?>"> 
                                                        <!--<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>-->
                                                        <a href="<?php echo base_url('index.php/entreeStockController/modifierSousEntree/' . $i); ?>" class="btn btn-primary glyphicon glyphicon-pencil"></a>
                                                        <a href="<?php echo base_url('index.php/entreeStockController/supprimerSousEntree/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                    </form>  
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </table>
                                <div class="text-right">
                                    <a href="<?php echo base_url('index.php/entreeStockController/reinitialiserEntree'); ?>" class="btn btn-warning">Réinitialiser</a>
                                </div>
                                <br><br>
                                <!--<form action="#" method="post">-->
                                <div class="form-group">
                                    <label class="control-label">Date:
                                    </label>
                                    <div class="">
                                        <input id="dateMvt" name="dateMvt" value="" data-value="2015/04/20" class="form-control col-md-7 col-xs-12 datepicker picker__input" type="text">
                                        <!--<input id="dateMvt" type="text" name="dateMvt" value="">-->
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="control-label">Commentaire:</label>
                                    <div class="">
                                        <textarea id="textarea" name="commentaire" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

                                <button type="button" id="confirmer" class="btn btn-lg btn-primary">Enregistrer</button>
                            </div>


                        </div>

                    </div>
                </div>
                <!-- /page content -->
            </div>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>

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
//                            url: '<?php // echo base_url("index.php/entreeStockController/entreenregistrerAjax"); ?>',
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

            <script src="<?php echo base_url('assets/angularjs') ?>/angular.min.js"></script>
            <script src="<?php echo base_url('assets/angularjs/angular-1.5.8') ?>/angular-route.min.js"></script>

            <script src="<?php echo base_url('assets/angularjs/angular-1.5.8') ?>/angular-resource.min.js"></script>

            <script src="<?php echo base_url('assets/angularjs') ?>/myjs/app.js"></script>

            <script src="<?php echo base_url('assets/angularjs') ?>/myjs/controller.js"></script> 

            <script src="<?php echo base_url('assets/angularjs') ?>/myjs/services.js"></script>

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>
            </html>