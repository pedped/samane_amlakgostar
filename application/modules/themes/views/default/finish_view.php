<div class="detail-title"><i class="fa fa-user"></i>&nbsp;
	<?php 
	if($this->session->userdata('renew')=='')
	echo lang_key('DBC_PAYMENT_FINISH_TITLE');
	else
	echo lang_key('DBC_RENEW_PAYMENT_FINISH_TITLE');
	?>
</div>
<div class="row">
    <div class="col-md-12" style="min-height:300px">
	<p>
		<?php 
		if($this->session->userdata('renew')=='')
		echo lang_key('DBC_PAYMENT_FINISH_TEXT');
		else
		echo lang_key('DBC_RENEW_PAYMENT_FINISH_TEXT');
		?>
	</p>
	</div>
</div>
