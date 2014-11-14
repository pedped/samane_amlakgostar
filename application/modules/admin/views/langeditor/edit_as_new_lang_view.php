<div class="row">	<div class="col-md-12">		<div class="box">			<div class="box-title">				<h3><i class="fa fa-bars"></i> انتخاب زبان</h3>				<div class="box-tool">					<a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>				</div>			</div>			<div class="box-content">				<label>فایل زبان را انتخاب نمایید</label> 				<select name="sel_lang" id="sel_lang" class="form-control input-sm">					<?php foreach($all_langs->result() as $row){?>					<option value="<?php echo $row->id;?>"><?php echo $row->lang.' - '.$row->short_name;?></option>					<?php }?>				</select>				<div style="clear:both;margin-top:20px;"></div>				<?php $row = $all_langs->row();?>				<a id="sel_lang_form" href="<?php echo site_url('admin/system/editlang/'.$row->id);?>" class="btn btn-primary">ویرایش</a>				<a id="edit_as_new_lang" href="<?php echo site_url('admin/system/editasnewlang/'.$row->id);?>" class="btn btn-info">افزودن به عنوان جدید</a>				<a id="delete_lang" href="<?php echo site_url('admin/system/deletelang/'.$row->id);?>" class="btn btn-danger">حذف</a>			</div>		</div>	</div></div>	<script type="text/javascript">jQuery('#sel_lang').change(function(){	jQuery('#sel_lang_form').attr('href',"<?php echo site_url('admin/system/editlang');?>"+"/"+jQuery(this).val());	jQuery('#edit_as_new_lang').attr('href',"<?php echo site_url('admin/system/editasnewlang');?>"+"/"+jQuery(this).val());	jQuery('#delete_lang').attr('href',"<?php echo site_url('admin/system/deletelang');?>"+"/"+jQuery(this).val());});</script><?php if($lang->num_rows()<=0){	echo '<div class="alert alert-info" style="margin-top:20px;">یک فایل انتخاب نمایید و بر روی کلیئ ویرایش ضربه بزنید</div>';}else{	$row = $lang->row();	$values = json_decode($row->values);?><div style="clear:both;margin-top:30px;"></div><div class="row">	<div class="col-md-12">		<div class="box">			<div class="box-title">				<h3><i class="fa fa-bars"></i> زبان جدیدe</h3>				<div class="box-tool">					<a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>					<a href="#" data-action="close"><i class="fa fa-times"></i></a>				</div>			</div>			<div class="box-content">				<form action="<?php echo site_url('admin/system/savelang');?>" method="post">					<?php echo $this->session->flashdata('msg');?>					<input type="hidden" name="id" value="<?php echo $row->id;?>" />										<div class="form-group">						<label class="col-sm-1 col-lg-1 control-label">زبان</label>						<div class="col-sm-2 col-lg-3 controls">							<input type="text" name="lang" value="<?php echo (isset($row->lang))?$row->lang:set_value('lang');?>" placeholder="چیزی تایپ کنید" class="form-control" >							<span class="help-inline">&nbsp;</span>							<?php echo form_error('lang'); ?>						</div>					</div>					<div class="clearfix"></div>					<div class="form-group">						<label class="col-sm-1 col-lg-1 control-label">نام کوتاه</label>						<div class="col-sm-2 col-lg-3 controls">							<input type="text" name="short_name" value="<?php echo (isset($row->short_name))?$row->short_name:set_value('short_name');?>" placeholder="چیزی تایپ کنید" class="form-control" >							<span class="help-inline">&nbsp;</span>							<?php echo form_error('short_name'); ?>						</div>					</div>					<div class="clearfix" style="margin-top:30px;"></div>					<ol id="lang">						<?php foreach($values as $key=>$val){?>						<li>							<div class="form-inline" style="margin-bottom:5px;">							<input readonly="readonly" class="form-control" style="margin-bottom:5px;" type="text" name="lang_key[]" value="<?php echo $key;?>" placeholder="کلید زبان">							<input class="form-control" style="margin-bottom:5px;" type="text" name="lang_text[]" value="<?php echo strip_tags($val);?>" placeholder="متن زبان">							</div>						</li>						<?php }?>					</ol>					<a href="javascript:void(0);" class="addanother btn btn-info" style="margin-left:25px;margin-bottom:5px;">افزودن دیگری</a><br/>					<button type="submit" class="btn btn-primary">ذخیره</button>				</form>			</div>		</div>	</div></div>	<script type="text/javascript">jQuery('.addanother').click(function(){	jQuery('#lang').append('<li>'+							'<div class="form-inline" style="margin-bottom:5px;">'+							'<input class="form-control" type="text" name="lang_key[]" placeholder="کلید زبان">'+							'<input class="form-control" type="text" name=lang_text[] placeholder="متن زبان" style="margin-top:5px;">'+							'<a href="javascript:void(0);" class="remove" style="margin-left:4px;color:#F00;font-weight:bold;">X</a></div></li>');	jQuery('.remove').click(function(){		jQuery(this).parent().parent().remove();	});});jQuery('.remove').click(function(){	jQuery(this).parent().parent().remove();});</script><?php }?>