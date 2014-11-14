        <div class="row">
            
            <!-- Article main content -->
            <article class="col-sm-9 maincontent">
                    <div class="detail-title"><?php echo lang_key('DBC_CONTACT_US');?></div>
                    <form action="<?php echo site_url('show/sendcontactemail');?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="sender_name" value="<?php echo set_value('sender_name');?>" placeholder="نام">
                                <?php echo form_error('sender_name');?>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="sender_email" value="<?php echo set_value('sender_email');?>" placeholder="ایمیل">
                                <?php echo form_error('sender_email');?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea placeholder="پیام خود را اینجا وارد نمایید" class="form-control" rows="9" name="msg"><?php echo set_value('msg');?></textarea>
                                <?php echo form_error('msg');?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <input class="btn btn-action" type="submit" value="ارسال پیام">
                            </div>
                        </div>
                    </form>

            </article>
            <!-- /Article -->
            
            <!-- Sidebar -->
            <aside class="col-sm-3 sidebar sidebar-right">
                <?php echo render_widget('contact_text');?>
            </aside>
            <!-- /Sidebar -->

        </div>