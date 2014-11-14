<?php
$curr_page = $this->uri->segment(5);
if ($curr_page == '')
    $curr_page = 0;
$dl = default_lang();
?>
<div class="row">

    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-filter"></i> فیلتر ها</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>

            <div class="box-content">
                <form action="" method="post" id="filter_form">
                    <div class="col-md-3">
                        <label>منظور: </label>
                        <?php $purposes = array("DBC_PURPOSE_SALE", "DBC_PURPOSE_RENT", "DBC_PURPOSE_BOTH"); ?>
                        <select id="purpose-select" name="filter_purpose" class="form-control input-sm filters">
                            <option value=""><?php echo lang_key('DBC_ALL'); ?></option>
                            <?php
                            foreach ($purposes as $purpose) {
                                $sel = ($purpose == $this->session->userdata('filter_purpose')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $purpose; ?>" <?php echo $sel; ?>><?php echo lang_key($purpose); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>نوع: </label>
                        <?php $types = array("DBC_TYPE_APARTMENT", "DBC_TYPE_HOUSE", "DBC_TYPE_LAND", "DBC_TYPE_COMSPACE", "DBC_TYPE_CONDO", "DBC_TYPE_VILLA"); ?>
                        <select id="" name="filter_type" class="form-control input-sm filters">
                            <option value=""><?php echo lang_key('DBC_ALL'); ?></option>
                            <?php
                            foreach ($types as $type) {
                                $sel = ($type == $this->session->userdata('filter_type')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $type; ?>" <?php echo $sel; ?>><?php echo lang_key($type); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>وضعیت ملک: </label>
                        <?php $conditions = array("DBC_CONDITION_AVAILABLE", "DBC_CONDITION_SOLD"); ?>
                        <select name="filter_condition" class="form-control input-sm filters">
                            <option value=""><?php echo lang_key('DBC_ALL'); ?></option>
                            <?php
                            foreach ($conditions as $status) {
                                $sel = ($status == $this->session->userdata('filter_condition')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $status; ?>" <?php echo $sel; ?>><?php echo lang_key($status); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>تعداد خواب: </label>
                        <?php $conditions = array("1", "2", "3", "4", "5", "6", "7", "8"); ?>
                        <select name="filter_beds" class="form-control input-sm filters">
                            <option value=""><?php echo lang_key('DBC_ALL'); ?></option>
                            <?php
                            foreach ($conditions as $status) {
                                $sel = ($status == $this->session->userdata('filter_beds')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $status; ?>" <?php echo $sel; ?>><?php echo lang_key($status); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>وضعیت: </label>
                        <?php $types = array("DBC_DELETED", "DBC_ACTIVE", "DBC_PENDING", "DBC_REPORTED"); ?>
                        <select id="" name="filter_status" class="form-control input-sm filters">
                            <option selected="<?php echo strlen($this->session->userdata('filter_status')) == 0 ? "selected" : ""; ?>" value=""><?php echo lang_key('DBC_ALL'); ?></option>
                            <?php
                            foreach ($types as $key => $type) {
                                $sel = (strlen($this->session->userdata('filter_status')) > 0 && intval($key) === intval($this->session->userdata('filter_status'))) ? 'selected="selected"' : '';
                                ?>
                                <option mi="<?php echo $this->session->userdata('filter_status') ?>"  value="<?php echo $key; ?>" <?php echo $sel; ?>><?php echo lang_key($type); ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>مرتب سازی بر اساس: </label>
                        <?php $orderby = array("id" => "کد ملک", "adddate" => "تاریخ", "home_size" => "متراژ ملک", "total_price" => "قیمت"); ?>
                        <select name="filter_orderby" class="form-control input-sm filters">
                            <option value=""><?php echo lang_key('DBC_NONE'); ?></option>
                            <?php
                            foreach ($orderby as $key => $order) {
                                $sel = ($key == $this->session->userdata('filter_orderby')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $key; ?>" <?php echo $sel; ?>><?php echo lang_key($order); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>مرتب سازی به صورت: </label>
                        <?php $ordertype = array("ASC", "DESC"); ?>
                        <select name="filter_ordertype" class="form-control input-sm filters">
                            <?php
                            foreach ($ordertype as $type) {
                                $sel = ($type == $this->session->userdata('filter_ordertype')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $type; ?>" <?php echo $sel; ?>><?php echo lang_key($type); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
                <div class="clearfix" style="height:110px;"></div>  
            </div>

        </div>
    </div>    


    <div class="col-md-12">

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i> تمامی املاک</h3>

                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


                </div>

            </div>

            <div class="box-content">

                <?php echo $this->session->flashdata('msg'); ?>

                <?php if ($posts->num_rows() <= 0) { ?>

                    <div class="alert alert-info">هیچ ملکی بافت نگردید</div>

                <?php } else { ?>

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric">تصویر</th>

                                    <th class="numeric">تیتر</th>

                                    <th class="numeric">نوع</th>

                                    <th class="numeric">منظور</th>

                                    <th class="numeric">وضعیت ملک</th>

                                    <th class="numeric">قیمت</th>

                                    <th class="numeric">وضعیت در سایت</th>

                                    <th class="numeric">برجسته</th>

                                    <th class="numeric">تاریخ</th>

                                    <th class="numeric">تنظیمات</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php
                                $i = $start + 1;
                                foreach ($posts->result() as $row):
                                    ?>

                                    <tr>

                                        <td data-title="#" class="numeric"><?php echo $row->id; ?></td>

                                        <td data-title="Thumb" class="numeric"><img class="thumbnail" style="width:50px;margin-bottom:0px;" src="<?php echo get_featured_photo_by_id($row->featured_img); ?>" /></td>

                                        <td data-title="Title" class="numeric"><?php echo get_title_for_edit_by_id_lang($row->id, $dl); ?></td>

                                        <td data-title="Type" class="numeric"><?php echo lang_key($row->type); ?></td>

                                        <td data-title="Purpose" class="numeric"><?php echo lang_key($row->purpose) ?></td>

                                        <td data-title="Condition" class="numeric"><?php echo lang_key($row->estate_condition) ?></td>

                                        <td data-title="Price" class="numeric"><?php echo $row->total_price; ?></td>

                                        <td data-title="Status" class="numeric"><?php echo get_status_title_by_value($row->status); ?></td>

                                        <td data-title="Featured" class="numeric"><?php echo ($row->featured == 1) ? '<div class="featureyes">بله</div>' : '<div class="featureno">خیر</div>'; ?></td>

                                        <td data-title="Featured" class="numeric"><?php echo getestatedate($row->adddate) ?></td>

                                        <td data-title="Action" class="numeric">

                                            <div class="btn-group">

                                                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> عملایت <span class="caret"></span></a>

                                                <ul class="dropdown-menu dropdown-info">

                                                    <li><a href="<?php echo site_url('admin/realestate/editestate/' . $curr_page . '/' . $row->id); ?>">ویرایش</a></li>
                                                    <li><a href="<?php echo site_url('admin/realestate/deleteestate/' . $curr_page . '/' . $row->id); ?>">حذف</a></li>
                                                    <?php if (is_admin()) { ?>
                                                        <?php if ($row->status == 2) { ?>
                                                            <li><a href="<?php echo site_url('admin/realestate/approveestate/' . $curr_page . '/' . $row->id); ?>">پذیرفته</a></li>
                                                        <?php } ?>
                                                        <?php if ($row->featured == 0) { ?>
                                                            <li><a href="<?php echo site_url('admin/realestate/featurepost/' . $curr_page . '/' . $row->id); ?>">انتخاب به عنوان برجسته</a></li>
                                                        <?php } else { ?>
                                                            <li><a href="<?php echo site_url('admin/realestate/removefeaturepost/' . $curr_page . '/' . $row->id); ?>">حذف برجسته سازی</a></li>
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

                <?php } ?>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.filters').change(function() {
            jQuery('#filter_form').submit();
        });
    });
</script>
