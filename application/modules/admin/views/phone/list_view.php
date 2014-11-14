<?php
$curr_page = $this->uri->segment(5);
if ($curr_page == '')
    $curr_page = 0;
?>
<!-- Phone Numbers !-->
<div class="col-md-12">

    <div class="box">

        <div class="box-title">

            <h3><i class="fa fa-bars"></i>دریافت کنندگان پیامک</h3>

            <div class="box-tool">

                <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


            </div>

        </div>

        <div class="box-content">

            <?php echo $this->session->flashdata('msg'); ?>

            <?php if ($phones->num_rows() <= 0) { ?>

                <div class="alert alert-info">هیچ شخصی بافت نگردید</div>

            <?php } else { ?>

                <div id="no-more-tables">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th class="numeric">#</th>

                                <th class="numeric">شماره تماس</th>

                                <th class="numeric">نوع</th>

                                <th class="numeric">منظور</th>

                                <th class="numeric">تعداد خواب</th>



                                <th class="numeric">حداقل فروش</th>

                                <th class="numeric">حداکثر فروش</th>


                                <th class="numeric">حداقل رهن</th>

                                <th class="numeric">حداکثر رهن</th>



                                <th class="numeric">حداقل اجاره</th>

                                <th class="numeric">حداکثر اجاره</th>


                                <th class="numeric">پیامک های دریافتی</th>


                                <th class="numeric">تاریخ</th>

                                <th class="numeric">وضعیت</th>

                                <th class="numeric">تنظیمات</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $i = $start + 1;
                            foreach ($phones->result() as $row):
                                ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $row->id; ?></td>

                                    <td data-title="Phone" class="numeric"><?php echo $row->phonenumber; ?></td>

                                    <td data-title="Type" class="numeric"><?php echo lang_key($row->type); ?></td>

                                    <td data-title="Purpose" class="numeric"><?php echo lang_key($row->purpose) ?></td>

                                    <td data-title="Bedrooms" class="numeric"><?php echo $row->bedroomend ?> تا <?php echo $row->bedroomstart ?> </td>


                                    <!-- Prices !-->
                                    <td data-title="Sale Start" class="numeric"><?php echo show_price($row->salestart) ?></td>
                                    <td data-title="Sale End" class="numeric"><?php echo show_price($row->saleend) ?></td>
                                    <td data-title="Rahn Start" class="numeric"><?php echo show_price($row->rahnstart) ?></td>
                                    <td data-title="Rahn End" class="numeric"><?php echo show_price($row->rahnend) ?></td>
                                    <td data-title="Ejare Start" class="numeric"><?php echo show_price($row->ejarestart) ?></td>
                                    <td data-title="Ejare End" class="numeric"><?php echo show_price($row->ejareend) ?></td>



                                    <td data-title="Date" class="numeric"><?php echo getestatedate($row->date) ?></td>

                                    <td data-title="Status" class="numeric"><?php echo $row->status == 1 ? "گوش به زنگ" : "غیر فعال" ?></td>

                                    <td data-title="Receivedcount" class="numeric"><?php echo $row->receivedcount; ?> پیامک</td>

                                    <td data-title="Action" class="numeric">

                                        <div class="btn-group">

                                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> عملایت <span class="caret"></span></a>

                                            <ul class="dropdown-menu dropdown-info">

                                                <li><a href="<?php echo site_url('admin/phone/delete/' . $row->id); ?>">حذف</a></li>
                                                <?php if (is_admin()) { ?>
                                                    <?php if ($row->status == 0) { ?>
                                                        <li><a href="<?php echo site_url('admin/phone/enablephone/' . $curr_page . '/' . $row->id); ?>">فعال کردن دریافت پیامک</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="<?php echo site_url('admin/phone/disablephone/' . $curr_page . '/' . $row->id); ?>">غیر فعال کردن دریافت پیامک</a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>

                                        </div>

                                    </td>

                                </tr>

                                <?php
                                $i++;
                            endforeach;
                            ?>   

                        </tbody>

                    </table>

                </div>

                <div class="pagination"><ul class="pagination pagination-colory"><?php echo $pages; ?></ul></div>

            <?php } ?>

        </div>

    </div>

</div>