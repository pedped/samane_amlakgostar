<div class="row">

    <div class="col-md-12">

        <?php echo $this->session->flashdata('msg'); ?>



        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i> تمامی کاربران</h3>

                <?php $page = ($this->uri->segment(5)!='')?$this->uri->segment(5):0;?>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>

            </div>

            <div class="box-content">

                <?php $this->load->helper('text'); ?>

                <?php if ($posts->num_rows() <= 0) { ?>

                    <div class="alert alert-info">هیچ صفحه های یافت نگردید</div>

                <?php } else { ?>

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric">#</th>



                                <th class="numeric">تصویر</th>



                                <th class="numeric">نام</th>



                                <th class="numeric">نوع</th>



                                <th class="numeric">ایمیل</th>



                                <th class="numeric">جنسیت</th>



                                <th class="numeric">وضعیت</th>



                                <th class="numeric">تنظیمات</th>



                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1;

                            foreach ($posts->result() as $row): ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $i; ?></td>



                                    <td data-title="Photo" class="numeric">

                                        <img src="<?php echo get_profile_photo_by_id($row->id,'thumb'); ?>" class="thumbnail" style="height:36px;">

                                    </td>



                                    <td data-title="Name" class="numeric"><a

                                            href="<?php echo site_url('admin/users/detail/' . $row->id); ?>"><?php echo $row->user_name; ?></a>

                                    </td>



                                    <td data-title="Type"

                                        class="numeric"><?php 
                                        if($row->user_type==1)
                                            echo 'Admin';
                                        else if($row->user_type==3)
                                            echo 'Moderator';
                                        else
                                            echo 'User';
                                        ?></td>



                                    <td data-title="Email" class="numeric"><?php echo $row->user_email;; ?></td>



                                    <td data-title="Gender"

                                        class="numeric"><?php echo ($row->gender == '') ? 'N/A' : $row->gender; ?></td>



                                    <td data-title="Status" class="numeric">

                                        <?php

                                        if ($row->confirmed != 1)

                                            echo 'Pending';

                                        else if ($row->banned == 1)

                                            echo 'Banned';

                                        else {

                                            echo 'Active';

                                        }

                                        ?>

                                    </td>

                                    <td data-title="Options" class="numeric">



                                        <div class="btn-group">



                                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown"

                                               href=""><i class="fa fa-cog"></i> عملیات <span

                                                    class="caret"></span></a>



                                            <ul class="dropdown-menu dropdown-info">

                                                <!--li><a href="<?php echo site_url('admin/userdetail/' . $row->user_name) ?>"

                                                       target="_blank">پروفایل</a></li-->
                                                <li><a href="<?php echo site_url('admin/edituser/' . $row->id); ?>">ویرایش</a>

                                                </li>

                                                <li><a href="<?php echo site_url('admin/userdetail/' . $row->id); ?>">جزئییات</a>

                                                </li>

                                                <?php if($row->confirmation_key!=''){?>

                                                <li><a href="<?php echo site_url('admin/confirmuser/'.$page.'/'. $row->id); ?>">تایید</a>

                                                </li>

                                                <?php }?>                                        


                                                <?php if($row->user_type!=1){?>

                                                    <li><a href="<?php echo site_url('admin/deleteuser/'.$page.'/'. $row->id); ?>">حذف</a>

                                                    </li>

                                                    <?php

                                                    if ($row->banned == 1) {

                                                        ?>

                                                        <li>

                                                            <a href="<?php echo site_url('admin/users/unban_user/' . $row->id . '/' . $this->uri->segment(5)); ?>">Un-Ban</a>

                                                        </li>

                                                    <?php

                                                    } else {

                                                        ?>



                                                        <li>

                                                            <a href="<?php echo site_url('admin/users/ban_user/' . $row->id . '/' . $this->uri->segment(5)); ?>">ممنوع</a>

                                                        </li>

                                                    <?php

                                                    }

                                                }

                                                ?>

                                            </ul>



                                        </div>



                                    </td>



                                </tr>

                                <?php $i++;endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <div class="pagination">

                        <ul class="pagination pagination-colory"><?php echo $pages; ?></ul>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">





    jQuery('#searchkey').keyup(function () {



        var val = jQuery(this).val();



        var loadUrl = '<?php echo site_url('admin/search/');?>';



        jQuery("#bookings").html(ajax_load).load(loadUrl, {'key': val});



    });





    var ajax_load = '<div class="box">loading...</div>';





    jQuery('document').ready(function () {



        jQuery.ajaxSetup({



            cache: false



        });



    });



</script>