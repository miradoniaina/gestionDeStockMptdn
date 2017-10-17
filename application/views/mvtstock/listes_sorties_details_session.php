<?php
$this->load->view('templates/header');

$sousCommande = unserialize($this->session->userdata("sousMvt"));
?>

<title>Sorties à enregistrer</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->

<input id="exception" type="hidden" value="<?php echo $exception; ?>">
</div>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('templates/bienvenue_left'); ?>

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
                                <h3>Sorties en cours</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">

                            <div class="row x_title">
                                <div class="col-md-6">
                                    <h3>Listes <small>Sorties en cours</small></h3>
                                </div>
                                <div class="col-md-6">
                                    <!--                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                          <span>June 14, 2017 - July 13, 2017</span> <b class="caret"></b>
                                                        </div>-->
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th>
                                                  <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                                </th>
                                                <th class="column-title">Matériel</th>
                                                <th class="column-title">Quantité</th>
                                                <th class="column-title">Porte</th>
                                                <th class="column-title">Détenteurs</th>
                                                <th class="column-title">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php for ($i = 0; $i < count($sorties); $i++) { ?>
                                                <tr class="even pointer">
                                                    <td class="a-center ">
                                                  <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                                    </td>
                                                    <td class=" "><?php echo $sorties[$i]->getMateriel(); ?></td>
                                                    <td class=" "><?php echo $sorties[$i]->getQuantite(); ?></td>
                                                    <td class=" "><?php echo $sorties[$i]->getPorte(); ?> </td>
                                                    <td class=" "><?php echo $sorties[$i]->getDetenteurs(); ?></td>
                                                    <td>
                                                        <form action="<?php echo base_url('index.php/sortieStockController/modifierSousSortie') ?>" method="post">
                                                            <input type="hidden" name="indiceSortie" value="<?php echo $i; ?>">
                                                            <input type="hidden" name="pour" value="<?php echo $pour; ?>">
                                                            <input type="hidden" name="dateMvt" value="<?php echo $dateMvt; ?>">
                                                            <input type="hidden" name="dateValue" value="<?php echo $dateValue; ?>">
                                                            <input type="hidden" name="commentaire" value="<?php echo $commentaire; ?>">
                                                            <button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                                                            <button type="submit" name="suppression" value="suppression" class="btn btn-danger glyphicon glyphicon-remove"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form action="<?php echo base_url('index.php/sortieStockController/enregistrerSortie'); ?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pour: <span class="required"></span>

                                            </label>

                                            <div class="">
                                                <select id="pour" name="pour" class="form-control">

                                                    <option>Usage interne</option>

                                                    <?php if (set_value('pour') == "Projet") { ?>
                                                        <option selected="">Projet</option>
                                                    <?php } else { ?>
                                                        <option>Projet</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!--</div>-->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Date:
                                            </label>
                                            <div class="">
                                                <input id="input_01" data-value="<?php echo set_value('dateValue'); ?>" class="form-control col-md-7 col-xs-12 datepicker picker__input" type="text" autofocuss="" data-valuee="2014-08-08" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="input_01_root" name="">
                                                <input id="dateMvt" type="hidden" name="dateMvt" value="<?php echo set_value('dateMvt'); ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Porte:
                                            </label>
                                            <div class="">
                                                <input type="text" id="porte" name="porte" value="<?php echo set_value('porte'); ?>" style="width:90%" class="form-control col-md-7 col-xs-12" placeholder="">
                                            </div>
                                            <div class="">
                                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info parcourir" data-toggle="modal" data-target="#myModalPorte">...</button> 
                                            </div>
                                        </div>    

                                        <div class="form-group">
                                            <label class="control-label">Détenteurs:
                                            </label>
                                            <div class="">
                                                <input type="text" id="detenteurs" name="detenteurs" value="<?php echo set_value('detenteurs'); ?>" style="width:90%" class="form-control col-md-7 col-xs-12" id="detenteur" readonly="readonly" placeholder="">
                                                <input type="hidden" name="idDetenteurSorties" value="<?php echo set_value('idDetenteurSorties'); ?>" class="form-control" id="idDetenteurSortie" name="idMateriel" readonly="readonly" placeholder="">
                                            </div>
                                            <div class="">
                                                &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info parcourir" data-toggle="modal" data-target="#myModalDetenteur">...</button> 
                                            </div>
                                        </div>    


                                        <div class="form-group">
                                            <label class="control-label">Commentaire:</label>
                                            <div class="">
                                                <textarea id="textarea" name="commentaire" required="required" class="form-control col-md-7 col-xs-12"><?php echo set_value('commentaire'); ?></textarea>
                                            </div>
                                        </div>


                                        <input type="submit" class="btn btn-lg btn-success" value="enregistrer">
                                    </form>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <script>
                $(document).ready(function () {
                    $(".fournisseur").click(function () {
                        $("#fournisseur").val($(":focus").parent().prev().children("a").text());
                        $("#id_fournisseur").val($(":focus").prev().val());
                        $('#myModal').modal('toggle');
                    });

                    $('#pour').change(function () {
                        if ($('#pour').val() == "Projet") {
                            $('#porte').prop('disabled', true);
                            $('#detenteurs').prop('disabled', true);
                            $('.parcourir').prop('disabled', true);
                        } else {
                            $('#porte').prop('disabled', false);
                            $('#detenteurs').prop('disabled', false);
                            $('.parcourir').prop('disabled', false);
                        }
                    });

                    $(".materiels").click(function () {
                        $("#materiel").val($(":focus").parent().prev().children("a").text());
                        $("#idMateriel").val($(":focus").prev().val());
                        $('#myModalMateriel').modal('toggle');
                    });

                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }

                    if ($('#pour').val() == "Projet") {
                        $('#porte').prop('disabled', true);
                        $('#detenteurs').prop('disabled', true);
                        $('.parcourir').prop('disabled', true);
                    } else {
                        $('#porte').prop('disabled', false);
                        $('#detenteurs').prop('disabled', false);
                        $('.parcourir').prop('disabled', false);
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

            <!--<script src="<?php // echo base_url('assets/pickadate.js-master/tests/jquery.1.7.0.js');                ?>"></script>-->


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
