<div class="row">

    <div class="col-md-12">

        <?php echo $this->session->flashdata('msg'); ?>

        <?php $page = ($this->uri->segment(5)!='')?$this->uri->segment(5):0;?>

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i> تمامی بسته ها</h3>



                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>



                </div>

            </div>

            <div class="box-content">

                <?php $this->load->helper('text'); ?>

                <?php if ($packages->num_rows() <= 0) { ?>

                    <div class="alert alert-info">هیچ بسته ای یافت نگردید</div>

                <?php } else { ?>


                <form action="" method="post" id="all_packages_form">

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric"><input type="checkbox" id="select_all"></th>



                                <th class="numeric">#</th>



                                <th class="numeric">تیتر</th>



                                <!-- <th class="numeric">توضیحات</th> -->



                                <th class="numeric">قیمت </th>



                                <th class="numeric">حداکثر پست در روز</th>



                                <th class="numeric">زمان انقضا</th>



                                <th class="numeric">تنظیمات</th>



                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1;

                            foreach ($packages->result() as $row): 
                                ?>

                                <tr>

                                    <td data-title="#" class="numeric"><input type="checkbox" name="id[]" value="<?php echo $row->id;?>"></td>



                                    <td data-title="#" class="numeric"><?php echo $i; ?></td>


                                    <td data-title="Title" class="numeric">

                                        <a href="#" target="_blank">

                                            <?php echo character_limiter($row->title,20); ?>

                                        </a>

                                    </td>



                                    <td data-title="Price" class="numeric">

                                        <?php 

                                        echo $row->price;

                                        ?>

                                    </td>



                                    <td data-title="Max post" class="numeric">

                                        

                                            <?php echo $row->max_post; ?>

                                        

                                    </td>



                                    <td data-title="Expiration time" class="numeric"><?php echo $row->expiration_time.' days';?></td>

                                

                                    <td data-title="Options" class="numeric">


                                        <div class="btn-group">

                                          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> عملیات <span class="caret"></span></a>

                                          <ul class="dropdown-menu dropdown-info">

                                              <li><a href="<?php echo site_url('admin/package/edit_package/'.$row->id);?>" class="edit-location">ویرایش</a></li>
                                              <li><a href="<?php echo site_url('admin/package/remove_package/'.$row->id); ?>">حذف</a></li>

                                          </ul>

                                        </div>


                                    </td>



                                </tr>

                                <?php $i++;endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <a href="#" id="remove-selected" class="btn btn-danger">حذف مورد انتخابی</a>

                    </form>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    jQuery('document').ready(function () {


        jQuery('#remove-selected').click(function(e){

            e.preventDefault();

            jQuery('#all_packages_form').attr('action','<?php echo site_url("admin/package/remove_bulk_packages");?>');

            jQuery('#all_packages_form').submit();

        });

    });



</script>