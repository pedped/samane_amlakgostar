<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key("ویرایش قالب های ایمیل") ?> </h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" data-action="close"><i class="fa fa-times"></i></a></div>
            </div>
            <div class="box-content">

                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('فایل قالب را انتخاب نمایید'); ?></label>

                    <div class="col-sm-9 col-md-3 controls">
                        <select name="sel_tmpl" id="sel_tmpl" class="form-control">
                            <?php foreach($emails->result() as $row){
                                    $sel = ($this->uri->segment(5)==$row->id)?'selected="selected"':'';
                                ?>
                                <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->email_name;?></option>
                            <?php }?>
                        </select>
                        <span class="help-inline">&nbsp;</span>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"></label>

                    <div class="col-sm-9 col-lg-10 controls">
                        <?php $row = $emails->row();?>
                        <a  id="edit_tmpl" href="<?php echo site_url('admin/system/emailtmpl/'.$row->id);?>" class="btn btn-primary">
                            <i class="fa fa-check"></i><?php echo lang_key("ویرایش") ?></a>
                    </div>
                </div>
            <div class="clearfix"></div>
                <?php
                if($email->num_rows()<=0)
                {
                    echo '<div class="alert alert-info input-xxlarge" style="margin-top:20px;">یک پوسته انتخاب نمایید و بر روی ویرایش کلیک کنید</div>';
                }
                else
                {
                    $row = $email->row();
                    $values = json_decode($row->values);
                    ?>

                    <div style="clear:both;margin-top:30px;"></div>
                    <form class="form-horizontal" action="<?php echo site_url('admin/system/updateemail');?>" method="post">
                            <?php echo $this->session->flashdata('msg');?>
                            <input type="hidden" name="id" value="<?php echo $row->id;?>" />

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('موضوعات'); ?></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="subject" value="<?php echo (isset($values->subject))?$values->subject:set_value('subject');?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <?php echo form_error('subject'); ?>

                                <span class="help-inline">&nbsp;</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('بدنه'); ?></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <textarea style="height:250px;" name="body" placeholder="چیزی تایپ کنید" class="form-control" ><?php echo (isset($values->body))?$values->body:set_value('body');?></textarea>
                                <?php echo form_error('body'); ?>

                                <input type="hidden" name="avl_vars" value="<?php echo (isset($values->avl_vars))?$values->avl_vars:set_value('avl_vars');?>" />
                                <div class="alert alert-info input-xxlarge" style="margin-top:20px;">Available variables : <?php echo $values->avl_vars;?></div>

                                <span class="help-inline">&nbsp;</span>

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-check"></i><?php echo lang_key("Save") ?></button>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    jQuery('#sel_tmpl').change(function(){
        jQuery('#edit_tmpl').attr('href',"<?php echo site_url('admin/system/emailtmpl');?>"+"/"+jQuery(this).val());
    });
</script>
