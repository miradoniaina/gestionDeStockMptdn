<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>/assets/images/profil_personnel/<?php echo $this->session->userdata('profil'); ?>" alt="">
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
            </ul>
        </nav>
    </div>
</div>