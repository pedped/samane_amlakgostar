<fieldset>
    <legend>Select Language & file</legend> 
    <label>یک زبان انتخاب نمایید</label> 
    <select name="sel_lang" id="sel_lang">
        <?php foreach ($all_langs->result() as $row) { ?>
            <option value="<?php echo $row->id; ?>"><?php echo $row->lang . ' - ' . $row->file; ?></option>
        <?php } ?>
    </select>
    <div style="clear:both;"></div>
    <?php $row = $all_langs->row(); ?>
    <a id="sel_lang_form" href="<?php echo site_url('admin/system/editlang/' . $row->id); ?>" class="btn">ویرایش</a>
    <a id="edit_as_new_lang" href="<?php echo site_url('admin/system/editasnewlang/' . $row->id); ?>" class="btn">یرایش به عنوان جدید</a>
    <a id="delete_lang" href="<?php echo site_url('admin/system/deletelang/' . $row->id); ?>" class="btn">حذف</a>
</fieldset>

<script type="text/javascript">
    jQuery('#sel_lang').change(function() {
        jQuery('#sel_lang_form').attr('href', "<?php echo site_url('admin/system/editlang'); ?>" + "/" + jQuery(this).val());
        jQuery('#sel_lang_form').attr('href', "<?php echo site_url('admin/system/editasnewlang'); ?>" + "/" + jQuery(this).val());
        jQuery('#delete_lang').attr('href', "<?php echo site_url('admin/system/deletelang'); ?>" + "/" + jQuery(this).val());
    });
</script>
<?php
if ($lang->num_rows() <= 0) {
    echo '<div class="alert alert-info input-xxlarge" style="margin-top:20px;">یک زبان انتخاب نمایی و بر روی کلید ویرایش ضربه بزنید</div>';
} else {
    $row = $lang->row();
    $values = json_decode($row->values);
    ?>
    <div style="clear:both;margin-top:30px;"></div>
    <form action="<?php echo site_url('admin/system/addlang'); ?>" method="post">
        <fieldset>
            <legend>فایل زبان جدید</legend> 
            <?php echo $this->session->flashdata('msg'); ?>
            <label>کد زبان</label> 
            <input type="text" name="lang" value="" placeholder="نام زبان شما" class="input-xxlarge" ><?php echo form_error('title'); ?>
            <label>فایل</label> 
            <input readonly="readonly" type="text" name="file" value="<?php echo (isset($row->file)) ? $row->file : set_value('file'); ?>" placeholder="چیزی تایپ کنید" class="input-xxlarge" ><?php echo form_error('title'); ?>
            <label>زبان</label> 
            <ol id="lang">
                <?php foreach ($values as $key => $val) { ?>
                    <li>
                        <div class="form-inline" style="margin-bottom:5px;">
                            <input readonly="readonly" class="input-medium" style="margin-bottom:5px;" type="text" name="lang_key[]" value="<?php echo $key; ?>" placeholder="کد زبان">
                            <input class="input-medium" style="margin-bottom:5px;" type="text" name="lang_text[]" value="<?php echo $val; ?>" placeholder="کد تکست">
                        </div>
                    </li>
                <?php } ?>
            </ol>
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </fieldset>
    </form>
    <?php
}
?>