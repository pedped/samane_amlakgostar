 <?php
$layout = get_page_layout($alias);
if(isset($page['content_from']) && $page['content_from']=='Manual')
{
    $sidebar = $page['sidebar'];
} 
?>
 <div class="row">
 	<?php if($layout==0){?>
 	<div class="col-md-3">
 		<?php
			if(isset($sidebar) && $sidebar!='')
	        {
	            echo $sidebar;
	        }
 		?>
 	</div>
 	<?php }?>

 	<div class="col-md-9"> 
		<?php 	
			if($query->num_rows()<=0)
			{
				?>
				<div class="alert alert-info">
		        <button data-dismiss="alert" class="close" type="button">×</button>
		        <strong>Oops, page not found :(
			    </div>
				<?php
			}
			else
			{
				$row = $query->row();

				if($row->status!=1)
				{
					?>
					<div class="alert alert-info">
			        <button data-dismiss="alert" class="close" type="button">×</button>
			        <strong><?php echo lang_key('DBC_OOPS'); ?> :(
				    </div>
					<?php
				}
				else

					echo '<div style="min-height:300px;margin-top:20px;">'.$row->content.'</div>';
			}
		?>
	</div>
	
	<?php if($layout==1){?>
	<div class="col-md-3">
 		<?php
			if(isset($sidebar) && $sidebar!='')
	        {
	            echo $sidebar;
	        }
 		?>
	</div>
	<?php }?>		

</div>