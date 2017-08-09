<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Front-Office</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-truck"></i> Mouvements des Stocks <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('index.php/entreeStockController'); ?>">Entrées</a></li>
                    <li><a href="<?php echo base_url('index.php/sortieStockController'); ?>">Sorties</a></li>
                    <li><a href="<?php echo base_url('index.php/inventaireStockController'); ?>">Inventaire</a></li>
                    <li><a href="<?php echo base_url('index.php/etatDesMvtsStocksController') ?>">Etat des mouvements</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-arrows-h"></i> Flux Matériels <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('index.php/transfertFluxMateriel'); ?>">Transferts Matériels</a></li>
                    <li><a href="<?php echo base_url('index.php/RetourMaterielController'); ?>">Retours Matériels</a></li>
                    <li><a href="<?php echo base_url('index.php/retour_materiel/listeTransfertController'); ?>">Etat</a></li>
                    <li><a href="form_wizards.html">Form Wizard</a></li>
                    <li><a href="form_upload.html">Form Upload</a></li>
                    <li><a href="form_buttons.html">Form Buttons</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Admin</h3>
        
        <ul class="nav side-menu">
<!--            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="e_commerce.html">E-commerce</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project Detail</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="page_403.html">403 Error</a></li>
                    <li><a href="page_404.html">404 Error</a></li>
                    <li><a href="page_500.html">500 Error</a></li>
                    <li><a href="plain_page.html">Plain Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                </ul>
            </li>-->
            <li><a><i class="fa fa-sitemap"></i> CRUD <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <!--<li><a href="#level1_1">Level One</a>-->
                    <li><a>Matériel<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu">
                                <a href="<?php echo base_url('index.php/listeMaterielController'); ?>">Listes</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/nouveauMaterielController'); ?>">Insertion</a>
                            </li>
                            <li>
                                <a href="#level2_2">Modification</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#level1_2">Level One</a>
                    </li>
                </ul>
            </li>
            <!--<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>-->
        </ul>
    </div>
</div>


<div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="left" title="Déconnexion" href="login.html"  style="margin-left: 74%">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
</div>
