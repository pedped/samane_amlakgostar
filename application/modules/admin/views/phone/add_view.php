<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>افزودن شماره تماس</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">



                <form action="<?php echo site_url('admin/phone/add'); ?>" method="post">

                    <?php echo $this->session->flashdata('msg'); ?>

                    <div class="form-group">
                        <label class="col-sm-12 col-lg-12 control-label">اطلاعات شخص نیارمند ملک را در این قسمت وارد نمایید</label>
                    </div>


                    <!-- phone !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">شماره تماس</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('phone'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                    <!-- type !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">نوع ملک</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <?php $types = array("DBC_TYPE_APARTMENT", "DBC_TYPE_HOUSE", "DBC_TYPE_LAND", "DBC_TYPE_COMSPACE", "DBC_TYPE_CONDO", "DBC_TYPE_VILLA"); ?>
                            <select id="" name="type" class="form-control input-sm filters">
                                <?php
                                foreach ($types as $type) {
                                    ?>
                                    <option value="<?php echo $type; ?>"><?php echo lang_key($type); ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('type'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- purpose !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">منظور</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <?php $purposes = array("DBC_PURPOSE_SALE", "DBC_PURPOSE_RENT", "DBC_PURPOSE_BOTH"); ?>
                            <select id="purpose-select" name="purpose" class="form-control input-sm filters">
                                <?php
                                foreach ($purposes as $purpose) {
                                    ?>
                                    <option value="<?php echo $purpose; ?>"><?php echo lang_key($purpose); ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('purpose'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                    <!-- bed start !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">حداقل تعداد خواب</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <?php $conditions = array("1", "2", "3", "4", "5", "6", "7", "8"); ?>
                            <select name="bedstart" class="form-control input-sm filters">
                                <?php
                                foreach ($conditions as $status) {
                                    ?>
                                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('bedstart'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- bed end !-->
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-2 control-label">حداکثر تعداد خواب</label>
                        <div class="col-sm-2 col-lg-3 controls">
                            <?php $conditions = array("1", "2", "3", "4", "5", "6", "7", "8"); ?>
                            <select name="bedend" class="form-control input-sm filters">
                                <?php
                                foreach ($conditions as $status) {
                                    ?>
                                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('bedend'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <br/>
                    <br/>
                    <span class="alert alert-info">در صورتی که شخص به دنبال ملک با قیمت خاصی میباشد، اطلاعات زیر را وارد نمایید</span>
                    <br/>
                    <br/>




                    <div id="salebox">
                        <!-- salestart !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">حداقل قیمت فروش</label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="salestart" value="<?php echo set_value('salestart'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('salestart'); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <!-- saleend !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">حداکثر قیمت فروش </label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="saleend" value="<?php echo set_value('saleend'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('saleend'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>

                    <div id="rahnbox">

                        <!-- rahnstart !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">حداقل رهن</label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="rahnstart" value="<?php echo set_value('rahnstart'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('rahnstart'); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <!-- rahnend !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">جداکثر رهن</label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="rahnend" value="<?php echo set_value('rahnend'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('rahnend'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                    <div id="ejarebox">
                        <!-- ejarestart !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">حداقل اجاره</label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="ejarestart" value="<?php echo set_value('ejarestart'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('ejarestart'); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <!-- ejareend !-->
                        <div class="form-group">
                            <label class="col-sm-2 col-lg-2 control-label">حداکثر اجاره</label>
                            <div class="col-sm-2 col-lg-3 controls">
                                <input type="text" name="ejareend" value="<?php echo set_value('ejareend'); ?>" placeholder="چیزی تایپ کنید" class="form-control" >
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('ejareend'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <button type="submit" class="btn btn-primary">ذخیره</button>

                </form>



            </div>

        </div>

    </div>

</div>
<script>


    // hide defaults
    $("#rahnbox").hide();
    $("#ejarebox").hide();

    $("#purpose-select").change(function() {

        // hide others

        $("#salebox").hide();
        $("#rahnbox").hide();
        $("#ejarebox").hide();

        if ($(this).val() == "DBC_PURPOSE_BOTH")
        {
            $("#salebox").show();
            $("#rahnbox").show();
            $("#ejarebox").show();

        } else if ($(this).val() == "DBC_PURPOSE_RENT") {

            $("#salebox").hide();
            $("#rahnbox").show();
            $("#ejarebox").show();
        } else if ($(this).val() == "DBC_PURPOSE_SALE")
        {
            $("#salebox").show();
            $("#rahnbox").hide();
            $("#ejarebox").hide();
        }
    });

</script>
