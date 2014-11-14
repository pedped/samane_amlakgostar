<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>مدیریت پشتیبان</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
        <a class="btn btn-success" type="button" href="<?php echo site_url('admin/system/createbackup');?>">ساخت پشتیبان</a>
        <?php $this->load->library('encrypt');?>
        <?php echo $this->session->flashdata('msg');?>
        <?php if(count($posts)<=1){?>
        <div class="alert alert-info">فایل پشتیبانی یافت نگردید</div>
        <?php }else{?>
        <table class="table table-hover">
           <thead>
               <tr>
                  <th>#</th>
                  <th>تاریخ</th>
                  <th>عملیات</th>
               </tr>
           </thead>
           <tbody>
        	<?php $i=1;for($j=count($posts)-1;$j>=0;$j--){?>
               <?php if($posts[$j]!='index.html'){?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $posts[$j];?></td>
                  <td>
                    
                    <div class="btn-group">
                      <a href="ui_button.html#" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><i class="fa fa-cog"></i> عملیات <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-info">
                          <li><a href="<?php echo site_url('admin/system/restoredb/'.$j);?>">بازگشت</a></li>
                          <li><a href="<?php echo site_url('admin/system/dlbackup/'.$j);?>">دانلود</a></li>
                          <li><a href="<?php echo site_url('admin/system/deletebackup/'.$j);?>">حذف</a></li>
                      </ul>
                    </div>
                  </td>
               </tr>
               <?php }?>
            <?php $i++;};?>   
           </tbody>
        </table>
        <?php }?>
       </div>
    </div>
  </div>
</div> 