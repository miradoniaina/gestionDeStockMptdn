<?php
$this->load->view('templates/header');
?>

<?php
$sousSorties = unserialize($this->session->userdata("sousSortie"));
?>
<title>Sorties des Stocks</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->
<input id="exception" type="hidden" value="<?php echo $exception; ?>">

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
                            <a href="#"><?php // echo $fournisseurs[$i]->societe; ?> </a>
                        </div>

                        <div class="form-group">
                            <form>
                                <div class="container-fluid">
                                    <h2>Choix du matériel</h2>
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

<div id="myModalConfirmation" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body" >
                <form action="#<?php // echo base_url('SortieStockController/enregistrerSortieAjax')       ?>" method="post">
                    <div class="row text-center">
                        Etes-vous sûres?
                    </div>

                    <div class="row text-center">
                        <div class="row text-center">
                            <div class="form-group text-center">
<!--                                <input type="text" id="confpour" name="pour"> 
                                <input type="text" id="conDateValue" name="dateValue"> 
                                <input type="text" id="condate" name="dateMvt"> 
                                <input type="text" id="confporte" name="porte"> 
                                <input type="hidden" id="confdetenteurs" name="detenteurs"> -->
                                <input type="hidden" id="confIdDetenteurs" name="idDetenteurSorties">
                                <!--<input type="text" id="confCommentaire" name="commentaire">-->

<!--<input type="submit" class="btn btn-success" value="Oui">&nbsp;&nbsp;&nbsp;&nbsp;-->
                                <button type="button" id="confirmation_sorties" class="btn btn-success">Oui</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


<div id="myModalConfirmationReinit" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body" >
                <form action="#<?php // echo base_url('SortieStockController/enregistrerSortieAjax')       ?>" method="post">
                    <div class="row text-center">
                        Etes-vous sûres?
                    </div>

                    <div class="row text-center">
                        <div class="row text-center">
                            <div class="form-group text-center">
                                <button type="button" id="confirmation_reinit" class="btn btn-success">Oui</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


<div id="myModalCheck" class="modal fade container-fluid" role="dialog">
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
                                        <button type="button" id="ajouterTransfert" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<div id="myModalPorte" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Portes</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="row">
                        <div style="margin-top: 1%;" class="col-sm-6 text-right">

                        </div>

                        <div class="form-group">
                            <form>
                                <div class="container-fluid">
                                    <h2>Numéro de porte</h2>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-6">
                                            <select class="select2_single form-control" id="id_departement" name="departement">
                                                <option value=""></option>
                                                <?php for ($i = 0; $i < count($departements); $i++) { ?>
                                                    <option value="<?php echo $departements[$i]->id_departement; ?>"><?php echo $departements[$i]->departement; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
                                            <select class="select2_single form-control" name="id_direction" id="id_direction">
                                                <?php for ($i = 0; $i < count($direction); $i++) { ?>
                                                    <option value="<?php echo $direction[$i]->id_direction; ?>"><?php echo $direction[$i]->nom_direction; ?></option>
                                                <?php } ?>
                                                <option value="">Autre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br>
                                    <div id="listePorte">

                                    </div>
                                    <br>
                                    <div class="row">
                                        <a href="<?php echo base_url('index.php/nouveauMaterielController/'); ?>" class="btn btn-lg btn-default">Nouvelle Porte</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<div id="myModalDetenteur" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Détenteur</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <form>
                        <?php for ($i = 0; $i < count($personnels); $i++) { ?>
                            <div class="checkbox">
                                <label>
                                    <input id="check<?php echo $i; ?>" type="checkbox" value="<?php echo $personnels[$i]->prenom; ?>"><?php echo $personnels[$i]->nom . " " . $personnels[$i]->prenom; ?>
                                    <input type="hidden" value="<?php echo $personnels[$i]->id_personnel; ?>" name="idDetenteur"  id="idDetenteur<?php echo $i; ?>">
                                </label>
                            </div>
                        <?php } ?>
                        <button type="button" id="valider_detenteur" class="btn btn-success">valider</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
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
                            <h3 style="margin-left: 2%;">Sorties des Stocks</h3>
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
                    <div class="clearfix text-right" style="margin-right: 1%">
                        <a href="<?php echo base_url('index.php/sortieStockController/sorties') ?>" class="btn btn-lg btn-primary">Bon de sortie</a>
                        <br><br>
                    </div>

                    <br>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sortie</h2>
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
                                <form method="post" action="<?php echo base_url("index.php/sortieStockController/ajouterSortie"); ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantité</label>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input id="quantite" name=quantite value="<?php echo set_value('quantite'); ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Référence: <span class="required"></span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" name="reference" value="<?php echo set_value('reference'); ?>" class="form-control" id="materiel" placeholder="">
                                            <!--<input type="hidden" name="idMateriel" class="form-control" id="idMateriel" name="idMateriel" readonly="readonly" placeholder="">-->
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-info" id="parcourirMateriel" data-toggle="modal" data-target="#myModalMateriel">...</button> 
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
                                            <!--<input type="submit" class="btn btn-block btn-primary" value="Ajouter" >-->
                                            <button type="button" id="verifierChecks" class="btn btn-block btn-primary" >Ajouter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sorties à enregistrer <small>enregistrements des sorties multiples</small></h2>
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


                                <div class="x_content">

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Matériel</th>
                                                <th>Quantité</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($sousSorties); $i++) { ?>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td><?php echo $sousSorties[$i]->getMateriel(); ?></td>
                                                    <td><?php echo $sousSorties[$i]->getQuantite(); ?></td>

                                                    <td>
                                                        <form action="<?php echo base_url('index.php/sortieStockController/modifierSousSortie') ?>" method="post">
                                                            <input type="hidden" name="indiceSortie" value="<?php echo $i; ?>">
                                                            <input type="hidden" name="pour" value="<?php echo $pour; ?>">
                                                            <input type="hidden" name="dateMvt" value="<?php echo $dateMvt; ?>">
                                                            <input type="hidden" name="dateValue" value="<?php echo $dateValue; ?>">
                                                            <input type="hidden" name="commentaire" value="<?php echo $commentaire; ?>">
                                                            <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                            <a href="<?php echo base_url('index.php/sortieStockController/suppressionSousSortie/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </table>
                                    <div class="text-right">
                                        <button type="button" id="reinit" class="btn btn-warning">Réinitialiser</button>
                                    </div>

                                    <br><br>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Pour: <span class="required"></span>

                                                </label>
                                            </div>

                                            <div class="">
                                                <select id="pour" name="pour" class="form-control">
                                                    <option value="Usage interne">Usage interne</option>
                                                    <option value="Projet">Projet</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Date:
                                            </label>
                                            <div class="">
                                                <input id="dateMvt" class="form-control col-md-7 col-xs-12" type="text" autofocuss="" value="" name="dateMvt">
                                            </div>
                                        </div>     

                                        <div class="form-group">
                                            <label class="control-label">Porte:
                                            </label>
                                            <div class="">
                                                <input type="text" id="porte" name="porte"  value="<?php echo set_value('porte'); ?>" style="width:90%" class="form-control col-md-7 col-xs-12" placeholder="">
                                            </div>

                                            <div class="">
                                                &nbsp;&nbsp;<button type="button" class="btn btn-info parcourir" data-toggle="modal" data-target="#myModalPorte">...</button> 
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label">Détenteurs:
                                            </label>
                                            <div id="">
                                                <div class="demo">
                                                    <div class="control-group">
                                                        <select id="select-repeated-options" class="demo-default" multiple>
                                                            <option value="">Détenteurs...</option>
                                                            <?php for ($i = 0; $i < count($services); $i++) { ?>
                                                                <optgroup label="<?php echo $services[$i]->getService(); ?>">
                                                                    <?php for ($j = 0; $j < count($services[$i]->getPersonnels()); $j++) { ?>
                                                                        <option value="<?php echo $services[$i]->getPersonnels()[$j]->id_personnel; ?>" disabled><?php echo $services[$i]->getPersonnels()[$j]->nom . " " . $services[$i]->getPersonnels()[$j]->prenom; ?></option>
                                                                    <?php } ?>
                                                                </optgroup>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                            <div class="">
                                                                                            <input type="text" id="detenteurs" name="detenteurs" value="<?php echo set_value('detenteurs'); ?>" style="width:90%" class="form-control col-md-7 col-xs-12" id="detenteur" readonly="readonly" placeholder="">
                                                                                            <input type="text" id="idDetenteurSorties" name="idDetenteurSorties" value="<?php echo set_value('idDetenteurs'); ?>" class="form-control" id="idDetenteurSortie" name="idMateriel" readonly="readonly" placeholder="">
                                                                                        </div>
                                                                                        <div class="">
                                                                                            &nbsp;&nbsp;<button type="button" class="btn btn-info parcourir" data-toggle="modal" data-target="#myModalDetenteur">...</button> 
                                                                                        </div>-->
                                        </div>    
                                        <div class="form-group">
                                            <label class="control-label">Commentaire:</label>
                                            <div class="">
                                                <textarea id="textarea" name="commentaire" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>
                                </div>   
                            </div>

                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-lg btn-success" id="enregistrer">Enregistrer</button>
                            </form>
                        </div>

                    </div>
                </div>



                <!-- /page content -->
            </div>



            <script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/js/jquery.js"></script>
            <script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b'); ?>/dist/js/standalone/selectize.js"></script>
            <script src="<?php echo base_url('assets/selectize-selectize.js-f293d8b/examples'); ?>/js/index.js"></script>

            <link rel="stylesheet" href="<?php echo base_url('assets/selectize-selectize.js-f293d8b/dist'); ?>/css/selectize.default.css">

            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>
            <script>

                $('#select-repeated-options').selectize({
                    plugins: ['remove_button'],
                    sortField: 'text'
                });
            </script>

            <?php $this->load->view('templates/footer'); ?>

            <script>

                function initDirection(json) {

                    $("#id_direction").html('');


                    for (var i = 0; i < json.value.length; i++) {
                        $("#id_direction").append('<option value="' + json.value[i].id_direction + '">' + json.value[i].nom_direction + '</option>');
                    }
                    $("#id_direction").append('<option value="">Autre</option>');

                    //                    $("#listemateriel").children().remove();
                    //                    
                    //                    $(".choisir_materiel").click(function () {
                    //                        $("#refmateriel").val($(":focus").prev().val());
                    //                        $('#myModal').modal('toggle');
                    //                    });
                }
                ;

                function initListePorte(json) {

                    $("#listePorte").html('');
                    //                    
                    for (var i = 0; i < json.value.length; i++) {
                        $("#listePorte").append('<div class="row">\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                            <label> Porte ' + json.value[i].numero + '</label>&nbsp;&nbsp;\n\
                                                             <input type="hidden" value="' + json.value[i].numero + '"/>\n\
                                                            <button type="button" class="btn btn-primary choix_porte">choisir</button>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <br><br>');



                    }

                    $(".choix_porte").click(function () {
                        $("#porte").val($(":focus").prev('input').val());
                        $("#myModalPorte").modal('toggle');
                    });
                }


                $('#check_forms').keypress(function (e) {

                    if (e.which == 13) {
                        var nextLine = $(':focus').parent().parent().parent().next().next().children().children('div').children();

                        nextLine.focus();
                    }
                });


                $('#pour').change(function () {

                    if ($('#pour').val() == "Projet") {
                        $('#porte').prop('disabled', true);
                        $('.parcourir').prop('disabled', true);
                        var select = $("#select-repeated-options")[0].selectize.disable();

                    } else {
                        $('#porte').prop('disabled', false);
                        $('#select-repeated-options').prop('disabled', false);
                        $('.parcourir').prop('disabled', false);
                        var select = $("#select-repeated-options")[0].selectize.enable();
                    }

                });


                $("#valider_detenteur").click(function () {
                    var inputs = $("#valider_detenteur").parent().find("input");

                    var val = "";
                    var idDet = "";

                    for (var i = 0; i < inputs.length; i++) {

                        if ($("#check" + i).is(':checked')) {
                            if (val.localeCompare("") == 0) {
                                val += $("#check" + i).val();
                                idDet += $("#idDetenteur" + i).val();
                                continue;
                            }
                            val += ";" + $("#check" + i).val();
                            idDet += ";" + $("#idDetenteur" + i).val();
                        }
                    }

                    $("#detenteurs").val(val);

                    $("#idDetenteurSorties").val(idDet);

                    $("#myModalDetenteur").modal("toggle");
                });


                $("#id_departement").change(function () {

                    $.ajax({
                        url: '<?php echo base_url("index.php/AjaxController/directionParDepartement"); ?>',
                        type: 'POST',
                        data: 'iddepartement=' + $("#id_departement").val(),
                        dataType: 'json',
                        success: function (json, statut) {
                            initDirection(json);
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

                $("#id_direction").change(function () {
                    $.ajax({
                        url: '<?php echo base_url("index.php/AjaxController/recherchePorte"); ?>',
                        type: 'POST',
                        data: 'id_direction=' + $("#id_direction").val(),
                        dataType: 'json',
                        success: function (json, statut) {
                            initListePorte(json);
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

                $("#ajouterTransfert").click(function () {
                    $('#myModalCheck').modal('toggle');

                    var t = parseInt($('#check_forms').children('div').find('input').length);

                    var value = $('#reference0').val();

                    for (var i = 1; i < t; i++) {
                        value += ";" + $('#reference' + i + '').val();
                    }

                    $.ajax({
                        url: '<?php echo base_url("index.php/SortieStockController/ajouterSortieAjax"); ?>',
                        type: 'POST',
                        data: 'quantite=' + $("#quantite").val() + '&porte=' + $("#porte").val() + '&detenteurs=' + $("#detenteur").val() + '&idDetenteurSorties=' + $("#idDetenteurSorties").val() + '&reference=' + $("#materiel").val() + '&listereference=' + value,
                        dataType: 'json',
                        success: function (json, statut) {
                            window.location.replace("<?php echo base_url(); ?>index.php/SortieStockController");
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

                $("#verifierChecks").click(function () {
                    $('#myModalCheck').modal('toggle');
                    $('#check_forms').html('');

                    console.log(parseInt($('#quantite').val()));

                    $('#check_forms').prepend('<input type="hidden" id="quantite" value="' + $("#quantite").val() + '"/>\n\
                                                    <input type="hidden" id="porte_source" value="' + $("#porte_source").val() + '"/>\n\
                                                    <input type="hidden" id="porte_dest" value="' + $("#porte_dest").val() + '"/>\n\
                                                    <input type="hidden" id="refmateriel" value="' + $("#refmateriel").val() + '"/>\n\
                        ');

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

                $("#enregistrer").click(function (e) {
                    var idets = "";
                    if ($("#select-repeated-options").val() !== null) {
                        var det = $("#select-repeated-options").val();
                        idets = det[0];
                        for (var i = 1; i < parseInt(det.length); i++) {
                            idets += (";" + det[i]);
                        }
                    }

                    $('#confIdDetenteurs').val(idets);

                    $("#myModalConfirmation").modal("toggle");
                });


                $("#confirmation_sorties").click(function (e) {

                    $.ajax({
                        url: '<?php echo base_url("index.php/SortieStockController/enregistrerSortieAjax"); ?>',
                        type: 'POST',
                        data: 'pour=' + $("#pour").val() + '&dateMvt=' + $("#dateMvt").val() + '&porte=' + $("#porte").val() + '&idDetenteurSorties=' + $("#confIdDetenteurs").val() + '&commentaire=' + $("#textarea").val(),
                        dataType: 'json',
                        success: function (json, statut) {
//                                console.log("success1");
                            $("#myModalConfirmation").modal("toggle");
                            alert("Enregitrement réussie");
                            window.location.replace("<?php echo base_url(); ?>index.php/SortieStockController");
//                                $("#myModalSuccess").modal("toggle");

                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

                $("#ok").click(function (e) {
                    $.ajax({
                        url: '<?php echo base_url("index.php/SortieStockController/reinitSessionSortiesAjax"); ?>',
                        type: 'POST',
//                        data: '',
                        dataType: 'json',
                        success: function (json, statut) {
                            $("#myModalConfirmation").modal("toggle");
//                            window.location.replace("<?php // echo base_url(); ?>index.php/SortieStockController");
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

                $("#reinit").click(function (e) {
                    $("#myModalConfirmationReinit").modal("toggle");
                });

                
                 $("#confirmation_reinit").click(function (e) {
                    $.ajax({
                        url: '<?php echo base_url("index.php/SortieStockController/reinitSessionSortiesAjax"); ?>',
                        type: 'POST',
//                        data: '',
                        dataType: 'json',
                        success: function (json, statut) {
                            $("#myModalConfirmationReinit").modal("toggle");
                            window.location.replace("<?php echo base_url(); ?>index.php/SortieStockController");
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });

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

                $("#parcourirMateriel").click(function () {
//                        $('#myModalMateriel').modal('toggle');
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

                if ($("#exception").val() != "") {
                    alert($('#exception').val());
                }

                $(document).ready(function () {
                    var now = new Date();
                    $('#dateMvt').val(now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + now.getDate() + " " + now.getHours() + ":" + now.getMinutes());

                });
            </script>

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>

            </body>

            </html>