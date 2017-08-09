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
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!--Logo-->
                    <?php $this->load->view('templates/logo'); ?>
                    <!--Logo-->

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <!--<img src="<?php // echo base_url()                                                                ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">-->
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
                                    <!--<img src="<?php // echo base_url();                                                                ?>/assets/images/img.jpg" alt="">-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                                ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                                            <!--<span class="image"><img src="<?php // echo base_url('assets')                                                                ?>/images/img.jpg" alt="Profile Image" /></span>-->
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
                                <h3>Retour Matériels</h3>
                            </div>
                        </div>
                    </div>
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
                            <form method="post" action="http://localhost/gestionStockEtFluxMateriels/index.php/TransfertFluxMateriel/ajouterTransfert" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Référence</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="reference" name="quantite" value="" class="form-control col-md-7 col-xs-12" type="text">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantité(s)</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="quantite" name="porte_source" value="" class="form-control col-md-7 col-xs-12" type="text">

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
                            <h2>Retour à enregistrer </h2>
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

                        <form action="<?php echo base_url('index.php/retourMaterielController/enregistrer'); ?>" method="post">
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
                                        <?php for ($i = 0; $i < count($sousRetours); $i++) { ?>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><?php echo $sousRetours[$i]->getMateriel1()->getDesigation(); ?></td>
                                                <td><?php echo $sousRetours[$i]->getQuantite(); ?></td>
                                                <td>
                                                    <form action="<?php echo base_url('index.php/transfertFluxMateriel/modifier') ?>" method="post">
    <!--                                                                                                      ?>">-->
                                                        <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                        <a href="<?php echo base_url('index.php/transfertFluxMateriel/suppression/' . $i); ?>" class="btn btn-danger glyphicon glyphicon-remove"></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <br><br>
                                <div class="form-group">
                                    <label class="control-label">Date:
                                    </label>
                                    <div class="">
                                        <input type="text" name="dateMvt" class="form-control col-md-7 col-xs-12" value="" id="datetimepickerfst">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="control-label">Commentaire:</label>
                                    <div class="">
                                        <textarea id="textarea" name="commentaire" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-lg btn-success" value="Enregistrer">
                        </form>
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
                    
                    
                    $("#verifierChecks").click(function() {
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
                    
                    $("#ajouterRetour").click(function(){
                        var t = parseInt($('#check_forms').children('div').find('input').length);

                        var value = $('#reference'+(t-1)).val();
                        
                        console.log(value);
                        
                        for (var i = t-2; i > -1; i--) {
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
//                                window.location.replace("<?php // echo base_url(); ?>index.php/retourMaterielController?quantite=" + $("#quantite").val() + "&porte_source=" + $("#porte_source").val() + "&porte_dest=" + $("#porte_dest").val() + "&transfert=" + $("#transfert").val() + "&type=" + $("#type").val() + "&refmateriel=" + $("#refmateriel").val() + "&listereference=" + value + "&recuperation=" + $('#datetimepickerr').val() + "&transfert=" + $("#transfert").val() + "");
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