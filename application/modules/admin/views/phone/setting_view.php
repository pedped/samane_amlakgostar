<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>تنظیمات ارسال پیامک</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">



                <form action="<?php echo site_url('admin/phone/settings'); ?>" method="post">

                    <?php if (isset($msg)) echo $msg; ?>

                    <!-- enablesms !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">فعال سازی ارسال پیامک</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <?php $value = set_value("enablesms", $enablesms); ?>
                            <select name="enablesms"  class="form-control">
                                <option value="1" <?php if (intval($value) == 1) echo "selected"; ?>>فعال</option>
                                <option value="0" <?php if (intval($value) == 0) echo "selected"; ?>>غیر فعال</option>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enablesms'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- phone !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">شماره ارسال پیامک</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="smsnumber" value="<?php echo set_value("smsnumber", $smsnumber) ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('smsnumber'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Bongahname !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">نام بنگاه</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="bongahname" value="<?php echo set_value("bongahname", $bongahname) ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('bongahname'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Callback Phone !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">شماره تماس برگشتی </label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="callbackphone" value="<?php echo set_value("callbackphone", $callbackphone) ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('callbackphone'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                    <!-- Subscribe Text !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">متن ارسال عضویت در سامانه</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <textarea name="subscribetext" placeholder="چیزی تایپ کنید" class="form-control" style="height: 150px;" ><?php echo set_value("subscribetext", $subscribetext); ?></textarea>
                            <p style="font-size: 80%;color:#555;margin-top: 10px;">در هنگامی که یک شخص به لیست آگاه ساز اضافه میگردد، این متن برای شخص ارسال میگردد</p>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('subscribetext'); ?>
                        </div>
                    </div>


                    <div class="clearfix"></div>


                    <!-- username !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">نام کاربری پنل پیامک</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="username" value="<?php echo set_value("username", $username); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- password !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">رمز عبوری پنل پیامک</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="password" value="<?php echo set_value("password", $password); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <button type="submit" class="btn btn-primary">ذخیره</button>

                </form>



            </div>

        </div>

    </div>

</div>					
