<?php if ($query->num_rows() <= 0) : ?>
    <div class="alert alert-warning"><?php echo lang_key('DBC_NO_ESTATES_FOUND'); ?></div>
<?php else: ?>
    <table class="table table-bordered table-responsive table-hover amlak-lists">
        <th>کد</th>
        <th>تصویر</th>
        <th>استان</th>
        <th>شهر</th>
        <th>آدرس</th>
        <th>نوع ملک</th>
        <th>جهت</th>
        <th>وضعیت فعلی</th>
        <th>خواب</th>
        <th>سرویس بهداشتی</th>
        <th>متراژ</th>
        <th>قیمت فروش</th>
        <th>رهن</th>
        <th>اجاره</th>
        <th>تاریخ</th>
        <?php foreach ($query->result() as $row) : ?>
            <tr>
                <td>
                    <!-- ID !-->
                    <?= $row->id ?>
                </td>
                <td>
                    <!-- Image !-->
                    <img class="thumbnail" style="width:50px;margin-bottom:0px;" src="<?php echo get_featured_photo_by_id($row->featured_img); ?>" />
                </td>
                <td>
                    <!-- Ostan !-->
                    <?= get_location_name_by_id($row->state) ?>
                </td>
                <td> 
                    <!-- City !-->
                    <?= get_location_name_by_id($row->city) ?>
                </td>
                <td>
                    <!-- Address !-->
                    <?= $row->address ?>
                </td>
                <td>
                    <!-- Noe Melk !-->
                    <?= lang_key($row->type); ?>
                </td>
                <td>
                    <!-- Jahat !-->
                    <?= lang_key($row->purpose); ?>
                </td>
                <td>
                    <!-- وضعیت فعلی !-->
                    <?= lang_key($row->estate_condition); ?>
                </td>
                <td> 
                    <!-- khab  !-->
                    <?= $row->bedroom; ?>
                </td>
                <td>
                    <!-- hamam !-->
                    <?= $row->bath; ?>
                </td>
                <td> 
                    <!-- hamam !-->
                    <?php if ($row->type == 'DBC_TYPE_LAND') { ?>
                        <?php echo $row->lot_size; ?> متر مربع
                    <?php } else { ?>
                        <?php echo $row->home_size; ?> متر مربع
                    <?php } ?>
                </td>
                <td>
                    <!-- Sale Price !-->
                    <?php if ($row->purpose == "DBC_PURPOSE_SALE"): ?>
                        <?= show_price($row->total_price); ?>
                    <?php elseif ($row->purpose == "DBC_PURPOSE_BOTH"): ?>
                        <?= show_price($row->total_price); ?>
                    <?php elseif ($row->purpose == "DBC_PURPOSE_RENT"): ?>
                        <?= show_price(0); ?>
                    <?php endif; ?>

                </td>
                <td>
                    <!-- Rahn !-->
                    <?= show_price($row->rent_pricerahn); ?>
                </td>
                <td>
                    <!-- Rent Price !-->
                    <?= show_price($row->rent_price); ?>
                </td>

                <td>
                    <!-- Date !-->
                    <?= getestatedate($row->adddate); ?>
                </td>
                <td>
                    <!-- See !-->
                    <a href="<?php echo site_url('show/detail/' . $row->unique_id . '/' ); ?>" class="btn btn-primary btn-readmorepoperty">
                        <?php echo lang_key('DBC_DETAILS'); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
<?php endif; ?>


