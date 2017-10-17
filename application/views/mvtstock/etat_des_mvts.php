<?php
$this->load->view('templates/header');
?>

<title>Etats des mouvements des stocks</title>

</head>

<!-- Trigger the modal with a button -->
<!-- Modal -->
<input id="exception" type="hidden" value="<?php echo $exception; ?>">
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

                        <!--<div class="title_right">-->
                        <div class="text-left">
                            <h3>Etat des mouvements des stocks</h3>
                        </div>
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_panel">
                            <div class="form-inline">
                                <form action="<?php echo base_url('index.php/etatDesMvtsStocksController/etat') ?>" method="post">
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                        <input type="text" style="width: 400px" name="entre" id="reservation" class="form-control">
                                    </div>
                                    <input class="btn btn-default" type="submit" value="voir etats">
                                </form>
                            </div>
                        </div>

                        <!--                        <form class="form-horizontal">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <div class="controls">
                                                        <div class="input-prepend input-group">
                                                          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                          <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2016 - 01/25/2016">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </form>-->

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                          <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                        </th>
                                        <th class="column-title text-left">Référence </th>
                                        <th class="column-title text-left">Matériel </th>
                                        <th class="column-title text-right">Quantité initiale </th>
                                        <th class="column-title text-right">Entrée</th>
                                        <th class="column-title text-right">Sortie</th>
                                        <th class="column-title text-right">Quantité finale </th>
                                        <th class="column-title text-left">Unité </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 0; $i < count($etats); $i++) { ?>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                          <!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
                                            </td>
                                            <td class="text-left "><?php echo $etats[$i]->getReference(); ?></td>
                                            <td class="text-left "><?php echo $etats[$i]->getMateriel(); ?></td>
                                            <td class="text-right "><?php echo $etats[$i]->getQuantiteInitiale(); ?> </td>
                                            <td class="text-right "><?php echo $etats[$i]->getEntree(); ?></td>
                                            <td class="text-right "><?php echo $etats[$i]->getSortie(); ?></td>
                                            <td class="text-right "><?php echo $etats[$i]->getQuantiteFinale(); ?></td>
                                            <td class="text-left "><?php echo $etats[$i]->getUnite(); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <form action="<?php echo base_url('index.php/etatDesMvtsStocksController/exporterExcel'); ?>" method="post">
                                <input type="hidden" name="du" value="<?php echo $du; ?>">
                                <input type="hidden" name="jusqua" value="<?php echo $jusqua; ?>">
                                <button type="submit" class="btn btn-success"> <span class="fa fa-file-excel-o"> télécharger </span></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /page content -->

            <?php $this->load->view('templates/footer'); ?>

            <!-- bootstrap-daterangepicker -->
            <script src="<?php echo base_url("assets"); ?>/vendors/moment/min/moment.min.js"></script>
            <script src="<?php echo base_url("assets"); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


            <script>
                $(document).ready(function () {
                    $("#entre").change(function () {
                        console.log($("#entre").val());
                    });

                    if ($("#exception").val() != "") {
                        alert($('#exception').val());
                    }

                    var du = (new Date());
                    du.setMonth(du.getMonth() - 3);

                    $('input[name="entre"]').daterangepicker(
                            {
                                locale: {
                                    format: 'DD-MM-YYYY'
                                },
                                startDate: du,
                                endDate: new Date()
                            },
                            function (start, end, label) {
//                                alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                            });

                });
            </script>


            </body>

            </html>