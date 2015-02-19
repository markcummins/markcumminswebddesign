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

function svg_a_animate(){
        
    var os_svg = Snap.select('#os-svg');
    os_svg.attr({fill: "#333"});
    
    var my_path_a = os_svg.path("m 67.53623,181.89014 c -7.49261,0.0137 -13.912003,-2.28068 -19.258177,-6.88315 -5.346173,-4.60247 -8.026663,-10.14208 -8.041442,-16.61882 L 40.000001,54.760203 c -0.01479,-6.476753 2.640385,-12.026118 7.965495,-16.648108 5.325109,-4.621989 11.73398,-6.939843 19.226579,-6.953542 l 185.271715,-0.33888 c 7.4926,-0.01375 13.91199,2.280681 19.25817,6.883149 5.34617,4.602459 8.02665,10.142079 8.04144,16.618821 l 0.23661,103.627967 c 0.0148,6.47675 -2.64038,12.02611 -7.96548,16.6481 -5.32512,4.62199 -11.73399,6.93984 -19.22658,6.95355 z M 61.796679,54.720321 62.033288,158.34829 c 0.0029,1.27572 0.544678,2.37874 1.625281,3.30902 1.080602,0.93029 2.358822,1.39407 3.834636,1.39137 l 185.271725,-0.33887 c 1.47581,-0.003 2.75191,-0.47117 3.82824,-1.4054 1.07635,-0.93423 1.61307,-2.03922 1.61017,-3.31493 l -0.2366,-103.627965 c -0.002,-1.275731 -0.54469,-2.378729 -1.6253,-3.309011 -1.08061,-0.930292 -2.35882,-1.394089 -3.83463,-1.391381 l -185.27172,0.33887 c -1.475814,0.0027 -2.751901,0.471175 -3.828255,1.405401 -1.076345,0.934236 -1.613067,2.039215 -1.610156,3.314927 z").attr({id: "screen"});

    var my_path_b = os_svg.path("m 20,190 280,0 c 1.0725,3.21751 1.0725,6.78249 0,10 -1.54549,4.63648 -5.36352,8.45451 -10,10 l -260,0 c -4.636476,-1.54549 -8.454508,-5.36352 -10,-10 -1.072502,-3.21751 -1.072502,-6.78249 0,-10").attr({class: "i-base"});
    
    var my_path_c = os_svg.path("m 144.00003,197.99999 31.99998,0 0,4 -31.99998,0 0,-4").attr({class: "i-base"});
    
    draw_svg(my_path_a, 3000, 4, '#333');
    draw_svg(my_path_b, 1000, 4, '#333');
    draw_svg(my_path_c, 1000, 2, '#333');        
    //return true();    
    
    var i_windows = os_svg.select('#windows');
    var i_apple = os_svg.selectAll('.i_apple');  
    var i_linux = os_svg.select('#linux'); 
    var i_screen = os_svg.select('#screen');  
    var i_base = os_svg.selectAll('.i-base');    
    
    os_animation();
    /*setInterval(function () {
        os_animation();
    }, 10000);*/

    function os_animation(){

        //$('#apple').delay(800).fadeIn('slow');        
        
        setTimeout(function () {
			i_screen.animate({ transform: 'r180,160,125' }, 1000, mina.bounce);
            
            $('#apple').fadeOut('slow');
            $('.i-base').fadeOut('slow');
            $('#linux').delay(800).fadeIn('slow');
        }, 2000);

        setTimeout(function () {
			i_screen.animate({ transform: 'r90,140,125' }, 1000, mina.bounce);
            $('#linux').fadeOut('slow');
            $('#windows').delay(800).fadeIn('slow');
        }, 4000);

        setTimeout(function () {
			i_screen.animate({ transform: 'r0,140,125' }, 1000, mina.elastic);
            
            var i_apple = os_svg.selectAll('#apple path');   
            var i_windows = os_svg.select('#windows');
            var i_linux = os_svg.select('#linux');   

            i_windows.animate({ transform: 's 0.5,160,60' }, 1400, mina.bounce ); 
            
            setTimeout(function () {
                i_apple.animate({ transform: 's 0.5,-5,110' }, 800, mina.bounce );             
                i_linux.animate({ transform: 's 0.5,290,65' }, 1200, mina.bounce ); 

                $('#apple').delay(200).fadeIn('slow');
                $('#linux').delay(200).fadeIn('slow');
                $('.i-base').fadeIn('slow');                               
                
                setTimeout(function () {
                    var r = os_svg.rect(62,50,196,112,4,4).attr({ id: "turn_off", fill: '#333'});
                    $('#turn_off').hide().fadeIn();
                    var circle_d = os_svg.circle(160,108,1);
                    circle_d.attr({fill: "#999"});
                    circle_d.animate({ transform: 's 16,160,108' }, 1000, mina.bounce );                  
                    var my_path = os_svg.path("m 160,86,0,20").attr({
                        id: "power_hand",
                    });
					setTimeout(function () {draw_svg(my_path, 1000, 3, "#ddd");},300);
                    var i_power_hand = os_svg.select('#power_hand');
                    
                }, 3000);

            }, 800);
            
        }, 6000);

    }
        
}
