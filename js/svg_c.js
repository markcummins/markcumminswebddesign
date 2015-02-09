

    function svg_c_animate(){
        
    var svg_c = Snap("#svg_c");    
    
// SVG B - "Squiggly" Path
    var my_path_a = svg_c.path("m 218,200 22,-16").attr({
        id: "my_path_a",
    });
    var my_path_b = svg_c.path("m 218,200 -22, -16").attr({
        id: "my_path_b",
    });
    var my_path_c = svg_c.path("m 218,200 0,24").attr({
        id: "my_path_c",
    });
    

    $('#js_logo').show();
	$('#html_logo').show();
	$('#css_logo').show();             
        
        
        var circle_a = svg_c.circle(218,200,4);
        var circle_b = svg_c.circle(218,200,4);
        var circle_c = svg_c.circle(218,200,4);
        var circle_d = svg_c.circle(218,200,1);
        
        circle_a.attr({fill: "#333"});
        circle_b.attr({fill: "#333"});
        circle_c.attr({fill: "#333"});
        circle_d.attr({fill: "#333"});
        
        circle_d.animate({ transform: 's6, 218, 200' }, 2000, mina.bounce );
        draw_svg(my_path_a, circle_a);
        draw_svg(my_path_b, circle_b);
        draw_svg(my_path_c, circle_c);   
                               
        var g = svg_c.group(my_path_a, my_path_b, my_path_c, circle_a, circle_b, circle_c, circle_d);
        g.animate({ transform: 'r1080,218,200' }, 3000, mina.bounce );
        
        setTimeout(function () {
            $('#jq_logo').fadeIn();   
        }, 0);    
        setTimeout(function () {
            $('#foundation_logo').fadeIn();
        }, 400);    
        setTimeout(function () {
            $('#jqui_logo').fadeIn();  
        }, 600);    
        setTimeout(function () {
            $('#sass_logo').fadeIn();
        }, 800);
        setTimeout(function () {
            $('#jqm_logo').fadeIn();
        }, 1000);    
        setTimeout(function () {
            $('#bootstrap_logo').fadeIn();
        }, 1200);
        
        
        setTimeout(function () {
                        
            $('#jqm_logo').fadeOut();
            $('#jq_logo').fadeOut();
            $('#jqui_logo').fadeOut();
            $('#foundation_logo').fadeOut();
            $('#sass_logo').fadeOut();
            $('#bootstrap_logo').fadeOut();
            
            g.animate({ transform: 's0,218,200' }, 600, mina.easeout);
            
            setTimeout(function () {
                $('#html_logo').fadeIn();
                var i_html = svg_c.selectAll('#html_logo path, #html_logo polygon');   
                i_html.animate({ transform: 's 2,-700,1050' }, 1000, mina.bounce ); 
				
            }, 800);
        }, 4200);

    
    
    
    function draw_svg(my_path, my_circle){
        
        var lenB = my_path.getTotalLength();

        // SVG B - Animate Path
        my_path.attr({
            stroke: '#333',
            strokeWidth: 2,
            fill: 'none',
            // Draw Path
            "stroke-dasharray": lenB + " " + lenB,
            "stroke-dashoffset": lenB
        }).animate({"stroke-dashoffset": 0}, 2000,mina.bounce);

        // SVG B - Circle

        setTimeout( function() {
            Snap.animate(0, lenB, function( value ) {
                movePoint = my_path.getPointAtLength( value );
                my_circle.attr({ cx: movePoint.x, cy: movePoint.y }); // move along path via cx & cy attributes
            }, 2000,mina.bounce);
        });
        
    }
        
    }

