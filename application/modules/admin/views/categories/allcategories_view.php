<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> تمامی دسته ها</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
        <?php $this->load->helper('text');?>
        <?php echo $this->session->flashdata('msg');?>
        <?php if($posts->num_rows()<=0){?>
        <div class="alert alert-info">بدون دسته</div>
        <?php }else{?>
        <div id="no-more-tables">
        <table class="table table-hover">
           <thead>
               <tr>
                  <th class="numeric">#</th>
                  <th class="numeric">تیتر</th>
                  <th class="numeric">والد</th>
                  <th class="numeric">ویرایش</th>
               </tr>
           </thead>
           <tbody>
        	<?php $i=1;foreach($posts->result() as $row):?>
               <tr>
                  <td data-title="#" class="numeric"><?php echo $i;?></td>
                  <td data-title="Title" class="numeric"><a href="<?php echo site_url('admin/category/edit/'.$row->id);?>"><?php echo $row->title;?></a></td>
                  <td data-title="Description" class="numeric"><?php echo get_category_title_by_id($row->parent);?></td>
                  <td data-title="Action" class="numeric">
                    <div class="btn-group">
                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> ویرایش <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-info">
                          <li><a href="<?php echo site_url('admin/category/edit/'.$row->id);?>">ویرایش</a></li>
                          <li><a href="<?php echo site_url('admin/category/delete/'.$row->id);?>">حذف</a></li>
                      </ul>
                    </div>
                  </td>
               </tr>
            <?php $i++;endforeach;?>   
           </tbody>
        </table>
        </div>
        <div class="pagination"><ul class="pagination pagination-colory"><?php echo $pages;?></ul></div>
        <?php }?>
        </div>
    </div>
  </div>
</div>