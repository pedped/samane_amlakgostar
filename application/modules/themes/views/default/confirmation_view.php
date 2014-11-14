<div class="detail-title"><i class="fa fa-user"></i>&nbsp;Confirmation</div>
<div class="row">
    <div class="col-md-12" style="min-height:300px">
        <p>You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email</p>
        <?php
        $action = (get_settings('paypal_settings','enable_sandbox_mode','No')=='Yes')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
        ?>
        <form action="<?php echo $action;?>" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="<?php echo get_settings('paypal_settings','email','none');?>">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="item_name" value="<?php echo get_settings('paypal_settings','item_name','Package');?>">
        <input type="hidden" name="amount" value="<?php echo $this->session->userdata('amount');?>">
        <input type="hidden" name="currency_code" value="<?php echo get_settings('paypal_settings','currency','USD');?>">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="rm" value="1">
        <input type="hidden" name="return" value="<?php echo site_url(get_settings('paypal_settings','finish_url','account/finish_url'));?>">
        <input type="hidden" name="cancel_return" value="<?php echo site_url(get_settings('paypal_settings','cancel_url','account/cancel_url'));?>">
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
        <input type="hidden" name="notify_url" value="<?php echo site_url('account/ipn_url');?>">
        <input type="hidden" name="custom" value="<?php echo $this->session->userdata('unique_id');?>">
        <button type="submit" class="btn btn-primary">رفتن به پیپال</button>
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        </p>
    </div>    
</div> <!-- /row -->
