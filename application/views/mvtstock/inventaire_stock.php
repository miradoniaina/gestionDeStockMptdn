<?php
$this->load->view('templates/header');
?>

<title>Inventaire des Stocks</title>
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
                            <h3 class="text-left">Inventaire des stocks à la date du: <?php echo $date; ?></h3>
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
                    <!--                <div class="row">
                                        <h3 class="text-center">Inventaire des stocks à la date du: <?php echo $date; ?></h3>
                                    </div>-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="form-group">
                                    <form action="<?php echo base_url('index.php/inventaireStockController/inventaire'); ?>" method="post">


                                        <div class="col-md-4 col-sm-4 col-xs-9">
                                            <input id="input_01" value="" data-value="2015/04/20" class="form-control col-md-7 col-xs-12 datepicker picker__input" type="text" autofocuss="" value="14 August, 2014" data-valuee="2014-08-08" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="input_01_root">
                                            <input id="dateMvt" type="hidden" name="dateMvt" value="">
                                        </div>

                                        <input class="btn btn-default" type="submit" value="inventaire">

                                    </form>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                              <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                            </th>
                                            <th class="column-title text-left">Référence </th>
                                            <th class="column-title text-left">Matériel </th>
                                            <th class="column-title text-right">Quantité en stock </th>
                                            <th class="column-title text-left">Unité </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($inventaires); $i++) { ?>
                                            <tr class="even pointer">

                                                <td class="a-center">
                                              <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                                </td>
                                                <td class=" "><?php echo $inventaires[$i]->getReference(); ?></td>
                                                <td class=" "><?php echo $inventaires[$i]->getMateriel(); ?></td>
                                                <td class="text-right"><?php echo $inventaires[$i]->getQuantiteStock(); ?> </td>
                                                <td class="text-left"><?php echo $inventaires[$i]->getUnite(); ?></td>
                                                </td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>

                                <form action="<?php echo base_url("index.php/inventaireStockController/exportExcel"); ?>" method="post">
                                    <input type="hidden" name="dateInventaire" value="<?php echo $date; ?>">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-file-excel-o"> télécharger </span> </button>
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

            <!--<script src="<?php // echo base_url('assets/pickadate.js-master/tests/jquery.1.7.0.js');              ?>"></script>-->


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
                        $("#dateMvt").val(picker.get('select', 'dd-mm-yyyy'))
                    }
                })

            </script>



            </body>

            </html>