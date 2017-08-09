<?php
$this->load->view('templates/header');

$sousCommande = unserialize($this->session->userdata("sousMvt"));
?>

<title>Modification sortie <?php echo $indiceSortie + 1; ?></title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">
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
                            <!--<img src="<?php echo base_url() ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">-->
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
                                    <!--<img src="<?php echo base_url(); ?>/assets/images/img.jpg" alt="">-->
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
                                            <span class="image"><img src="<?php echo base_url('assets') ?>/images/logo.gif" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="<?php echo base_url('assets') ?>/images/logo.gif" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                                <h3>Modification</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> Sortie <small><?php echo $indiceSortie + 1; ?> </small></h2>
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
                                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url("index.php/sortieStockController/modificationSousSortie"); ?>" method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Matériel 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" disabled="" value="<?php echo $sousSortie->getMateriel(); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Quantité 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" value="<?php echo $sousSortie->getQuantite(); ?>" name="quantite" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Porte</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo $sousSortie->getPorte(); ?>" type="text" name="porte">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Détenteurs
                                        </label>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalDetenteur">...</button>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="detenteur" name="detenteur" disabled="" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $sousSortie->getDetenteurs(); ?>" >
                                            <input type="hidden" name="idDetenteurSorties" value="<?php echo $sousSortie->getIdDetenteurs(); ?>" class="form-control" id="idDetenteurSortie" readonly="readonly" placeholder="">
                                            <input type="hidden" name="indiceSousSortie" value="<?php echo $indiceSortie; ?>" class="form-control" id="idDetenteurSortie" name="idMateriel" readonly="readonly" placeholder="">

                                            <input type="hidden" name="indiceSortie" value="<?php echo $i; ?>">
                                            <input type="hidden" name="pour" value="<?php echo $pour; ?>">
                                            <input type="hidden" name="dateMvt" value="<?php echo $dateMvt; ?>">
                                            <input type="hidden" name="dateValue" value="<?php echo $dateValue; ?>">
                                            <input type="hidden" name="commentaire" value="<?php echo $commentaire; ?>">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" class="btn btn- btn-success" value="Modifier">

                                            <a href="<?php echo base_url('index.php/sortieStockController/listeSortiesDetails'); ?>" class="btn btn-primary" type="button">Annuler</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>
            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <script>
                $(document).ready(function () {
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



                        $("#detenteur").val(val);
                        $("#idDetenteurSortie").val(idDet);

                        $("#myModalDetenteur").modal("toggle");
                    });

                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }
                });
            </script>



            <section class="section">

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                <div id="container"><div class="picker" id="input_01_root" aria-hidden="true"><div class="picker__holder" tabindex="-1"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__header"><div class="picker__month">August</div><div class="picker__year">2014</div><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="input_01_table" title="Previous month"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="input_01_table" title="Next month"> </div></div><table class="picker__table" id="input_01_table" role="grid" aria-controls="input_01" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1406408400000" role="gridcell" aria-label="27 July, 2014">27</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1406494800000" role="gridcell" aria-label="28 July, 2014">28</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1406581200000" role="gridcell" aria-label="29 July, 2014">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1406667600000" role="gridcell" aria-label="30 July, 2014">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1406754000000" role="gridcell" aria-label="31 July, 2014">31</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1406840400000" role="gridcell" aria-label="1 August, 2014">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1406926800000" role="gridcell" aria-label="2 August, 2014">2</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407013200000" role="gridcell" aria-label="3 August, 2014">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407099600000" role="gridcell" aria-label="4 August, 2014">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407186000000" role="gridcell" aria-label="5 August, 2014">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407272400000" role="gridcell" aria-label="6 August, 2014">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407358800000" role="gridcell" aria-label="7 August, 2014">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407445200000" role="gridcell" aria-label="8 August, 2014">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407531600000" role="gridcell" aria-label="9 August, 2014">9</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407618000000" role="gridcell" aria-label="10 August, 2014">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407704400000" role="gridcell" aria-label="11 August, 2014">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407790800000" role="gridcell" aria-label="12 August, 2014">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407877200000" role="gridcell" aria-label="13 August, 2014">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1407963600000" role="gridcell" aria-label="14 August, 2014">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408050000000" role="gridcell" aria-label="15 August, 2014">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408136400000" role="gridcell" aria-label="16 August, 2014">16</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408222800000" role="gridcell" aria-label="17 August, 2014">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408309200000" role="gridcell" aria-label="18 August, 2014">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--selected picker__day--highlighted" data-pick="1408395600000" role="gridcell" aria-label="19 August, 2014" aria-selected="true" aria-activedescendant="true">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408482000000" role="gridcell" aria-label="20 August, 2014">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408568400000" role="gridcell" aria-label="21 August, 2014">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408654800000" role="gridcell" aria-label="22 August, 2014">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408741200000" role="gridcell" aria-label="23 August, 2014">23</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408827600000" role="gridcell" aria-label="24 August, 2014">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1408914000000" role="gridcell" aria-label="25 August, 2014">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409000400000" role="gridcell" aria-label="26 August, 2014">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409086800000" role="gridcell" aria-label="27 August, 2014">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409173200000" role="gridcell" aria-label="28 August, 2014">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409259600000" role="gridcell" aria-label="29 August, 2014">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409346000000" role="gridcell" aria-label="30 August, 2014">30</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1409432400000" role="gridcell" aria-label="31 August, 2014">31</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409518800000" role="gridcell" aria-label="1 September, 2014">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409605200000" role="gridcell" aria-label="2 September, 2014">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409691600000" role="gridcell" aria-label="3 September, 2014">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409778000000" role="gridcell" aria-label="4 September, 2014">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409864400000" role="gridcell" aria-label="5 September, 2014">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1409950800000" role="gridcell" aria-label="6 September, 2014">6</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1496869200000" aria-controls="input_01" disabled="disabled">Today</button><button class="picker__button--clear" type="button" data-clear="1" aria-controls="input_01" disabled="disabled">Clear</button><button class="picker__button--close" type="button" data-close="true" aria-controls="input_01" disabled="disabled">Close</button></div></div></div></div></div></div></div>

                <input type="text">

            </section>

            <link rel="stylesheet" href="<?php echo base_url('assets/pickadate.js-master/lib/themes/default.css'); ?>">

            <link rel="stylesheet" href="<?php echo base_url('assets/pickadate.js-master/lib/themes/default.date.css'); ?>">

            <!--<script src="<?php // echo base_url('assets/pickadate.js-master/tests/jquery.1.7.0.js');             ?>"></script>-->


            <script src="<?php echo base_url('assets/pickadate.js-master/lib/picker.js'); ?>"></script>

            <script src="<?php echo base_url('assets/pickadate.js-master/lib/picker.date.js'); ?>"></script>

            <script src="<?php echo base_url('assets/pickadate.js-master/lib/legacy.js'); ?>"></script>

            <script type="text/javascript">

                // Extend the default picker options for all instances.
                $.extend($.fn.pickadate.defaults, {
                    monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                    today: 'aujourd\'hui',
                    clear: 'effacer',
                    formatSubmit: 'yyyy/mm/dd'
                })

                var $input = $('.datepicker').pickadate({
                    formatSubmit: 'dd/mm/yyyy',
                    min: [2015, 7, 14],
                    container: '#container',
                    // editable: true,
                    closeOnSelect: true,
                    closeOnClear: false,
                    selectYears: true,
                    selectMonths: true,
                    containerHidden: '#dateMvt',
                    hiddenName: true
                })

                var picker = $input.pickadate('picker');

//                console.log(picker.get('view', 'yyyy/mm/dd'));

                picker.on({
                    open: function () {
                        console.log('Opened up!')
                    },
                    close: function () {
                        console.log('Closed now')
                    },
                    render: function () {
                        console.log('Just rendered anew')
                    },
                    stop: function () {
                        console.log('See ya')
                    },
                    set: function (thingSet) {
                        $("#dateMvt").val(picker.get('select', 'dd-mm-yyyy'));
                    }
                })

            </script>
            </body>

            </html>