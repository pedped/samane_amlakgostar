<div class="detail-title"><i class="fa fa-user"></i>&nbsp;ثبت نام</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(get_settings('realestate_settings','enable_pricing','Yes')=='Yes'){?>    
                                <label>پکیج های انتخابی:</label>
                                <div class="thumbnail thumb-shadow">                                    
                                    <div class="caption">
                                        <h4><?php echo $package->title;?></h4> 
                                        <p><?php echo $package->description;?></p>                       
                                        <div style="clear:both;">
                                            <span style="float: right; margin-left: 2px; font-size: 13px;"><?php echo lang_key('DBC_PRICE') ?>:</span>
                                            <span style="float:right; "><?php echo $package->price;?></span>
                                        </div>
                                        <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                                        <div style="clear:both;">
                                            <span style="float: right; margin-left: 2px; font-size: 13px;"><?php echo lang_key('DBC_LIMIT') ?>:</span>
                                            <span style="float:right; "><?php echo $package->expiration_time;?> روزها</span>
                                        </div>
                                        <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                                        <div style="clear:both;">
                                            <span style="float: right; margin-left: 2px; font-size: 13px;"><?php echo lang_key('DBC_USAGE') ?>:</span>
                                            <span style="float:right; "><?php echo $package->max_post;?> پست ها</span>
                                        </div>
                                        <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                                        <p>
                                            <a href="<?php echo site_url('show/signup');?>" class="btn btn-primary  btn-labeled">
                                                <span class="btn-label btn-label-right">
                                                   <i class="fa  fa-arrow-left"></i>
                                                </span>
                                                تغییر
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php }?>
                            <div style="clear:both"></div>
                            <?php
                            $fb_enabled = get_settings('realestate_settings','enable_fb_login','No');
                            $gplus_enabled = get_settings('realestate_settings','enable_gplus_login','No');
                            if($fb_enabled=='Yes' || $gplus_enabled=='Yes'){
                            ?>

                            <!-- Social Logins-->
                            <div style="height: 1px; background-color: #fff; text-align: center">
                              <span style="background-color:#fff; position: relative; top: -12px; font-size:16px;padding:0px 8px;">
                                Signup with social account
                              </span>
                            </div>
                            <div style="text-align:center;">
                                <br>
                                <?php if($fb_enabled=='Yes'){?>
                                <a href="<?php echo site_url('account/newaccount/fb');?>">
                                    <img src="<?php echo theme_url();?>/assets/social-icons/facebook_login.png"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Login with facebook"/>
                                </a>
                                <?php }?>
                                <?php if($gplus_enabled=='Yes'){?>
                                <a href="<?php echo site_url('account/newaccount/google_plus');?>">
                                    <img src="<?php echo theme_url();?>/assets/social-icons/google+.png"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Login with google"/>
                                </a>
                                <?php }?>
                            </div>
                            <hr>
                            <?php 
                            }
                            ?>
                            
                            <!-- Email Logins-->
                            <form action="<?php echo site_url('account/register/');?>" method="post">
                                <input type="hidden" name="package_id" value="<?php echo (isset($package->id))?$package->id:'';?>">
                                <div class="top-margin">
                                    <label><?php echo lang_key('DBC_FIRST_NAME'); ?></label>
                                    <input type="text" name="first_name" value="<?php echo set_value('first_name');?>" class="form-control">
                                </div>
                                <?php echo form_error('first_name');?>
                                <div class="top-margin">
                                    <label><?php echo lang_key('DBC_LAST_NAME'); ?></label>
                                    <input type="text"name="last_name" value="<?php echo set_value('last_name');?>" class="form-control">
                                </div>
                                <?php echo form_error('last_name');?>
                                <div class="top-margin">
                                    <label>ایمیل <span class="text-danger">*</span></label>
                                    <input type="text" name="useremail" value="<?php echo set_value('useremail');?>" class="form-control">
                                </div>
                                <?php echo form_error('useremail');?>
                                <div class="top-margin">
                                    <label>نام کاربری <span class="text-danger">*</span></label>
                                    <input type="text" name="username" value="<?php echo set_value('username');?>" class="form-control">
                                </div>
                                <?php echo form_error('username');?>
                                <div class="top-margin">
                                    <label>جنسیت <span class="text-danger">*</span></label>
                                    <?php $curr_value=(set_value('gender')!='')?set_value('gender'):$this->session->userdata('gender');?>
                                    <select class="form-control" name="gender">
                                        <?php $sel=($curr_value=='male')?'selected="selected"':'';?>
                                        <option value="male" <?php echo $sel;?>>مرد</option>
                                        <?php $sel=($curr_value=='female')?'selected="selected"':'';?>
                                        <option value="female" <?php echo $sel;?>>زن</option>
                                    </select>    
                                </div>
                                <div class="top-margin">
                                    <label><?php echo lang_key('DBC_PHONE'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="<?php echo set_value('phone');?>" class="form-control">
                                </div>
                                <div class="top-margin">
                                    <label><?php echo lang_key('DBC_COMPANY_NAME'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" value="<?php echo set_value('company_name');?>" class="form-control">
                                </div>
                                <?php echo form_error('company_name');?>
                                <div class="row top-margin">
                                    <div class="col-sm-6">
                                        <label>رمز عبور <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control">
                                        <?php echo form_error('password');?>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>تایید رمز عبور <span class="text-danger">*</span></label>
                                        <input type="password" name="repassword" class="form-control">
                                        <?php echo form_error('repassword');?>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="hidden" name="terms_conditon" id="terms_conditon" value="<?php echo (isset($_POST['terms_conditon_field']))?$_POST['terms_conditon_field']:'';?>">
                                        <label class="checkbox">
                                            <input type="checkbox" name="terms_conditon_field" id="terms_conditon_field" <?php echo (isset($_POST['terms_conditon_field']))?'checked':'';?>> 
                                            من  <a target="_blank" href="<?php echo site_url('show/terms');?>">شرایط استفاده</a> را خوانده ام و قبول دارم
                                        </label>
                                        <?php echo form_error('terms_conditon');?>                        
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" type="submit"><?php echo lang_key('DBC_REGISTER'); ?></button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>

                </div>        

    </div>    
</div> <!-- /row -->
<script type="text/javascript">
jQuery(document).ready(function(e){
    jQuery('#terms_conditon_field').click(function(e){
        var val = jQuery(this).attr('checked');
        jQuery('#terms_conditon').val(val);

    });
});
</script>
