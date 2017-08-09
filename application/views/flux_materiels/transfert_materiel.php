<?php
$this->load->view('templates/header');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>

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
                            <a href="#"><?php // echo $fournisseurs[$i]->societe;                                          ?> </a>
                        </div>


                        <div class="form-group">
                            <form>
                                <div class="container-fluid">

                                    <h1>Choisissez le matériel!</h1>
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
                            <!--<img src="<?php // echo base_url()                                                        ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">-->
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
                                    <!--<img src="<?php // echo base_url();                                                        ?>/assets/images/img.jpg" alt="">-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                        ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                        ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                    <div class="col-md-12 col-sm-12 col-xs-5">
                        <div class="page-title">
                            <div class="text-center">
                                <h3>Transferts Matériels</h3>
                            </div>
                        </div>
                    </div>
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
                            <form method="post" action="<?php echo base_url("index.php/TransfertFluxMateriel/ajouterTransfert"); ?>" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Transfert</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="type" class="select2_single form-control" name="type" tabindex="-1">
                                            <?php if (!empty($transfert) && ($transfert === "Loc")) { ?>
                                                <option value="envoie">envoie</option>
                                            <?php } else { ?>
                                                <option value="emprunts">Emprunts</option>s
                                                <option value="retour emprunts">Retour Emprunts</option>
                                                <option value="prets">Prêts</option>
                                                <option value="retour prets">Retour prêts</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Récupération </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if (!empty($recuperation)) { ?>
                                            <input id="datetimepickerr" name="recuperation" value="<?php echo $recuperation; ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } else { ?>
                                            <input id="datetimepickerr" name="recuperation" value="" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } ?> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantité</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if (!empty($quantite)) { ?>
                                            <input id="quantite" name="quantite" value="<?php echo $quantite; ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } else { ?>
                                            <input id="quantite" name="quantite" value="" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } ?>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Porte Source</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if (!empty($porte_source)) { ?>
                                            <input id="porte_source" name="porte_source" value="<?php echo $porte_source; ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } else { ?>
                                            <input id="porte_source" name="porte_source" value="" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        <?php } ?>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Porte Destinataire</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if (!empty($porte_dest)) { ?>
                                            <?php if (!empty($transfert) && ($transfert === "Loc")) { ?>
                                                <input id="porte_dest" value="<?php echo $porte_dest; ?>" name="porte_dest" value="null" class="form-control col-md-7 col-xs-12" type="text">
                                            <?php } else { ?>
                                                <input id="porte_dest" value="<?php echo $porte_dest; ?>" name="porte_dest" value="null" class="form-control col-md-7 col-xs-12" type="text">
                                            <?php } ?> 
                                        <?php } else { ?>
                                            <input id="porte_dest" readonly="" name="porte_dest" value="null" class="form-control col-md-7 col-xs-12" type="text">
                                        <?php } ?> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ref matériel <span class="required"></span>

                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if (!empty($refmateriel)) { ?>
                                            <input name="refmateriel" type="text" value="<?php echo $refmateriel; ?>" readonly="" class="form-control" id="refmateriel" placeholder="">
                                        <?php } else { ?>
                                            <input name="refmateriel" type="text" value="" readonly="" class="form-control" id="refmateriel" placeholder="">
                                        <?php } ?> 
                                    </div>

                                    <div>
                                        <button id="parcourir" type="button" class="btn btn-info">...</button>
                                    </div>

                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="button" id="verifierChecks" class="btn btn-block btn-primary">Ajouter</button>
                                    </div>
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

                        <form action="<?php echo base_url("index.php/transfertFluxMateriel/enregistrerTransfert"); ?>" method="post">
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
    <!--                                                        <input type="hidden" name="indiceSortie" value="<?php // echo $i;                                                       ?>">
                                                        <input type="hidden" name="pour" value="<?php // echo $pour;                                                       ?>">
                                                        <input type="hidden" name="dateMvt" value="<?php // echo $dateMvt;                                                       ?>">
                                                        <input type="hidden" name="dateValue" value="<?php // echo $dateValue;                                                       ?>">
                                                        <input type="hidden" name="commentaire" value="<?php // echo $commentaire;                                                       ?>">-->
                                                        <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                        <a href="<?php echo base_url('index.php/transfertFluxMateriel/suppression/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </table>
                                <br><br>
                                <div class="form-group">
                                    <label class="control-label">Date:
                                    </label>
                                    <div class="">
                                        <input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst"/>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="control-label">Commentaire:</label>
                                    <div class="">
                                        <textarea id="textarea" name="commentaire" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-lg btn-success" value="Enregistrer">
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                        </div>
                    </div>
                </div>

            </div>
            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <script>
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
                            $("#listemateriel").append('<div class="row">\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                                <label>' + json.recherche[i].designation + '</label>\n\
                                                        </div>\n\
                                                        <div class="col-sm-12 col-md-12">\n\
                                                            <input type="hidden" value="' + json.recherche[i].reference_materiel + '">\n\
                                                            <button type="button" class="btn btn-primary choisir_materiel">choisir</button>\n\
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
                                            <option value="retour emprunts">Retour Emprunts</option>\n\
                                            <option value="prets">Prêts</option>\n\
                                            <option value="retour prets">Retour prêts</option>');

                            $("#porte_dest").val('null');
                            $("#porte_dest").prop('readonly', true);

                        } else {
                            $("#porte_source").prop('readonly', false);

                            $("#porte_dest").replaceWith('<input id="porte_dest" readonly="" name="porte_dest" value="<?php echo set_value('porte_dest'); ?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">');

                            $("#porte_dest").prop('readonly', false);

//                            $("#porte_source").val('');

                            $("#refmateriel").prop('readonly', false);
                            $("#refmateriel").val('');

                            $("#type").children('option').remove();
                            $("#type").append('<option value="envoie" selected="selected">envoie</option>');
                        }
                    });

                    $("#type").change(function () {
                        $("#refmateriel").prop('readonly', false);
                        $("#refmateriel").val('');

                        if ($("#type").val() == "emprunts") {
                            $("#porte_source").prop('readonly', false);
                            $("#porte_source").val('');
                            $("#porte_dest").val('null');
                            $("#refmateriel").val('null');
                            $("#porte_dest").prop('readonly', true);
                            $("#refmateriel").prop('readonly', true);

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

                        var value = $('#reference0').val();

                        for (var i = 1; i < t; i++) {
                            value += ";" + $('#reference' + i + '').val();
                        }

                        $.ajax({
                            url: '<?php echo base_url("index.php/transfertFluxMateriel/ajouterTransfert"); ?>',
                            type: 'POST',
                            data: 'quantite=' + $("#quantite").val() + '&porte_source=' + $("#porte_source").val() + '&porte_dest=' + $("#porte_dest").val() + '&transfert=' + $("#transfert").val() + '&type=' + $("#type").val() + '&refmateriel=' + $("#refmateriel").val() + '&listereference=' + value + '&recuperation=' + $('#datetimepickerr').val(),
                            dataType: 'json',
                            success: function (json, statut) {
                                window.location.replace("<?php echo base_url(); ?>index.php/transfertFluxMateriel");
                            },
                            error: function (resultat, statut, erreur) {
                                alert(resultat.responseText);
                                $('#myModalCheck').modal('toggle');
                                window.location.replace("<?php echo base_url(); ?>index.php/transfertFluxMateriel?quantite=" + $("#quantite").val() + "&porte_source=" + $("#porte_source").val() + "&porte_dest=" + $("#porte_dest").val() + "&transfert=" + $("#transfert").val() + "&type=" + $("#type").val() + "&refmateriel=" + $("#refmateriel").val() + "&listereference=" + value + "&recuperation=" + $('#datetimepickerr').val() + "&transfert=" + $("#transfert").val() + "");
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

            <script src="<?php echo base_url('assets/datetimepicker-master/build'); ?>/jquery.datetimepicker.full.js"></script>
            <script src="<?php echo base_url('assets/myJs/dateTimePicker.js') ?>"></script>
            </body>

            </html>