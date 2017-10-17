<?php
$this->load->view('templates/header');
?>


<title>Flux Matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">

<div id="myModalCheck" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Checker les matériels</h4>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="myModal" class="modal fade container-fluid" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Matériels</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <div class="row">
                        <div style="margin-top: 1%;" class="col-sm-6 text-right">
                            <a href="#"><?php // echo $fournisseurs[$i]->societe;                                                            ?> </a>
                        </div>


                        <div class="form-group">
                            <form>
                                <div class="container-fluid">

                                    <h1>choisissez le matériel</h1>
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
                <form action="#<?php // echo base_url('SortieStockController/enregistrerSortieAjax')  ?>" method="post">
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
                                <button type="button" id="confirmation_transfert" class="btn btn-success">Oui</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
                            <h3 style="margin-left: 3%">Transfert Matériels</h3>
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
                        <a href="<?php echo base_url('index.php/transfertFluxMateriel/transferts') ?>" class="btn btn-lg btn-primary">Bon de transfert</a>
                        <br><br>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Transfert</h2>
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
                                    <li><a><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" style="display: block;">
                                <br>
                                <form method="post" action="<?php echo base_url("index.php/TransfertFluxMateriel/ajouterTransfert"); ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""
                                      <div class="form-group">
                                        <label for="middle-name" class="control-label">Quantité:</label>
                                        <div class="">
                                            <?php if (!empty($quantite)) { ?>
                                                <input id="quantite" name="quantite" style="width:90%" value="<?php echo $quantite; ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                            <?php } else { ?>
                                                <input id="quantite" name="quantite" style="width:90%" value="" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                            <?php } ?>  
                                        </div>
                                        <!--</div>-->

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label">Ref Matériel:</label>
                                            <div class="">
                                                <?php if (!empty($refmateriel)) { ?>
                                                                    <!--<input name="refmateriel" type="text" style="width:90%" value="<?php echo $refmateriel; ?>" readonly="" class="form-control col-md-7 col-xs-12" id="refmateriel" placeholder="">-->
                                                    <input value="" id="refmateriel" name="refmateriel" style="width:90%" class="form-control col-md-7 col-xs-12" type="text">
                                                <?php } else { ?>
                                                    <!--<input name="refmateriel" type="text" style="width:90%" value="" readonly="" class="form-control" id="refmateriel" placeholder="">-->
                                                    <input value="" id="refmateriel" name="refmateriel" style="width:90%" class="form-control col-md-7 col-xs-12" type="text">
                                                <?php } ?> 
                                            </div>
                                            <div class="">
                                                &nbsp;&nbsp;<button id="parcourir" type="button" class="btn btn-info">...</button>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <!--<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">-->
                                            <button type="button" id="verifierChecks" class="btn btn-block btn-primary">Ajouter</button>
                                            <!--</div>-->
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Transferts à enregistrer <small>enregistrements des transferts multiples</small></h2>
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
                                    <tbody id="tbody">
                                        <?php for ($i = 0; $i < count($sousTransferts); $i++) { ?>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><?php echo $sousTransferts[$i]->getMateriel(); ?></td>
                                                <td><?php echo $sousTransferts[$i]->getQuantite(); ?></td>

                                                <td>
                                                    <form action="<?php echo base_url('index.php/transfertFluxMateriel/modifier') ?>" method="post">
                                                        <input type="hidden" name="indiceSortie" value="<?php // echo $i;                                                                         ?>">
                                                        <input type="hidden" name="pour" value="<?php // echo $pour;                                                                         ?>">
                                                        <input type="hidden" name="dateMvt" value="<?php // echo $dateMvt;                                                                         ?>">
                                                        <input type="hidden" name="dateValue" value="<?php // echo $dateValue;                                                                         ?>">
                                                        <input type="hidden" name="commentaire" value="<?php // echo $commentaire;                                                                         ?>">
                                                        <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                        <a href="<?php echo base_url('index.php/transfertFluxMateriel/suppression/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>  
                                </table>
                                <div class="text-right">
                                    <button type="button" id="reinit" class="btn btn-warning">Réinitialiser</button>
                                </div>
                                <br><br>
                                <form action="<?php echo base_url("index.php/transfertFluxMateriel/enregistrerTransfert"); ?>" method="post">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                                Transfert : <span class="required"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <select class="select2_single form-control" name="transfert" id="transfert" tabindex="-1">
                                                <?php if (!empty($transfert) && ($transfert === "Loc")) { ?>
                                                    <option value="Ext">Externe</option>
                                                    <option selected="" value="Loc">Locale</option>
                                                <?php } else { ?>
                                                    <option value="Ext">Externe</option>
                                                    <option value="Loc">Locale</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                                Type : <span class="required"></span>
                                            </label>
                                        </div>

                                        <div class="">
                                            <select id="type" class="select2_single form-control" name="type" tabindex="-1">
                                                <?php if (!empty($transfert) && ($transfert === "Loc")) { ?>
                                                    <option value="envoie">envoie</option>
                                                <?php } else { ?>
                                                    <option value="emprunts">Emprunts</option>s
                                                    <!--<option value="retour emprunts">Retour Emprunts</option>-->
                                                    <option value="prets">Prêts</option>
                                                    <!--<option value="retour prets">Retour prêts</option>-->
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                                Récupération : <span class="required"></span>
                                            </label>
                                        </div>

                                        <div class="">
                                            <?php if (!empty($recuperation)) { ?>
                                                <input id="datetimepickerr" name="recuperation" value="<?php echo $recuperation; ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                            <?php } else { ?>
                                                <input id="datetimepickerr" name="recuperation" value="" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                            <?php } ?> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Porte Source:
                                        </label>

                                        <div class="">
                                            <?php if (!empty($porte_source)) { ?>
                                                <input id="porte_source" value="null" readonly="" name="porte_source" value="<?php echo $porte_source; ?>" style="width:90%" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                            <?php } else { ?>
                                                <input id="porte_source" value="null" readonly="" name="porte_source" value="" class="form-control col-md-7 col-xs-12" style="width:90%" type="text" name="middle-name">
                                            <?php } ?>  
                                        </div>
                                        <div class="">
                                            &nbsp;&nbsp;<button id="" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalPorte">...</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label">Porte Destinataire:</label>
                                        <div class="">
                                            <?php if (!empty($porte_dest)) { ?>
                                                <?php if (!empty($transfert) && ($transfert === "Loc")) { ?>
                                                    <input id="porte_dest" value="<?php echo $porte_dest; ?>" name="porte_dest" style="width:90%" class="form-control col-md-7 col-xs-12" type="text">
                                                <?php } else { ?>
                                                    <input id="porte_dest" value="<?php echo $porte_dest; ?>" name="porte_dest" style="width:90%" class="form-control col-md-7 col-xs-12" type="text">
                                                <?php } ?> 
                                            <?php } else { ?>
                                                <input id="porte_dest" style="width:90%" name="porte_dest" class="form-control col-md-7 col-xs-12" type="text">
                                            <?php } ?> 
                                        </div>
                                        <div class="">
                                            &nbsp;&nbsp;<button id="" type="button" class="btn btn-info">...</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                                Date: <span class="required"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst"/>
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label">Commentaire:</label>
                                        <div class="">
                                            <textarea id="textarea" name="commentaire" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                                        </div>
                                    </div>
                                    <br> <br> <br>    

                                    <input type="button" id="enregistrer" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModalConfirmation" value="Enregistrer">
                                </form>

                            </div>


                        </div>

                    </div>
                        
                </div>
            </div>
            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <script>
                
                $("#reinit").click(function (e) {
                    $("#myModalConfirmationReinit").modal("toggle");
                });

                
                 $("#confirmation_reinit").click(function (e) {
                    $.ajax({
                        url: '<?php echo base_url("index.php/TransfertFluxMateriel/reinitSessionAjax"); ?>',
                        type: 'POST',
//                        data: '',
                        dataType: 'json',
                        success: function (json, statut) {
                            $("#myModalConfirmationReinit").modal("toggle");
                            window.location.replace("<?php echo base_url(); ?>index.php/TransfertFluxMateriel");
                        },
                        error: function (resultat, statut, erreur) {
                            alert(resultat.responseText);
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                });
                
                $("#confirmation_transfert").click(function (e) {
                    $.ajax({
                        url: '<?php echo base_url("index.php/transfertFluxMateriel/enregistrerTransfertAjax"); ?>',
                        type: 'POST',
                        data: 'transfert=' + $("#transfert").val() + '&type=' + $("#type").val() + '&recuperation=' + $("#datetimepickerr").val() + '&porte_source=' + $("#porte_source").val() + '&porte_dest=' + $("#porte_dest").val() + '&dateMvt=' + $("#datetimepickerfst").val() + '&commentaire=' + $("#textarea").val(),
                        dataType: 'json',
                        success: function (json, statut) {
//                                console.log("success1");
                            $("#myModalConfirmation").modal("toggle");
                            alert("Enregsitrerement réussie");
                            window.location.replace("<?php echo base_url(); ?>index.php/transfertFluxMateriel");
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
                
                $(document).ready(function () {
                    $('#check_forms').keypress(function (e) {

                        if (e.which == 13) {
                            var nextLine = $(':focus').parent().parent().parent().next().next().children().children('div').children();

                            nextLine.focus();
                        }
                    });

                    //écouter parcourir
                    $("#parcourir").click(function () {
                        $('#myModal').modal('toggle');

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

                    //changer liste matériel modal
                    function initSessionTransfert(json) {
                        $("#tbody").append('<tr>\n\
                                            <td scope="row"></td>\n\
                                            <td>' + json.materiel + '</td>\n\
                                            <td>' + json.quantite + '</td>\n\
                                            <td>\n\
                                                <form action="#" method="post">\n\
                                                    <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>\n\
                                                    <a href="#" class="btn btn-danger glyphicon glyphicon-remove"></a>\n\
                                                </form>\n\
                                            </td>\n\
                                        </tr>');
                    }
                    ;

                    function initListeMateriel(json) {
                        $("#listemateriel").children().remove();

                        for (var i = 0; i < json.recherche.length; i++) {
                            $("#listemateriel").append('<div class="row">&\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                                <label>' + json.recherche[i].designation + '</label>\n\
                                                        </div>\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                            <input type="hidden" value="' + json.recherche[i].reference_materiel + '">\n\
                                                            <button type="button" class="btn btn-primary choisir_materiel fa fa-check"></button>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <br><br>');
                        }
                        $(".choisir_materiel").click(function () {
                            $("#refmateriel").val($(":focus").prev().val());
                            $('#myModal').modal('toggle');
                        });
                    }
                    ;

                    $("#transfert").change(function () {
                        if ($("#transfert").val() == "Ext") {
                            $("#type").children('option').remove();
                            $("#type").append('<option value="emprunts" selected="selected">Emprunts</option>\n\
                                            <option value="prets">Prêts</option>');

                            $("#porte_source").val('null');
                            $("#porte_source").prop('readonly', true);

                        } else {
                            $("#porte_source").prop('readonly', false);
//                            $("#porte_dest").replaceWith('<input id="porte_dest" readonly="" name="porte_dest" style="width:90%" value="<?php // echo set_value('porte_dest'); ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">');
                            $("#porte_dest").val('');
                            
                            $("#porte_dest").prop('readonly', false);

                            $("#porte_source").val('');

                            $("#refmateriel").prop('readonly', false);
                            $("#refmateriel").val('');

                            $("#type").children('option').remove();
                            $("#type").append('<option value="envoie" selected="selected">envoie</option>');
                        }
                    });

                    $("#type").change(function () {

                        if ($("#type").val() == "emprunts") {
                            $("#porte_source").prop('readonly', true);
                            $("#porte_source").val('null');
                            $("#porte_dest").val('');
//                            $("#porte_source").val('null');
                            $("#porte_dest").prop('readonly', false);
//                            $("#porte_source").prop('readonly', true);

                        }
                        if ($("#type").val() == "retour emprunts") {
                            $("#porte_source").prop('readonly', true);
                            $("#porte_source").val('null');
                            $("#porte_dest").prop('readonly', false);
                            $("#porte_dest").val('');
                        }
                        if ($("#type").val() == "prets") {
                            $("#porte_source").prop('readonly', false);
                            $("#porte_source").val('');
                            $("#porte_dest").val('null');
                            $("#porte_dest").prop('readonly', true);
                        }
                        if ($("#type").val() == "retour prets") {
                            $("#porte_source").prop('readonly', true);
                            $("#porte_source").val('null');
                            $("#porte_dest").val('');
                            $("#porte_dest").prop('readonly', false);
                        }
                    });

                    $("#ajouterTransfert").click(function () {
                        var t = parseInt($('#check_forms').children('div').find('input').length);

                        var value = $('#reference' + (t - 1)).val();

                        for (var i = t - 2 ; i >= 0; i--) {
                            value += ";" + $('#reference' + i + '').val();
                        }
                        
                        $.ajax({
                            url: '<?php echo base_url("index.php/transfertFluxMateriel/ajouterTransfert"); ?>',
                            type: 'POST',
                            data: 'quantite=' + $("#quantite").val()  + '&refmateriel=' + $("#refmateriel").val() + '&listereference=' + value ,
                            dataType: 'json',
                            success: function (json, statut) {
                                window.location.replace("<?php echo base_url(); ?>index.php/transfertFluxMateriel");
                            },
                            error: function (resultat, statut, erreur) {
                                alert(resultat.responseText);
//                                $('#myModalCheck').modal('toggle');
//                                window.location.replace("<?php // echo base_url(); ?>index.php/transfertFluxMateriel?quantite=" + $("#quantite").val() + "&porte_source=" + $("#porte_source").val() + "&porte_dest=" + $("#porte_dest").val() + "&transfert=" + $("#transfert").val() + "&type=" + $("#type").val() + "&refmateriel=" + $("#refmateriel").val() + "&listereference=" + value + "&recuperation=" + $('#datetimepickerr').val() + "&transfert=" + $("#transfert").val() + "");
                            },
                            complete: function (resultat, statut) {
                                // alert("sdfds");

                            }
                        });
                    });

                    $("#verifierChecks").click(function () {

                        $('#myModalCheck').modal('toggle');
                        $('#check_forms').html('');

                        $('#check_forms').prepend('<input type="hidden" id="transfert" value="' + $("#transfert").val() + '"/>\n\
                                                    <input type="hidden" id="type" value="' + $("#type").val() + '"/>\n\
                                                    <input type="hidden" id="quantite" value="' + $("#quantite").val() + '"/>\n\
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
                                alert(resultat.responseText);
//                                alert("echec");
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

                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }

                });
            </script>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>
            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>

            </html>