<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>ویرایش بسته</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
      		
      		<form class="form-horizontal" id="editpackage" action="<?php echo site_url('admin/package/updatepackage');?>" method="post">
      			
      			<input type="hidden" name="id" value="<?php echo $post->id;?>"/>
				
				<div class="form-group">
					<label class="col-sm-3 col-lg-2 control-label">تیتر:</label>
					<div class="col-sm-4 col-lg-5 controls">
						<input type="text" name="title" value="<?php echo $post->title;?>" placeholder="تیتر بسته" class="form-control input-sm" >
						<span class="help-inline">&nbsp;</span>
						<?php echo form_error('title'); ?>
					</div>
				</div>

				<div class="form-group">
		          <label class="col-sm-3 col-lg-2 control-label">توضیحات:</label>
		          <div class="col-sm-4 col-lg-5 controls">
		            <textarea name="description" value="" placeholder="توضیحات بسته" class="form-control input-sm"><?php echo $post->description!=''?$post->description:'';?></textarea>
		            <span class="help-inline">&nbsp;</span>
		            <?php echo form_error('description'); ?>
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-sm-3 col-lg-2 control-label">قیمت:</label>
		          <div class="col-sm-4 col-lg-5 controls">
		            <input type="text" name="price" value="<?php echo $post->price;?>" placeholder="قیمت بسته" class="form-control input-sm" >
		            <span class="help-inline">&nbsp;</span>
		            <?php echo form_error('price'); ?>
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-sm-3 col-lg-2 control-label">حداکثر پست توسط کاربر:</label>
		          <div class="col-sm-4 col-lg-5 controls">
		            <input type="text" name="max_post" value="<?php echo $post->max_post;?>" placeholder="حداکثر پست در روز" class="form-control input-sm" >
		            <span class="help-inline">&nbsp;</span>
		            <?php echo form_error('max_post'); ?>
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-sm-3 col-lg-2 control-label">زمان انقضا بر اساس روز:</label>
		          <div class="col-sm-4 col-lg-5 controls">
		            <input type="text" name="expiration_time" value="<?php echo $post->expiration_time;?>" placeholder="زمان انقضا ب راساس روز" class="form-control input-sm" >
		            <span class="help-inline">&nbsp;</span>
		            <?php echo form_error('expiration_time'); ?>
		          </div>
		        </div>

				<div class="form-group">
					<label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
					<div class="col-sm-4 col-lg-5 controls">						
						<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> به روز رسانی </button>
					</div>
				</div>


			</form>

	  </div>
    </div>
  </div>
</div>