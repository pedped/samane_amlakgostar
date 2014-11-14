<?php
$curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en';

if ($user->num_rows() <= 0) {
    ?>

    <div class="alert alert-danger">کاربر یافت نگردید</div>

    <?php
} else {

    $user = $user->row();
    ?>

    <div class="row">



    <?php $current_url = base64_encode(current_url() . '/#data-content'); ?>

        <div id="data-content" class="col-md-9"  style="-webkit-transition: all 0.7s ease-in-out; transition: all 0.7s ease-in-out;">



            <div class="agent-container" id="panel">

                <div class="agent-holder clearfix">

                    <h4><?php echo $user->first_name . ' ' . $user->last_name; ?></h4>

                    <div class="agent-image-holder">

                        <img width="150" height="150" src="<?php echo get_profile_photo_by_id($user->id, 'thumb'); ?>">                   </a>

                    </div>



                    <div class="detail">

                        <p><?php echo get_user_meta($user->id, 'about_me'); ?></p>

                        <p class="contact-types">
                            <strong><?php echo lang_key('DBC_PHONE'); ?>:</strong> <?php echo get_user_meta($user->id, 'phone'); ?>
                        </p>
                        <p>
                            <strong>ایمیل:</strong> <a href="mailto:<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a>
                        </p>

                        <div class="agent-properties"><a href="<?php echo site_url('show/agentproperties/' . $user->id); ?>" style="color:#fff;"><?php echo get_user_properties_count($user->id); ?> ملک</a></div>

                    </div>



                    <div class="follow-agent clearfix">

                        <ul class="social-networks clearfix">

                            <li class="fb">

                                <a href="https://<?php echo get_user_meta($user->id, 'fb_profile'); ?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>

                            </li>

                            <li class="twitter">

                                <a href="https://<?php echo get_user_meta($user->id, 'twitter_profile'); ?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>

                            </li>

                            <li class="linkedin">

                                <a href="https://<?php echo get_user_meta($user->id, 'li_profile'); ?>" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a>

                            </li>

                            <li class="gplus">

                                <a href="https://<?php echo get_user_meta($user->id, 'gp_profile'); ?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>





            <div class="recent-grid"><i class="fa fa-home fa-4"></i>&nbsp;<?php echo lang_key($page_title); ?>

    <?php require'switcher_view.php'; ?>

            </div>                    



            <!-- Thumbnails container -->

    <?php
    if ($this->session->userdata('view_style') == 'list') {

        require'list_view.php';
    } else if ($this->session->userdata('view_style') == 'map') {

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

            <!-- /Thumbnails container -->

        </div>





        <div class="col-md-3">

    <?php render_widgets('right_bar_agent_properties'); ?>

        </div>



    </div> <!-- /row -->

    <?php
}
?>

