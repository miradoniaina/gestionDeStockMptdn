<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <!--Logo-->
        <?php $this->load->view('templates/logo'); ?>
        <!--Logo-->

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url() ?>/assets/images/profil_personnel/<?php echo $this->session->userdata('profil'); ?>" alt="..." class="img-circle profile_img">
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