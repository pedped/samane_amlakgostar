<div class="row">

  <div class="col-md-12">

    <div class="box">

      <div class="box-title">

        <h3><i class="fa fa-bars"></i> تمامی صفحات</h3>

        <div class="box-tool">

          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


        </div>

      </div>

      <div class="box-content">

        <?php $this->load->helper('text');?>

        <?php echo $this->session->flashdata('msg');?>

        <?php if($posts->num_rows()<=0){?>

        <div class="alert alert-info">بدون صفحه</div>

        <?php }else{?>

        <div id="no-more-tables">

        <table class="table table-hover">

           <thead>

               <tr>

                  <th class="numeric">#</th>

                  <th class="numeric">تیتر</th>

                  <th class="numeric">توضیحات</th>

                  <th class="numeric">وضعیت</th>

                  <th class="numeric">فعالیت ها</th>

               </tr>

           </thead>

           <tbody>

        	<?php $i=1;foreach($posts->result() as $row):?>

               <tr>

                  <td data-title="#" class="numeric"><?php echo $i;?></td>

                  <td data-title="Title" class="numeric"><a href="<?php echo site_url('admin/page/manage/'.$row->id);?>"><?php echo $row->title;?></a></td>

                  <td data-title="Description" class="numeric"><?php echo truncate(encode_html($row->content),30,'...',false);?></td>

                  <td data-title="Status" class="numeric">

                    <?php if($row->status==1)

                          $status = '<span class="alert alert-success">منتشر شده</span>';

                          else if($row->status==2)

                          $status = '<span class="alert alert-warning">در حال ویرایش</span>';

                        echo $status;

                    ?>

                  </td>

                  <td data-title="Action" class="numeric">

                    <div class="btn-group">

                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> عملیات <span class="caret"></span></a>

                      <ul class="dropdown-menu dropdown-info">

                          <li><a href="<?php echo site_url('admin/page/manage/'.$row->id);?>">ویرایش</a></li>

                          <?php if($row->editable==1){?>
                          <?php $curr_page = ($this->uri->segment(5)!='')?$this->uri->segment(5):0;?>
                          <li><a href="<?php echo site_url('admin/page/delete/'.$curr_page.'/'.$row->id);?>">حذف</a></li>

                          <?php }?>

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