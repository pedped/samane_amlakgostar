<?php
$curr_page = $this->uri->segment(5);
if ($curr_page == '')
    $curr_page = 0;
?>
<!-- Phone Numbers !-->
<div class="col-md-12">

    <div class="box">

        <div class="box-title">

            <h3><i class="fa fa-bars"></i>پیامک های ارسالی</h3>

            <div class="box-tool">

                <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


            </div>

        </div>

        <div class="box-content">

            <?php echo $this->session->flashdata('msg'); ?>

            <?php if ($phones->num_rows() <= 0) { ?>

                <div class="alert alert-info">تاکنون پیامکی ارسال نکرده اید</div>

            <?php } else { ?>

                <div id="no-more-tables">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th class="numeric">#</th>

                                <th class="numeric">شماره تماس</th>

                                <th class="numeric">پیام</th>

                                <th class="numeric">تاریخ</th>

                                <th class="numeric">از شماره</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $i = $start + 1;
                            foreach ($phones->result() as $row):
                                ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $row->id; ?></td>

                                    <td data-title="Phone" class="numeric"><?php echo $row->phone; ?></td>

                                    <td data-title="Phone" class="numeric"><?php echo $row->message; ?></td>

                                    <td data-title="Date" class="numeric"><?php echo getestatedate($row->date) ?></td>

                                    <td data-title="Phone" class="numeric"><?php echo $row->fromnumber; ?></td>

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