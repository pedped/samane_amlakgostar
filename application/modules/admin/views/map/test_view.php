<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=fa"></script>
<script type="text/javascript">
    var Ireland = "Dhaka, Bangladesh";
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 10
        };
        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        codeAddress(Ireland);//call the function
    }

    function codeAddress(address)
    {
        geocoder.geocode( {address:address}, function(results, status)
        {
            if (status == google.maps.GeocoderStatus.OK)
            {
                console.log(results[0].geometry.location.lat());
                $('#latitude').val(results[0].geometry.location.lat());
                $('#longitude').val(results[0].geometry.location.lng());
                map.setCenter(results[0].geometry.location);//center the map over the result
                //place a marker at the location
                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable:true,
                        animation: google.maps.Animation.DROP,
                        position: results[0].geometry.location
                    });

                google.maps.event.addListener(marker, 'dragend', function()
                {
                    var marker_positions = marker.getPosition();
                    $('#latitude').val(marker_positions.lat());
                    $('#longitude').val(marker_positions.lng());
                    console.log(marker.getPosition());
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>ساخت یک بسته جدید</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
          <div id="map-canvas" style="height: 200px; width: 500px;"></div>
        <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/realestate/addpackage');?>" method="post">
        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">عرض جغرافیایی:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" id="latitude" name="latitude" value="" placeholder="عرض جغرافیایی" class="form-control input-sm" >

          </div>
        </div>

            <div class="form-group">
                <label class="col-sm-2 col-lg-1 control-label">طول جغرافیایی:</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <input type="text" id="longitude" name="longitude" value="" placeholder="طول جغرافیایی" class="form-control input-sm" >

                </div>
            </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">توضیحات:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <!-- <input type="text" name="description" value="<?php echo(set_value('description')!='')?set_value('description'):'';?>" placeholder="Package Description" class="form-control input-sm" > -->
            <textarea name="description" value="<?php echo(set_value('description')!='')?set_value('description'):'';?>" placeholder="توضیحات بسته" class="form-control input-sm"></textarea>
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('description'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">قیمت:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="price" value="<?php echo(set_value('price')!='')?set_value('price'):'';?>" placeholder="قیمت بسته" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('price'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">حداکثر پست در روز:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="max_post" value="<?php echo(set_value('max_post')!='')?set_value('max_post'):'';?>" placeholder="حداکثر پست در روز" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('max_post'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">زمان انقضا:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="expiration_time" value="<?php echo(set_value('expiration_time')!='')?set_value('expiration_time'):'';?>" placeholder="تاریخ انقضای بسته" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('expiration_time'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-1 control-label">&nbsp;</label>
          <div class="col-sm-4 col-lg-5 controls">            
            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> ساخت بسته</button>
          </div>
        </div>


      </form>


    </div>
    </div>
  </div>
</div>