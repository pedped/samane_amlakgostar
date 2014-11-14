<!-- Fixed navbar -->
<div class="navbar navbar-inverse" >
    <!--<link rel='stylesheet' href='../default/assets/css/bootstrap-rtl/bootstrap.rtl.css'>-->
    <div class="container">

        <div class="navbar-header">

            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

            <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_site_logo(); ?>" alt="Logo" style="height:50px"></a>

        </div>

        <div class="navbar-collapse collapse">



            <ul class="nav navbar-nav pull-right">



                <?php
                $CI = get_instance();

                $CI->load->model('admin/page_model');

                $CI->page_model->init();
                ?>



                <?php
                $alias = (isset($alias)) ? $alias : '';

                foreach ($CI->page_model->get_menu() as $li) {

                    if ($li->parent == 0)
                        $CI->page_model->render_top_menu($li->id, 0, $alias);
                }
                ?>



                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php echo lang_key('DBC_TYPE'); ?> <b class="caret"></b>

                    </a>

                    <ul class="dropdown-menu">

                        <?php
                        $filter_options = array('DBC_TYPE_APARTMENT' => 'type',
                            'DBC_TYPE_HOUSE' => 'type',
                            'DBC_TYPE_LAND' => 'type',
                            'DBC_TYPE_COMSPACE' => 'type',
                            'DBC_TYPE_CONDO' => 'type',
                            'DBC_TYPE_VILLA' => 'type');

                        foreach ($filter_options as $k => $v) {
                            ?>

                            <li class="<?php echo is_active_menu('show/' . $v . '/' . $k); ?>">

                                <a href="<?php echo site_url('show/' . $v . '/' . $k); ?>">

                                    </i>&nbsp;<?php echo lang_key($k); ?>

                                </a>

                            </li>

                            <?php
                        }
                        ?>

                        <li style="border-bottom:1px solid #fff;height:0px;"></li>

                        <?php
                        $filter_options = array('DBC_PURPOSE_SALE' => 'purpose',
                            'DBC_PURPOSE_RENT' => 'purpose',
                            'DBC_PURPOSE_BOTH' => 'purpose');



                        foreach ($filter_options as $k => $v) {
                            ?>

                            <li class="<?php echo is_active_menu('show/' . $v . '/' . $k); ?>">

                                <a href="<?php echo site_url('show/' . $v . '/' . $k); ?>">

                                    </i>&nbsp;<?php echo lang_key($k); ?>

                                </a>

                            </li>

                            <?php
                        }
                        ?>

                    </ul>    

                </li>    
            </ul>

            <ul class="nav navbar-nav pull-left">
                <?php if (!is_loggedin()) { ?>

                    <?php if (get_settings('realestate_settings', 'enable_signup', 'Yes') == 'Yes') { ?>

                        <li><a class="btn" data-toggle="modal" href="#myModal"><?php echo lang_key('DBC_SIGN_IN'); ?></a></li>                    

                        <li><a class="btn" href="<?php echo site_url('account/signup'); ?>"><?php echo lang_key('DBC_SIGN_UP'); ?></a></li>

                    <?php } ?>

                <?php } else { ?>

                    <?php if (!is_admin()) { ?>

                        <li><a class="btn" href="<?php echo site_url('admin/realestate/allestatesagent'); ?>"><?php echo lang_key('DBC_AGENT_PANEL'); ?></a></li>

                    <?php } else { ?>

                        <li><a class="btn" href="<?php echo site_url('admin'); ?>"><?php echo lang_key('DBC_ADMIN_PANEL'); ?></a></li>

                    <?php } ?>

                    <li><a class="btn" href="<?php echo site_url('account/logout'); ?>"><?php echo lang_key('DBC_LOGOUT'); ?></a></li>

                <?php } ?>
            </ul>

        </div><!--/.nav-collapse -->

    </div>

</div> 

<!-- /.navbar -->