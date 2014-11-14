<?php 
$curr_page = $this->uri->segment(5);
if($curr_page=='')
  $curr_page = 0;
?>
<div class="row">
   
  <div class="col-md-12">

    <div class="box">

      <div class="box-title">

        <h3><i class="fa fa-bars"></i> تمامی پرداخت ها</h3>

        <div class="box-tool">

          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


        </div>

      </div>

      <div class="box-content">

        <?php echo $this->session->flashdata('msg');?>

        <?php if($posts->num_rows()<=0){?>

        <div class="alert alert-info">هیچ ملکی یافت نگردید</div>

        <?php }else{?>

        <div id="no-more-tables">

        <table class="table table-hover">

           <thead>

               <tr>

                  <th class="numeric">#</th>

                  <th class="numeric">کاربر</th>

                  <th class="numeric">بسته</th>

                  <th class="numeric">مقدار</th>

                  <th class="numeric">تاریخ درخواست</th>

                  <th class="numeric">تاریخ فعال سازی</th>
                  
                  <th class="numeric">تاریخ انقضا</th>

                  <th class="numeric">وضعیت</th>

                  <th class="numeric">عملیات</th>

               </tr>

           </thead>

           <tbody>

        	<?php $i=$start+1;foreach($posts->result() as $row):  ?>

               <tr>

                  <td data-title="#" class="numeric"><?php echo $i;?></td>

                  <td data-title="User" class="numeric"><a href="<?php echo site_url('admin/users/detail/'.$row->user_id);?>"><?php echo get_user_fullname_by_id($row->user_id)?></a></td>

                  <td data-title="Package" class="numeric"><?php echo get_package_name_by_id($row->package_id);?></td>

                  <td data-title="Amount" class="numeric"><?php echo $row->amount;?></td>

                  <td data-title="Request Date" class="numeric"><?php echo $row->request_date;?></td>

                  <td data-title="Activation date" class="numeric"><?php echo $row->activation_date;?></td>
                  
                  <td data-title="Expiration date" class="numeric"><?php echo $row->expirtion_date;?></td>
                  
                  <td data-title="Status" class="numeric"><?php echo get_payment_status_title_by_value($row->is_active);?></td>

                  <td data-title="Action" class="numeric">

                    <div class="btn-group">

                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> عملیات <span class="caret"></span></a>

                      <ul class="dropdown-menu dropdown-info">

                          <li><a href="<?php echo site_url('admin/realestate/deletehistory/'.$curr_page.'/'.$row->id);?>">حذف</a></li>

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


<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.filters').change(function(){
        jQuery('#filter_form').submit();
    });
});
</script>
