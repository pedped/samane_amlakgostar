<?php $this->load->helper('date');?>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-file"></i> اطلاعات حساب</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="extra_profile.html#"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-responsive img-thumbnail" src="<?php echo get_profile_photo_by_id($profile->id);?>">
                    </div>
                    <div class="col-md-9 user-profile-info">
                        <p>
                            <span>نام کاربری:</span> <?php echo $profile->user_name ?>
                        </p>
                        <p>
                            <span>نام:</span> <?php echo $profile->first_name ?>
                        </p>
                        <p>
                            <span>نام خانواگی:</span> <?php echo $profile->last_name ?>
                        </p>

                        <p>
                            <span>جنسیت:</span> <?php echo $profile->gender ?>
                        </p>

                        <p>
                            <span>ایمیل:</span><a href="mailto:<?php echo $profile->user_email ?>"><?php echo $profile->user_email ?></a>
                        </p>
                        <?php if($profile->user_type!=1){?>
                        <p>
                            <a href="<?php echo site_url('admin/banuser/'.$profile->id.'/forever');?>" class="btn btn-warning">ممنوع برای همیشه</a>
                            <a href="<?php echo site_url('admin/deleteuser/' . $profile->id); ?>" class="btn btn-danger">حذف</a>
                        </p>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




