function initialize() {
	
	var styles = [ { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [ { "color": "#808080" } ] },{ "featureType": "poi.park", "stylers": [ { "color": "#777777" } ] },{ "featureType": "poi.school", "stylers": [ { "color": "#999999" } ] },{ "stylers": [ { "visibility": "simplified" }, { "hue": "#0800ff" }, { "lightness": -5 }, { "gamma": 0.76 } ] },{ "featureType": "poi.sports_complex", "stylers": [ { "visibility": "simplified" }, { "color": "#bbbbbb" } ] },{ "featureType": "water", "stylers": [ { "visibility": "simplified" }, { "color": "#eeeeee" } ] },{ "featureType": "poi.sports_complex", "stylers": [ { "color": "#bbbbbb" } ] },{ "featureType": "poi.business", "stylers": [ { "color": "#dddddd" } ] },{ "elementType": "labels", "stylers": [ { "visibility": "off" } ] } ];
	
	//http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html

	var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

	var mapOptions = {
		center: { lat: 52.674666, lng: -8.577180},		
		scrollwheel: false,
		panControl: false,
		zoomControl: false,
		scaleControl: false,
		streetViewControl:false,
		mapTypeControl:false,
		zoom: 16,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
	};
	
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	var myLatlng = new google.maps.LatLng(52.674666, -8.577180);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: "BlueChief"
	});
	
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
}

google.maps.event.addDomListener(window, 'load', initialize);


/*if (document.getElementById('map-canvas-room')){

	var map_title = $('#map-canvas-room').attr('data-title');
	var lat = ($('#map-canvas-room').attr('data-lat'));
	var lng = ($('#map-canvas-room').attr('data-lng'));

	var myLatlng = new google.maps.LatLng(lat, lng);

	var mapOptions = {
		scrollwheel: false,
		zoom: 15,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById('map-canvas-room'), mapOptions);

	//marker1.....
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: map_title
	});
}*/


(function ($) {
	
	$('#php_logo').show();
	$('#apple').show();
	
	$(document).ready(function(){
		
		// ======================================================
		// Doughnut Chart
		// ======================================================

//		Chart.defaults.global = {
//			// Boolean - Whether to animate the chart
//			animation: true,
//			responsive: true
//		}
		// Doughnut Chart Options
		var doughnutOptions = {
			responsive: true
			/*segmentShowStroke : true,
			segmentStrokeColor : "#fff",
			segmentStrokeWidth : 2,
			percentageInnerCutout : 50,
			animation : true,
			animationSteps : 100,
			animationEasing : "easeOutBounce",
			animateRotate : true,
			animateScale : true,
			onAnimationComplete : null*/
		}


		// Doughnut Chart Data
		var doughnutData = [
			{
				value: 40,
				color:"#2182F2",
				highlight: "#FF5A5E",
				label: "PHP"
			},
			{
				value: 15,
				color: "#DE9100",
				highlight: "#5AD3D1",
				label: "Java"
			},
			{
				value: 15,
				color: "#CC0E48",
				highlight: "#FFC870",
				label: "ASP.Net"
			},
			{
				value: 10,
				color: "#444",
				highlight: "#FFC870",
				label: "VB VB.Net"
			},
			{
				value: 10,
				color: "#6EBE74",
				highlight: "#FFC870",
				label: "Python"
			}
		]
		
		// Doughnut Chart Data
		var doughnutData_b = {
			labels: ["JQuery/AJAX", "The Basics", "Frameworks", "Task Runners", "Social API's", "CMS"],
				datasets: [
					{
						label: "",
						fillColor: "rgba(220,220,220,0.2)",
						strokeColor: "rgba(222, 145, 0, 0.8)",
						pointColor: "#DE9100",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [95, 0, 89, 0, 70, 0]
					},
					{
						label: "",
						fillColor: "rgba(151,187,205,0.2)",
						strokeColor: "rgba(33, 130, 242, 0.8)",
						pointColor: "#2182F2",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(151,187,205,1)",
						data: [0, 92, 0, 65, 0, 65]
					}
				]
			};

		var doughnutData_c = [
			{
				value: 100,
				color:"#2182F2",
				highlight: "#FF5A5E",
				label: "Linux/Unix"
			},
			{
				value: 90,
				color: "#DE9100",
				highlight: "#5AD3D1",
				label: "Windows"
			},
			{
				value: 75,
				color: "#CC0E48",
				highlight: "#FFC870",
				label: "Mac"
			}
		];


		//Get the context of the Doughnut Chart canvas element we want to select
		var ctx = document.getElementById("doughnutChart").getContext("2d");
		var ctx_b = document.getElementById("doughnutChart-b").getContext("2d");
		var ctx_c = document.getElementById("doughnutChart-c").getContext("2d");

		// Create the Doughnut Chart
		var mydoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
		var mydoughnutChart_b = new Chart(ctx_b).Radar(doughnutData_b, doughnutOptions);
		var mydoughnutChart_c = new Chart(ctx_c).PolarArea(doughnutData_c, doughnutOptions);


		// hide .navbar first
		$(".navbar").hide();

		// fade in .navbar
		$(function () {
			$(window).scroll(function () {

				// set distance user needs to scroll before we start fadeIn
				if ($(this).scrollTop() > 100) {
					$('.navbar').fadeIn();
				} else {
					$('.navbar').fadeOut();
				}
			});
		});
		
		

	});
}(jQuery));

$(document).ready(function(){			
	
	$(function() {
		
		$('a[href*=#]:not([href=#])').click(function() {
			
			if($(this).attr('data-toggle')){
				
			}
			else{
				$('.navbar-nav li').click(function(){
					$('.navbar-nav li').removeClass('active');
					$(this).addClass('active');
				});		

				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

					if($(this).parent().parent().hasClass('navbar-nav')){
						$('.navbar-nav li').removeClass('active');
						$(this).parent().addClass('active');
					}
					else{
						$('.navbar-nav li').removeClass('active');
					}

					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			}
		});
	});
	
	
    
    parallax_init();
	
	setTimeout(function(){draw_hr("#svg_hr");},1500);
	
	if($(window).width() > 768){
		var svg_arr = [200, 300, 670, 1000];
	}
	if($(window).width() <= 768){
		var svg_arr = [50, 455, 1150, 1650];
	}
	
	$(function(){
		var trig_a, trig_b, trig_c, trig_d = false;
		
		draw_single_hr("#svg_hr_footer", '#2182f2'); 
		draw_single_hr("#svg_hr_about", '#2182f2');
		
		$(window).scroll(function() {

			if ($(this).scrollTop() >= svg_arr[0] && !trig_a) {
				trig_a = true;
			}
			if ($(this).scrollTop() >= svg_arr[1] && !trig_b) {
				trig_b = true;
				draw_single_hr("#svg_hr_b", '#de9100'); 
				svg_b_animate();
			}
			if ($(this).scrollTop() >= svg_arr[2] && !trig_c) {
				trig_c = true;
				draw_single_hr("#svg_hr_c", '#cc0e48'); 
				svg_c_animate();
			}
			if ($(this).scrollTop() >= svg_arr[3] && !trig_d) {
				trig_d = true;
				svg_a_animate();
			}
		});
	});
	
	$(window).resize(function(){

		draw_hr("#svg_hr",true);
	});
	
    function draw_hr(hr_id, resize){
		
		$(hr_id).empty();
        var snap_hr = Snap(hr_id); 

		var thickness = (1000/$(window).width());
		
		var snap_hr_path = snap_hr.path("m 30,"+(thickness*2)+",940,0");
		var snap_hr_path_b = snap_hr.path("m 60,"+(thickness*9)+",880,0");
		var snap_hr_path_c = snap_hr.path("m 30,"+(thickness*16)+",940,0");

		if(resize){
			draw_svg(snap_hr_path, 0, thickness*2, '#2182f2');
			draw_svg(snap_hr_path_b, 0, thickness*2, '#de9100');
			draw_svg(snap_hr_path_c, 0, thickness*2, '#cc0e48');
		}
		else{
			setTimeout(function () { draw_svg(snap_hr_path, 1000, thickness*2, '#2182f2'); }, 0);
			setTimeout(function () { draw_svg(snap_hr_path_b, 1000, thickness*2, '#de9100'); }, 100);
			setTimeout(function () { draw_svg(snap_hr_path_c, 1000, thickness*2, '#cc0e48'); }, 200);
		}
    }
	
	function draw_single_hr(hr_id, line_color){
		var snap_hr = Snap(hr_id); 
		var thickness = (1000/$(window).width());
		
		var snap_hr_path = snap_hr.path("m 0,1,1000,0");
		setTimeout(function () { draw_svg(snap_hr_path, 1000, thickness*2, line_color); }, 0);
	}
    
    function parallax_init(){
        
        // init controller
        var controller = new ScrollMagic({globalSceneOptions: {triggerHook: "onEnter", duration: $(window).height()*2}});

        // build scenes
        new ScrollScene({triggerElement: "#parallax1"})
        .setTween(TweenMax.from("#parallax1 > div", 1, {top: "-80%", ease: Linear.easeNone}))
        .addTo(controller);

        new ScrollScene({triggerElement: "#parallax2"})
        .setTween(TweenMax.from("#parallax2 > div", 1, {top: "-95%", ease: Linear.easeNone}))
        .addTo(controller);
		
		new ScrollScene({triggerElement: "#parallax3"})
		.setTween(TweenMax.from("#parallax3 > div", 1, {top: "-95%", ease: Linear.easeNone}))
		.addTo(controller);
		/*

        new ScrollScene({triggerElement: "#parallax3"})
        .setTween(TweenMax.from("#parallax3 > div", 1, {top: "-80%", ease: Linear.easeNone}))
        .addTo(controller)
        .addIndicators({zindex: 1, suffix: "3"});*/
    }
});


