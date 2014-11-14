<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>حذف شماره تماس</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <p>آیا برای حذف این رکورد از لیست دریافت کنندگان مطمئن هستید</p>
                <?php echo $this->session->flashdata('msg'); ?>
                <form action="<?php echo site_url('admin/phone/delete/' . $id); ?>" method="post">
                    <input type="hidden" name="phone" placeholder="چیزی تایپ کنید" value="hello">
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>

        </div>

    </div>

</div>					
