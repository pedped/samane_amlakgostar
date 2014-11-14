<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/css/chosen.css">
<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.css">
<script src="<?php echo theme_url(); ?>/assets/js/chosen.jquery.js"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.js"></script>

<?php
$curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en';
?>

<style type="text/css">

    .up,.down{color:#fff;}

    .up:hover,.down:hover{color:#fff;}

</style>

<div class="row">

    <?php require_once 'rightsearch.php'; ?>

    <?php $current_url = base64_encode(current_url() . '/#data-content'); ?>

    <div class="col-md-9 "  style="-webkit-transition: all 0.7s ease-in-out; transition: all 0.7s ease-in-out;">

        <div class="detail-title"><i class="fa fa-building-o"></i>&nbsp;نتایج
            <?php require'switcher_view.php'; ?>
        </div>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <div class="alert alert-success">
            <div class='row'>
                <div class='col-md-8'>
                    <p style="margin-top: 8px;margin-bottom: 0;">شماره تماس خود را وارد نمایید تا املاک جدید مطابق با جستجوی شما توسط پیامک برای شما ارسال گردد</p>
                </div>
                <div class='col-md-4'>
                    <form method="post" style="margin-bottom: 0;">
                        <div class="input-group">
                            <input type="text" name="subscribephone" class="form-control" placeholder="شماره موبایل" required="true"/>
                            <div class="input-group-btn">
                                <input type="submit" name="search" class="btn btn-primary" value="دریافت" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>

        <?php
        if ($this->session->userdata('view_style') == 'list') {

            require'list_view.php';
        } else if ($this->session->userdata('view_style') == 'map') {

            $map_id = 'search_map_view';

            require'map_view.php';
        } else {

            require'grid_view.php';
        }
        ?>



        <div class="clearfix"></div>

        <div style="text-align:center">

            <ul class="pagination">

<?php echo (isset($pages)) ? $pages : ''; ?>

            </ul>

        </div>

    </div>



</div> <!-- /row -->
