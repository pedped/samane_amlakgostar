<style type="text/css">
    #sortable1, #sortable2 {
        list-style-type: none;
        margin: 0;
        padding: 0;
        float: left;
        margin-right: 10px;
        background: #eee;
        padding: 5px;
        width:90%;
        border: 1px dotted #000;
    }
</style>
<script src="<?php echo base_url();?>assets/admin/assets/js/jquery-ui.js"></script>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>موقعیت ویجت</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <form action="<?php echo site_url('admin/widgets/widgetpositions')?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-1 control-label">موقعیت ویجت:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <select name="position" class="form-control input-sm">
                                <?php foreach($positions as $position){?>
                                    <?php $sel=($selected_pos==$position->name)?'selected="selected"':'';?>
                                    <option value="<?php echo $position->name;?>" <?php echo $sel;?>><?php echo $position->name;?></option>
                                <?php }?>
                            </select>
                            <span class="help-inline">&nbsp;</span>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-sm-2 col-lg-1 control-label">&nbsp;</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> نمایش</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>ویجت های موجود</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <?php
                $active_widgets_array = array();
                if(!empty($active_widgets)){
                    foreach ($active_widgets as $widget) {
                        $active_widgets_array[$widget] = 1;
                    }
                }
                ?>
                <ol id="sortable1" class="droptrue">
                    <?php foreach($widgets->result() as $row){?>
                        <?php if(isset($active_widgets_array[$row->alias])==FALSE){?>
                            <li class="thumbnail" style="margin-bottom:10px;cursor: move;height:41px;">
                                <input type="hidden" name="widget[]" value="<?php echo $row->alias;?>">
                                <div style="float:left;padding:5px;"><?php echo $row->name;?></div>
                                <a href="<?php echo site_url('admin/widgets/edit/'.$row->alias);?>" style="float:right;" class="edit-widget btn btn-info">ویرایش</a>
                            </li>
                        <?php }?>
                    <?php }?>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>ویجت های فعال</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <form action="<?php echo site_url('admin/widgets/savewidgetpositions');?>" id="positions_widgets_form" method="post">
                    <input type="hidden" name="position" value="<?php echo $selected_pos;?>">
                    <h5>Active widgets : <?php echo $selected_pos;?></h5>
                    <?php
                    $CI = get_instance();
                    $CI->load->model('widget_model');
                    ?>
                    <ol id="sortable2" class="droptrue active-widgets">
                        <?php 
                        if(!empty($active_widgets))
                        {
                            foreach ($active_widgets as $widget) 
                            {
                                $row = $CI->widget_model->get_widget_by_alias($widget);
                                if(is_array($row) && count($row)<=0)
                                {
                                    echo 'widget not found';
                                }
                                else
                                {
                                    ?>
                                    <li class="thumbnail" style="margin-bottom:10px;cursor: move;height:41px;">
                                        <input type="hidden" name="widget[]" value="<?php echo $widget;?>">
                                        <div style="float:left;padding:5px;"><?php echo $row->name;?></div>
                                        <a href="<?php echo site_url('admin/widgets/edit/'.$widget);?>" style="float:right;" class="edit-widget btn btn-info">ویرایش</a>
                                    </li>
                                <?php
                                }
                            }
                        }
                        ?>
                    </ol>
                    <div class="clearfix"></div>
                    <input type="submit" value="Save" class="btn btn-success" style="margin-top:10px;"/>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="editWidgetModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery( "ol.droptrue" ).sortable({
		connectWith: "ol"
	});

	jQuery( "#sortable1, #sortable2" ).disableSelection();
	
	jQuery(".edit-widget").click(function(event){
		event.preventDefault();
		var loadUrl = jQuery(this).attr("href");
		jQuery('#editWidgetModal').modal('show');
		jQuery("#editWidgetModal  .modal-body").html("Loading...");
		jQuery.get(
				loadUrl,
				{},
				function(responseText){
					jQuery("#editWidgetModal  .modal-body").html(responseText);
				},
				"html"
			);
	});
});
</script>