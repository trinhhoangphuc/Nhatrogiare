@extends('layouts.homepage.master')
@section('title')
Đăng Tin
@endsection
@section('content')
<style type="text/css" media="screen">
	.error{color: red;}
</style>
<div class="container"> 
	<div class="row profile">        
		<div class="col-md-3">          
			@include("layouts.homepage.menu-profile")    
		</div>      
		<div class="col-md-9"> 
			<div class="profile-content">
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-10">
						<div style="text-align: center;"><h3 style="color: #ff9511">Đăng Tin Cho Thuê</h3></div>
						<form action="{{route('postNews')}}" method="POST" enctype="multipart/form-data" id="validation">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="txttitle">Tiêu đề bài đăng:</label>
										<input type="text" class="form-control none-radius" id="txttitle" name="txttitle" placeholder="Nhập tiêu đề" required />
										<p style="color:red;" id="errorName" class="hidden"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Địa chỉ phòng trọ:</label> Bạn có thể nhập hoặc chọn ví trí trên bản đồ 
										<input type="text" id="location-text-box" name="txtaddress" class="form-control none-radius" value="" placeholder="Nhập địa chỉ" required/>
										<input type="hidden" id="txtaddress" name="txtaddress" value=""  class="form-control"  />
										<input type="hidden" id="txtlat" value="" name="txtlat"  class="form-control"  />
										<input type="hidden" id="txtlng"  value="" name="txtlng" class="form-control" />
										<p style="color:red;" id="errorAddress" class="hidden"></p>
									</div>
									<div id="map" style="width: auto; height: 300px;"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="price">Giá phòng( vnđ ):</label>
										<input type="number" name="txtprice" class="form-control none-radius" placeholder="750000" required id="price" />
										<p style="color:red;" id="errorPrice" class="hidden"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="txtarea">Diện tích( m<sup>2</sup> ):</label>
										<input type="number" name="txtarea" class="form-control none-radius " placeholder="16" required id="txtarea">
										<p style="color:red;" id="errorArea" class="hidden"></p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="iddistrict">Quận/ Huyện:</label>
										<select class="selectpicker" data-live-search="true" name="iddistrict" required  id="iddistrict">
											@foreach($tinh as $item)
											<option data-tokens="{{$item->slug}}" value="{{$item->ma}}">{{$item->ten}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="idcategory">Loại phòng:</label>
										<select class="selectpicker" data-live-search="true" name="idcategory" required id="idcategory">
											@foreach($loai as $item)
											<option data-tokens="{{$item->slug}}" value="{{$item->ma}}">{{$item->ten}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txtphone">SĐT Liên hệ:</label>
										<input type="text" name="txtphone" class="form-control none-radius" placeholder="0123456" required id="txtphone" /> 
										<p style="color:red;" id="errorPhone" class="hidden"></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="txtdescription">Mô tả ngắn:</label>
										<textarea class="form-control none-radius" rows="5" name="txtdescription" style=" resize: none;" id="txtdescription"></textarea>
										<script>
											CKEDITOR.replace( 'txtdescription' );
										</script>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="comment">Thêm hình ảnh:</label>
										<div class="file-loading"> 
											<input id="input-b3" name="hinhanh[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="chọn hình ảnh" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]'>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group pull-right"> 
										<button type="submit" class="btn btn-warning" id="postNews">Cập Nhật</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-1"></div>
				</div>
			</div>
		</div>       
<script type="text/javascript">
	$(function() {
$("#validation").validate({
    	rules: {
				txttitle: {   // đây là trường name của input
					required: true  // không được để trống
				},
				txtaddress: {
					required: true,
				},
				txtprice : { 
					required: true, 
					number : true, //  bắt buộc là kiểu số
					digits :true,  // không được tồn tại số âm
				},
				txtarea : { 
					required: true, 
					number : true, //  bắt buộc là kiểu số
					digits :true,  // không được tồn tại số âm
				},
				txtphone : { 
					required: true, 
					number : true, //  bắt buộc là kiểu số
					digits :true,  // không được tồn tại số âm
					maxlength: 20
				}
			},
			messages: {
				txttitle: {
					required: "Xin vui lòng nhập tên !"
				},
				txtaddress: {
					required: "Xin vui lòng nhập địa chỉ !",
				},
				txtphone: {
					required: "Xin vui lòng nhập số điện thoại !",
					number : "Số điện thoại bắt buộc là kiểu số !",
					digits : "Số điện thoại không được nhập số âm !",
					maxlength : "Số điện thoại không được nhập quá 20 ký tự !"
				},
				txtarea: {
					required: "Xin vui lòng nhập số điện thoại !",
					number : "Số điện thoại bắt buộc là kiểu số !",
					digits : "Số điện thoại không được nhập số âm !",
					
				},
				txtprice: {
					required: "Xin vui lòng nhập số điện thoại !",
					number : "Số điện thoại bắt buộc là kiểu số !",
					digits : "Số điện thoại không được nhập số âm !",

				}
			}
		});
	});
</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&libraries=geometry,places" async defer></script>
<script>
  var map;
  var marker;
  function initialize() {
    var mapOptions = {
      center: {lat: 16.070372, lng: 108.214388},
      zoom: 12
    };
    map = new google.maps.Map(document.getElementById('map'),
      mapOptions);

  // Get GEOLOCATION
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
        position.coords.longitude);
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        'latLng': pos
      }, function (results, status) {
        if (status ==
          google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            console.log(results[0].formatted_address);
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
      map.setCenter(pos);
      marker = new google.maps.Marker({
        position: pos,
        map: map,
        draggable: true
      });
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }

  function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
      var content = 'Error: The Geolocation service failed.';
    } else {
      var content = 'Error: Your browser doesn\'t support geolocation.';
    }

    var options = {
      map: map,
      zoom: 19,
      position: new google.maps.LatLng(16.070372,108.214388),
      content: content
    };

    map.setCenter(options.position);
    marker = new google.maps.Marker({
      position: options.position,
      map: map,
      zoom: 19,
      icon: "public/images/layouts/gps1.png",
      draggable: true
    });
    /* Dragend Marker */ 
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#location-text-box').val(results[0].formatted_address);
            $('#txtaddress').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
    /* End Dragend */

  }

  // get places auto-complete when user type in location-text-box
  var input = /** @type {HTMLInputElement} */
  (
    document.getElementById('location-text-box'));


  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  marker = new google.maps.Marker({
    map: map,
    icon: "public/images/layouts/gps1.png",
    anchorPoint: new google.maps.Point(0, -29),
    draggable: true
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': place.geometry.location}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#txtaddress').val(results[0].formatted_address);
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        }
      }
    });
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }
    marker.setIcon( /** @type {google.maps.Icon} */ ({
      url: "public/images/layouts/gps1.png"
    }));
    document.getElementById('txtlat').value = place.geometry.location.lat();
    document.getElementById('txtlng').value = place.geometry.location.lng();
    console.log(place.geometry.location.lat());
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
      (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    /* Dragend Marker */ 
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#location-text-box').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
    /* End Dragend */
  });

}


// google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
