<form action="<?php echo site_url('admin/system/savelang'); ?>" method="post">
    <fieldset>
        <legend>یک فایل زبان جدید</legend> 
        <?php echo $this->session->flashdata('msg'); ?>
        <label>کد زبان</label> 
        <input type="text" name="lang" value="<?php echo set_value('lang'); ?>" placeholder="چیزی تایپ کنید" class="input-xxlarge" ><?php echo form_error('title'); ?>
        <label>فایل</label> 
        <input type="text" name="file" value="<?php echo set_value('file'); ?>" placeholder="چیزی تایپ کنید" class="input-xxlarge" ><?php echo form_error('title'); ?>
        <label>زبان</label> 
        <ol id="lang">
            <li>
                <input class="span2" type="text" name="lang_key[]" placeholder="کد زبان">
                <input class="span3" type="text" name="lang_text[]" placeholder="کد تکست">
                <a href="javascript:void(0);" class="remove" style="color:#F00;font-weight:bold;">X</a>
            </li>
        </ol>
        <a href="javascript:void(0);" class="addanother btn btn-primary" style="margin-left:25px;margin-bottom:5px;">افزودن یکی دیگر</a><br/>
        <button type="submit" class="btn">ذخیره</button>
    </fieldset>
</form>
<script type="text/javascript">
    jQuery('.addanother').click(function() {
        jQuery('#lang').append('<li>' +
                '<input class="span2" type="text" name="lang_key[]" placeholder="کلید زبان">' +
                '<input class="span3" type="text" name=lang_text[] placeholder="متن زبان" placeholder=".span1" style="margin-left:4px;">' +
                '<a href="javascript:void(0);" class="remove" style="margin-left:4px;color:#F00;font-weight:bold;">X</a></li>');
        jQuery('.remove').click(function() {
            jQuery(this).parent().remove();
        });
    });

    jQuery('.remove').click(function() {
        jQuery(this).parent().remove();
    });
</script>