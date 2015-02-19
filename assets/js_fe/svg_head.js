$(document).ready(function(){

	var head_svg = Snap.select('#head_svg');
	
	var my_name = head_svg.select('#svg_my_name');  
	
	var line_a = head_svg.select('#svg_h1_l1');
	var head_svg_center = ($('#head_svg').width()/2);
	
	setTimeout(function () {

		var my_path_a = head_svg.path("m 15,55 70,0");
		var my_path_b = head_svg.path("m 10,56 80,0");
		var my_path_c = head_svg.path("m 15,57 70,0");
		
		setTimeout(function(){draw_svg(my_path_a, 1000, .4, '#cc0e48');},100);
		setTimeout(function(){draw_svg(my_path_b, 1000, .4, '#de9100');},400);
		setTimeout(function(){draw_svg(my_path_c, 1000, .4, '#2182f2');},700);
		
		
		$('#svg_my_name').fadeIn(100);
   		$('#svg_wd').fadeIn(1000);
		$('#globe').fadeIn(5000);	
	}, 1000);	
	
	
	function draw_svg(my_path, anim_time, strokeWidth, s_color){

		var lenB = my_path.getTotalLength();

		// SVG B - Animate Path
		my_path.attr({
			stroke: s_color,
			strokeWidth: strokeWidth,
			fill: 'none',
			// Draw Path
			"stroke-dasharray": lenB + " " + lenB,
			"stroke-dashoffset": lenB
		}).animate({"stroke-dashoffset": 0}, anim_time, mina.easeinout);
	}
	
	setTimeout(function(){
//		$( ".responsive-circle" ).slideDown(1000);
	},1000);
});