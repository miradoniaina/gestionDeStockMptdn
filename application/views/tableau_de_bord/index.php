<?php
$this->load->view('templates/header');
?>



<title>Tableau de bord</title>
</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->
<?php // var_dump($inventaires); ?>
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
                            <h1 style="margin-left: 1%">Tableau de bord</h1>
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
                    <div class="clearfix"></div>


                    <!-- top tiles -->
                    <div class="row tile_count">
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-legal"></i> Total Matériels</span>
                            <div class="count green"><a href="#" class="green"><?php echo $totalMateriels ?></a></div>
                            <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-truck"></i> Total Mouvement des stocks</span>
                            <div class="count green"><a href="#" class="green"><?php echo $totalMvtStocks ?></a></div>
                            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-arrows-h"></i> Total Transfert Matériels</span>
                            <div class="count"><a href="#" class="green"><?php echo $totalTransferts ?></a></div>
                            <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-arrows-h"></i> Total Retour Matériels</span>
                            <div class="count green"><a href="#" class="green"><?php echo $totalRetourMateriels; ?></a></div>
                            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
                        </div>
                    </div>
                    <!-- /top tiles -->

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="dashboard_graph">

                                <div class="row x_title">
                                    <div class="col-md-8">
                                        <h3>Stocks restants <small>Graph spline symbols</small></h3>
                                    </div>
                                    <div class="form-inline col-md-4">
                                        <!--                                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                                                    <span>August 24, 2017 - September 22, 2017</span> <b class="caret"></b>
                                                                                </div>-->
                                        <input class="form-control" id="dateEtatSpline" value="2017" style="width:100px;" type="text" />
                                        <button class="btn btn-dark" id="valideDateEtatSpline" style="margin-top: 5px;">valider</button>
                                    </div>
                                </div>

                                <!--<div class="col-md-9 col-sm-9 col-xs-12">-->
                                <!--                                    <div id="chart_plot_01" class="demo-placeholder" style="padding: 0px; position: relative;">
                                                                        <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 623px; height: 280px;" width="623" height="280"></canvas>
                                                                            <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                                                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                                                                    <div style="position: absolute; max-width: 121px; top: 263px; left: 20px; text-align: center;" class="flot-tick-label tickLabel">Jan 01</div>
                                                                                    <div style="position: absolute; max-width: 121px; top: 263px; left: 117px; text-align: center;" class="flot-tick-label tickLabel">Jan 02</div>
                                                                                    <div style="position: absolute; max-width: 121px; top: 263px; left: 214px; text-align: center;" class="flot-tick-label tickLabel">Jan 03</div>
                                                                                    <div style="position: absolute; max-width: 121px; top: 263px; left: 311px; text-align: center;" class="flot-tick-label tickLabel">Jan 04</div>
                                                                                    <div style="position: absolute; max-width: 121px; top: 263px; left: 408px; text-align: center;" class="flot-tick-label tickLabel">Jan 05</div><div style="position: absolute; max-width: 121px; top: 263px; left: 505px; text-align: center;" class="flot-tick-label tickLabel">Jan 06</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 250px; left: 13px; text-align: right;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; top: 231px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">10</div><div style="position: absolute; top: 212px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">20</div><div style="position: absolute; top: 192px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">30</div><div style="position: absolute; top: 173px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">40</div><div style="position: absolute; top: 154px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">50</div><div style="position: absolute; top: 135px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">60</div><div style="position: absolute; top: 115px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">70</div><div style="position: absolute; top: 96px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">80</div><div style="position: absolute; top: 77px; left: 7px; text-align: right;" class="flot-tick-label tickLabel">90</div><div style="position: absolute; top: 58px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">100</div><div style="position: absolute; top: 38px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">110</div><div style="position: absolute; top: 19px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">120</div><div style="position: absolute; top: 0px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">130</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 623px; height: 280px;" width="623" height="280">
                                                                            
                                                                        </canvas>
                                                                    </div>-->
                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                <!--</div>-->
                                <!--                                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                                                                    <div class="x_title">
                                                                        <h2>Top Campaign Performance</h2>
                                                                        <div class="clearfix"></div>
                                                                    </div>²
                                
                                                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                                                        <div>
                                                                            <p>Facebook Campaign</p>
                                                                            <div class="">
                                                                                <div class="progress progress_sm" style="width: 76%;">
                                                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" style="width: 80%;" aria-valuenow="79">
                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <p>Twitter Campaign</p>
                                                                            <div class="">
                                                                                <div class="progress progress_sm" style="width: 76%;">
                                                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60" style="width: 60%;" aria-valuenow="59">
                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                                                        <div>
                                                                            <p>Conventional Media</p>
                                                                            <div class="">
                                                                                <div class="progress progress_sm" style="width: 76%;">
                                                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40" style="width: 40%;" aria-valuenow="38">
                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <p>Bill boards</p>
                                                                            <div class="">
                                                                                <div class="progress progress_sm" style="width: 76%;">
                                                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" style="width: 50%;" aria-valuenow="48">
                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                
                                                                </div>-->

                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                    <br>

                </div>
                <!-- /page content -->
            </div>

            <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('assets/datetimepicker-master/'); ?>/jquery.datetimepicker.css"/>-->
            <?php $this->load->view('templates/footer'); ?>

            <script>
                $(document).ready(function () {
                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }
                });
            </script>

            <style type="text/css">
                .highcharts-credits{
                    font-size: 0px !important;
                };
            </style>
            <script src="<?php echo base_url('assets/hightchart/code'); ?>/highcharts.js"></script>
            <link href="<?php echo base_url('assets/jquery-year-picker-master'); ?>/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css"/>
            
            <script src="<?php echo base_url('assets/jquery-year-picker-master'); ?>/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/jquery-year-picker-master'); ?>/js/jquery.ui.yearpicker.min.js" type="text/javascript"></script>
            
            <script type="text/javascript">


                $(document).ready(function () {
                    var serieval = [];
                    var dataval = [];

                    $.ajax({
                        url: '<?php echo base_url("index.php/AjaxController/getGraphs"); ?>',
                        type: 'POST',
//                            data: 'idfamille=' + $("#idfamille").val() + '&materiel=' + $("#recherchem").val(),
                        dataType: 'json',
                        success: function (json, statut) {

                            for (var i = 0; i < parseInt(json[0].length); i++) {
                                dataval = [];

                                dataval.push(parseInt(json[0][i].quantite_restant));

                                for (var j = 1; j < parseInt(json.length); j++) {
                                    dataval.push(parseInt(json[j][i].quantite_restant));
                                }

                                serieval.push(
                                        {
                                            name: json[0][i].famille,
                                            marker: {
                                                symbol: 'square',
                                            },
                                            data: dataval

                                        });
                            }


                            Highcharts.chart('container', {
                                chart: {
                                    type: 'spline'
                                },
                                title: {
                                    text: 'Variation des stocks par mois'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Quantité(s)'
                                    },
                                    labels: {
                                        formatter: function () {
                                            return this.value;
                                        }
                                    }
                                },
                                tooltip: {
                                    crosshairs: true,
                                    shared: true
                                },
                                plotOptions: {
                                    spline: {
                                        marker: {
                                            radius: 2,
                                            lineColor: '#666666',
                                            lineWidth: 1
                                        }
                                    }
                                },
                                series: serieval
                            });


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



                $("#dateEtatSpline").yearpicker({
                    maxDate: new Date(),
                    changeYear: true
                });
                
                $("#valideDateEtatSpline").click(function(){
                    var serieval = [];
                    var dataval = [];

                    $.ajax({
                        url: '<?php echo base_url("index.php/AjaxController/getGraphs"); ?>/'+$("#dateEtatSpline").val(),
                        type: 'POST',
//                            data: 'idfamille=' + $("#idfamille").val() + '&materiel=' + $("#recherchem").val(),
                        dataType: 'json',
                        success: function (json, statut) {

                            for (var i = 0; i < parseInt(json[0].length); i++) {
                                dataval = [];

                                dataval.push(parseInt(json[0][i].quantite_restant));

                                for (var j = 1; j < parseInt(json.length); j++) {
                                    dataval.push(parseInt(json[j][i].quantite_restant));
                                }

                                serieval.push(
                                        {
                                            name: json[0][i].famille,
                                            marker: {
                                                symbol: 'square',
                                            },
                                            data: dataval

                                        });
                            }


                            Highcharts.chart('container', {
                                chart: {
                                    type: 'spline'
                                },
                                title: {
                                    text: 'Variation des stocks par mois'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Quantité(s)'
                                    },
                                    labels: {
                                        formatter: function () {
                                            return this.value;
                                        }
                                    }
                                },
                                tooltip: {
                                    crosshairs: true,
                                    shared: true
                                },
                                plotOptions: {
                                    spline: {
                                        marker: {
                                            radius: 2,
                                            lineColor: '#666666',
                                            lineWidth: 1
                                        }
                                    }
                                },
                                series: serieval
                            });


                        },
                        error: function (resultat, statut, erreur) {
//                                alert(resultat.responseText);
                            alert("echec");
                        },
                        complete: function (resultat, statut) {
                            // alert("sdfds");
                        }
                    });
                })
                
            </script>
            </body>

            </html>