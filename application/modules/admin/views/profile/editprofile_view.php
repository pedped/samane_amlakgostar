<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i>ویرایش پروفایل</h3>



                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                    <a href="#" data-action="close"><i class="fa fa-times"></i></a></div>

            </div>

            <div class="box-content">

                <?php echo $this->session->flashdata('msg'); ?>

                <?php echo validation_errors(); ?>

                <form class="form-horizontal" action="<?php echo site_url('admin/updateprofile'); ?>" method="post">

                    <?php if (isset($action) && $action == 'edituser') { ?>
                        <input type="hidden" name="action" value="edituser" />
                        <input type="hidden" name="id" value="<?php echo $profile->id; ?>"/>
                    <?php } else { ?>
                        <input type="hidden" name="action" value="editprofile" />
                        <?php if (is_admin()) { ?>
                            <input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
                        <?php } else { ?>
                            <input type="hidden" name="id" value="<?php echo $profile->id; ?>"/>
                        <?php } ?>

                    <?php } ?>

                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <img class="thumbnail" id="user_photo" src="<?php echo get_profile_photo_by_id($profile->id, 'thumb'); ?>"  style="width:100px;" />

                            <span id="profile_photo_error"><?php echo form_error('profile_photo'); ?></span>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_PROFILE_PHOTO'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="hidden" name="profile_photo" id="profile_photo" value="<?php echo get_profile_photo_name_by_username($profile->user_name); ?>">

                            <iframe src="<?php echo site_url('admin/realestate/profile_photo_uploader'); ?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>

                            <span class="help-inline">&nbsp;</span>                            

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_USER_NAME'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="user_name" value="<?php echo $profile->user_name; ?>"

                                   placeholder="نام کاربری" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('user_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_FIRST_NAME'); ?></label>
                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="first_name" value="<?php echo $profile->first_name; ?>"

                                   placeholder="نام کاربری" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('first_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_LAST_NAME'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="last_name" value="<?php echo $profile->last_name; ?>"

                                   placeholder="نام کاربری" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('last_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">جنسیت</label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <?php $curr_value = (set_value('gender') != '') ? set_value('gender') : $profile->gender; ?>

                            <select class="form-control" name="gender">

                                <?php $sel = ($curr_value == 'male') ? 'selected="selected"' : ''; ?>

                                <option value="male" <?php echo $sel; ?>>مرد</option>

                                <?php $sel = ($curr_value == 'female') ? 'selected="selected"' : ''; ?>

                                <option value="female" <?php echo $sel; ?>>زن</option>

                            </select>

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('gender'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_PHONE'); ?></label>

                        <?php $v = (set_value('phone')) ? set_value('phone') : get_user_meta($profile->id, 'phone'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="phone" value="<?php echo $v; ?>"

                                   placeholder="تلفن" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('phone'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_COMPANY_NAME'); ?></label>

                        <?php $v = (set_value('company_name')) ? set_value('company_name') : get_user_meta($profile->id, 'company_name'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="company_name" value="<?php echo $v; ?>"

                                   placeholder="نام شرکت" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('company_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('DBC_ABOUT_ME'); ?></label>

                        <?php $v = (set_value('about_me')) ? set_value('about_me') : get_user_meta($profile->id, 'about_me'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <textarea name="about_me"

                                      placeholder="درباه شما" class="form-control"><?php echo $v; ?></textarea>

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('about_me'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">حساب فیسبوک</label>

                        <?php $v = (set_value('fb_profile')) ? set_value('fb_profile') : get_user_meta($profile->id, 'fb_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="fb_profile" value="<?php echo $v; ?>"

                                   placeholder="حساب فیسبوک" class="form-control">

                            <span class="help-inline">Please enter the FB profile link, without http:// </span>

                            <?php echo form_error('fb_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">حساب توییتر</label>

                        <?php $v = (set_value('twitter_profile')) ? set_value('twitter_profile') : get_user_meta($profile->id, 'twitter_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="twitter_profile" value="<?php echo $v; ?>"

                                   placeholder="حساب توییتر" class="form-control">

                            <span class="help-inline">Please enter the twitter profile link, without http:// </span>

                            <?php echo form_error('twitter_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">حساب لینکد این</label>

                        <?php $v = (set_value('li_profile')) ? set_value('li_profile') : get_user_meta($profile->id, 'li_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="li_profile" value="<?php echo $v; ?>"

                                   placeholder="حساب لینکد این" class="form-control">

                            <span class="help-inline">Please enter the linkedin profile link, without http:// </span>

                            <?php echo form_error('li_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Google+ Account</label>

                        <?php $v = (set_value('gp_profile')) ? set_value('gp_profile') : get_user_meta($profile->id, 'gp_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="gp_profile" value="<?php echo $v; ?>"

                                   placeholder="حساب گوگل پلاس" class="form-control">

                            <span class="help-inline">Please enter the google+ profile link, without http:// </span>

                            <?php echo form_error('gp_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <button class="btn btn-primary" type="submit"><i

                                    class="fa fa-check"></i><?php echo lang_key("Update") ?></button>

                        </div>

                    </div>



                </form>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    jQuery(document).ready(function() {

        var base_url = "<?php echo base_url(); ?>";

        jQuery('#profile_photo').change(function() {

            var val = jQuery(this).val();

            var src = base_url + 'uploads/profile_photos/thumb/' + val;

            jQuery('#user_photo').attr('src', src);

        }).change();

    });

</script>