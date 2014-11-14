<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/css/chosen.css">
<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.css">
<script src="<?php echo theme_url(); ?>/assets/js/chosen.jquery.js"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.js"></script>
<style type="text/css">

    .up,.down{color:#fff;}

    .up:hover,.down:hover{color:#fff;}

</style>
<?php
$curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en';
?>
<div class="row">
    <?php $current_url = base64_encode(current_url() . '/#data-content'); ?>
    <?php if (FALSE): ?>
        <div class="col-md-3">
            <?php //render_widgets('right_bar_home'); ?>
        </div>
    <?php endif; ?>
    <?php require_once 'rightsearch.php'; ?>
    <div id="data-content" class="col-md-9"  style="-webkit-transition: all 0.7s ease-in-out; transition: all 0.7s ease-in-out;">
        <div class="recent-grid"><i class="fa fa-home fa-4"></i>&nbsp;<?php echo lang_key('DBC_RECENT_PROPERTIES'); ?>
            <?php require'switcher_view.php'; ?>
        </div>                    

        <!-- Thumbnails container -->
        <?php
        $query = (isset($recents)) ? $recents : array();
        if ($this->session->userdata('view_style') == 'list') {
            require'list_view.php';
        } else if ($this->session->userdata('view_style') == 'map') {
            $map_id = 'recent_map_view';
            require'map_view.php';
        } else {
            require'grid_view.php';
        }
        ?>
        <div class="clearfix"></div>
        <?php if ($query->num_rows() > 0) { ?>
            <div class="view-more"><a class="" href="<?php echo site_url('show/properties/recent'); ?>"><?php echo lang_key('DBC_VIEW_ALL'); ?></a></div>
        <?php } ?>
        <div class="recent-grid"><i class="fa fa-home fa-4"></i>&nbsp;<?php echo lang_key('DBC_FEATURED_PROPERTIES'); ?>
            <?php require'switcher_view.php'; ?>
        </div>
        <?php
        $query = (isset($featured)) ? $featured : array();
        if ($this->session->userdata('view_style') == 'list') {
            require'list_view.php';
        } else if ($this->session->userdata('view_style') == 'map') {
            $map_id = 'featured_map_view';
            require'map_view.php';
        } else {
            require'grid_view.php';
        }
        ?>
        <!-- /Thumbnails container -->
        <div class="clearfix"></div>
        <?php if ($query->num_rows() > 0) { ?>
            <div class="view-more"><a class="" href="<?php echo site_url('show/properties/featured'); ?>"><?php echo lang_key('DBC_VIEW_ALL'); ?></a></div>
            <?php } ?>
    </div>

</div> <!-- /row -->
