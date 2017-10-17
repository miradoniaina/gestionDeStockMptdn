<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Gestion</h3>

        <ul class="nav side-menu">
            <li>
                <a><i class="fa fa-home"></i> Acceuil<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('index.php/TableauDeBordController'); ?>">Tableau de bord</a></li>
    <!--                    <li><a href="<?php // echo base_url('index.php/RetourMaterielController');    ?>">Retours Matériels</a></li>
                    <li><a href="<?php // echo base_url('index.php/etatFluxMaterielController');    ?>">Etat</a></li>-->
                </ul>
            </li>
            <li><a><i class="fa fa-truck"></i> Mouvements des Stocks <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a href="<?php echo base_url('index.php/entreeStockController'); ?>">Entrées</a>
                    </li>

                    <li><a href="<?php echo base_url('index.php/sortieStockController'); ?>">Sorties</a></li>
                    <li><a href="<?php echo base_url('index.php/inventaireStockController'); ?>">Inventaire</a></li>
                    <li><a href="<?php echo base_url('index.php/etatDesMvtsStocksController') ?>">Etat des mouvements</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-arrows-h"></i> Flux Matériels <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('index.php/transfertFluxMateriel'); ?>">Transferts Matériels</a></li>
                    <li><a href="<?php echo base_url('index.php/RetourMaterielController'); ?>">Retours Matériels</a></li>
                    <li><a href="<?php echo base_url('index.php/etatFluxMaterielController'); ?>">Etat</a></li>
                </ul>
            </li>

        </ul>
    </div>


    <?php if ($this->session->userdata('role') == 1) { ?>
        <?php $this->load->view('templates/page_admin'); ?>
    <?php } ?>

</div>


<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="left" title="Déconnexion" href="login.html"  style="margin-left: 74%">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
