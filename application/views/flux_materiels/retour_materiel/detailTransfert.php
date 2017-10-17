<?php
$this->load->view('templates/header');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>

<title>Flux Matériels</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">


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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Retours Matériels <small>A enregistrer</small></h2>
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
                                <br>
                                <form action="<?php echo base_url('index.php/retourMaterielController/enregistrer') ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
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
                                                <?php for ($i = 0; $i < count($retours); $i++) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="">
                                                            <a href="<?php echo base_url('index.php/retour_materiel/ListeTransfertController/transfertDetails/$idTransfert/transfertDetails/' . 7) ?>"><?php echo $i + 1; ?></a>
                                                        </td>
                                                        <td class="">
                                                            <a href="<?php echo base_url('index.php/retour_materiel/ListeTransfertController/transfertDetails/$idTransfert/transfertDetails/' . 7) ?>"><?php echo $retours[$i]->getDesignationMateriel(); ?></a>
                                                        </td>
                                                        <td class="">
                                                            <a href="<?php echo base_url('index.php/retour_materiel/ListeTransfertController/transfertDetails/' . 7) ?>"><?php echo $retours[$i]->getQuantite(); ?></a>
                                                        </td>
                                                        <td>
                                                            <form action="<?php echo base_url('index.php/sortieStockController/modifierSousSortie') ?>" method="post">
    <!--                                                                <input type="hidden" name="indiceSortie" value="<?php // echo $i;  ?>">
                                                                <input type="hidden" name="pour" value="<?php // echo $pour;  ?>">
                                                                <input type="hidden" name="dateMvt" value="<?php // echo $dateMvt;  ?>">
                                                                <input type="hidden" name="dateValue" value="<?php // echo $dateValue;  ?>">
                                                                <input type="hidden" name="commentaire" value="<?php // echo $commentaire;  ?>">-->
                                                                <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                                <a href="<?php echo base_url('index.php/sortieStockController/suppressionSousSortie/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                        <br><br>
                                        <div class="text-right">
                                            <button type="button" id="ok" class="btn btn-warning">Réinitialiser</button>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Date:
                                            </label>
                                            <div class="">
                                                <input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst">
                                                <input type="hidden" name="idTransfert" value=<?php echo $transfert->getId(); ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Commentaire:</label>
                                            <div class="">
                                                <textarea id="textarea" name="commentaire" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Transfert <small>du : <?php echo $transfert->getDateTransfertFormat(); ?></small></h2>
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
                                    <li>
                                        <a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                    <div class="message_wrapper">
                                        <h4 class="heading">Commentaire</h4>
                                        <blockquote class="message"><?php echo $transfert->getCommentaire(); ?> </blockquote>
                                        <br>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading">Récuperation Avant le: </h4>
                                        <blockquote class="message"><?php echo $transfert->getDateRecuperationFormat(); ?></blockquote>
                                        <br>
                                    </div>

                                    <div class="message_wrapper">
                                        <h4 class="heading">Transfert </h4>
                                        <blockquote class="message"><?php echo $transfert->getTransfert(); ?></blockquote>
                                        <br>
                                    </div>

                                    <div class="message_wrapper">
                                        <h4 class="heading">Type </h4>
                                        <blockquote class="message"><?php echo $transfert->getType(); ?></blockquote>
                                        <br>
                                    </div>


                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <h2>Détails du transfert</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <!--                                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                                                        </div>-->
                                        </div>


                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                                <tr class="headings">
                                                    <th class="column-title">Matériel </th>
                                                    <th class="column-title">Qte restant </th>
<!--                                                    <th class="column-title">porte source </th>
                                                    <th class="column-title">porte dest </th>
                                                    <th class="column-title">Récupération </th>
                                                    <th class="column-title">transfert </th>
                                                    <th class="column-title no-link last"><span class="nobr">type</span>-->
                                                    <!--</th>-->
                                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php for ($i = 0; $i < count($transferts); $i++) { ?>
                                                    <tr class="even pointer">
                                                        <td class="a-center ">
                                                            <div style="position: relative;">
                                                                <?php echo $transferts[$i]->getDesignationMateriel(); ?>
                                                            </div>
                                                        </td>
                                                        <td class=" "><?php echo $transferts[$i]->getQuantiteRestant() ?></td>
    <!--                                                        <td class=" "><?php // echo $transferts[$i]->getNumeroPorteSource();    ?></td>
                                                        <td class=" "><?php // echo $transferts[$i]->getNumeroPorteDest();    ?></td>
                                                        <td class=" "><?php // echo $transferts[$i]->getDateRecuperationFormat();    ?></td>
                                                        <td class=" "><?php // echo $transferts[$i]->getTransfert();    ?></td>
                                                        <td class="a-right a-right "><?php // echo $transferts[$i]->getType();    ?></td>-->
                                                        <td class=" last">
                                                            <input id="idTransfert" value="<?php echo $transfert->getId(); ?>" class="form-control col-md-7 col-xs-12" type="hidden" data-parsley-id="11">
                                                            <input id="idSousTransfert" value="<?php echo $transferts[$i]->getId(); ?>" class="form-control col-md-7 col-xs-12" type="hidden" data-parsley-id="11">
                                                            <input  value="<?php echo $transferts[$i]->getIdMateriel(); ?>" class="form-control col-md-7 col-xs-12" type="hidden" data-parsley-id="11">
                                                            <button class="fa fa-check btn btn-primary"></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
                function initListeRef(t) {
                    var listeRef = '';

                    if ($('#reference' + 0 + '').val() != '') {
                        listeRef += $('#reference' + 0 + '').val()
                    }

                    for (var i = 1; i < t; i++) {
                        if ($('#reference' + i + '').val() != '') {
                            listeRef += ';' + $('#reference' + i + '').val()
                        }
                    }

                    return listeRef;
                }

                $(document).ready(function () {
                    
                    $('#check_forms').keypress(function (e) {
                        
                        if (e.which == 13) {
                            var nextLine = $(':focus').parent().parent().parent().next().next().children().children('div').children();
                            nextLine.focus();
                        }

                    });
                    
                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }

                    $(".fa-check").click(function () {
                        $('#myModalCheck').modal('toggle');
                        var qte = parseInt($(":focus").parent().prev().text());

                        $('#check_forms').html('');

                        var reference = $(":focus").prev().val();
                        var idDetailTransfert = $(":focus").prev().prev().val();
                        var idTransfert = $(":focus").prev().prev().prev().val();

                        $('#check_forms').append('<input name="ref" id="referenceAjax" value="' + reference + '" type="hidden" >');
                        $('#check_forms').append('<input name="idDetailTransfert" id="idDetailTransfert" value="' + idDetailTransfert + '" type="hidden" >');
                        $('#check_forms').append('<input name="idTransfert" id="idTransfert" value="' + idTransfert + '" type="hidden" >');
//
                        for (var i = 0; i < qte; i++) {
                            $('#check_forms').append('<div class="row">\n\
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

                        var listeRef = initListeRef(t);
                        var qte = listeRef.split(";").length;
                        var reference = $('#referenceAjax').val();
                        var idDetailTransfert = $('#idDetailTransfert').val();
                        var idTransfert = $('#idTransfert').val();


                        $.ajax({
                            url: '<?php echo base_url("index.php/ajaxController/ajouterRetourAjax"); ?>',
                            type: 'POST',
                            data: 'quantite=' + qte + '&reference=' + reference + '&listereference=' + listeRef + '&idDetailTransfert=' + idDetailTransfert,
                            dataType: 'json',
                            success: function (json, statut) {
                                console.log(json);
                                $('#myModalCheck').modal('toggle');
                                window.location.replace("<?php echo base_url(); ?>index.php/retourMaterielController/detailRetourMateriel/" + idTransfert);
                            },
                            error: function (resultat, statut, erreur) {
                                alert(resultat.responseText);
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