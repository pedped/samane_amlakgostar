<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap-rtl/bootstrap.rtl.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap-rtl/main.rtl.css" rel="stylesheet" type="text/css"/>
<div id="navbar" class="navbar">
    <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
        <span class="fa fa-bars"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url('admin'); ?>">
        <small>
            <i class="fa fa-desktop"></i>
            مدیریت بنگاه </small>
    </a>

    <ul class="nav memento-nav pull-left">
        <li class="user-profile">
            <a data-toggle="dropdown" href="index.html#" class="user-menu dropdown-toggle">
                <i class="fa fa-user"></i>
                <span class="hhh" id="user_info"><?php echo $this->session->userdata('user_name'); ?></span>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-navbar pull-left" id="user_menu">
                <li style="margin-top:10px;"></li>	
                <li>
                    <a href="<?php echo site_url('admin/auth/changepass'); ?>">
                        <i class="fa fa-cog"></i>
                        تغییر رمز عبور </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/editprofile'); ?>">
                        <i class="fa fa-wrench"></i>
                        ویرایش پروفایل </a>
                </li>
                <li>			
                <li class="divider"></li>
                <li>
                    <a href="<?php echo site_url('admin/auth/logout') ?>">
                        <i class="fa fa-sign-out"></i>
                        خروج </a>
                </li>
                <li class="divider"></li>
            </ul>
        </li>
    </ul>

    <ul class="nav memento-nav pull-left">
        <li>
            <a target="_blank" href="<?php echo site_url(); ?>">
                <i class="fa fa-laptop"></i>
                مشاهده سایت
            </a>
        </li>
    </ul>
</div>