/*jQuery(function($) {'use strict',

	var form = $('.contact-form');
	form.submit(function () {'use strict',
		$this = $(this);
		$.post("sendemail.php", $(".contact-form").serialize(),function(result){
			if(result.type == 'success'){
				$this.prev().text(result.message).fadeIn().delay(3000).fadeOut();
			}
		});
		return false;
	});

});*/

// Google Map Customization
(function(){

	var map;

	map = new GMaps({
		el: '#gmap',
		lat: -7.293443, 
		lng: 112.772622,
		scrollwheel:false,
		zoom: 15,
		zoomControl : true,
		panControl : true,
		streetViewControl : true,
		mapTypeControl: true,
		overviewMapControl: true,
		clickable: true
	});

	var image = '/images/logobatk-map-200.png';
	map.addMarker({
		lat: -7.293443,//43.1580159,
		lng: 112.772622,//-77.6030777,
		icon: image,
		animation: google.maps.Animation.DROP,
		verticalAlign: 'bottom',
		horizontalAlign: 'center',
		backgroundColor: '#ffffff',
	});

	var styles = [ 

	{
		"featureType": "road",
		"stylers": [
		{ "color": "" }
		]
	},{
		"featureType": "water",
		"stylers": [
		{ "color": "#A2DAF2" }
		]
	},{
		"featureType": "landscape",
		"stylers": [
		{ "color": "#ABCE83" }
		]
	},{
		"elementType": "labels.text.fill",
		"stylers": [
		{ "color": "#000000" }
		]
	},{
		"featureType": "poi",
		"stylers": [
		{ "color": "#2ECC71" }
		]
	},{
		"elementType": "labels.text",
		"stylers": [
		{ "saturation": 1 },
		{ "weight": 0.1 },
		{ "color": "#111111" }
		]
	}

	];

	map.addStyle({
		styledMapName:"Styled Map",
		styles: styles,
		mapTypeId: "map_style"  
	});

	map.setStyle("map_style");
}());