<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>دسته جدید</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
      		
      		<form class="form-horizontal" id="addcategory" action="<?php echo site_url('admin/category/addcategory');?>" method="post">
				<div class="form-group">
					<label class="col-sm-2 col-lg-1 control-label">نام:</label>
					<div class="col-sm-4 col-lg-5 controls">
						<input type="text" name="title" value="<?php echo(set_value('title')!='')?set_value('title'):'';?>" placeholder="چیزی تایپ کنید" class="form-control input-sm" >
						<span class="help-inline">&nbsp;</span>
						<?php echo form_error('title'); ?>
					</div>
				</div>			
				<div class="form-group">
					<label class="col-sm-2 col-lg-1 control-label">والد:</label>
					<div class="col-sm-4 col-lg-5 controls">
						<select class="form-control input-sm" name="parent">
							<option value="0">بدون والد</option>
							<?php 
							$CI = get_instance();
							$CI->load->model('admin/category_model');
							$categories = $CI->category_model->get_all_categories_by_range('all','','id');
							foreach ($categories->result() as $cat) {
							?>
							<option value="<?php echo $cat->id;?>"><?php echo $cat->title;?></option>
							<?php
							}
							?>	
						</select>
						<?php echo form_error('parent'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 col-lg-1 control-label">&nbsp;</label>
					<div class="col-sm-4 col-lg-5 controls">						
						<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> ذخیره</button>
					</div>
				</div>


			</form>

	  </div>
    </div>
  </div>
</div>