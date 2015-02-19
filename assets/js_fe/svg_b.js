
    function svg_b_animate(){

    var svg_b = Snap("#svg_b");            

    //$('#php_logo').fadeIn("slow");
    var php_logo = svg_b.selectAll('#php_logo path');  
    var sql_logo = svg_b.selectAll('#sql_logo path');  
    var ci_logo = svg_b.selectAll('#ci_logo path');  
    var git_logo = svg_b.select('#git_logo');  
    
	anim_final()
    
    function anim_final(){
        setTimeout(function () {
			
			php_logo.animate({ transform: 't120,0' }, 1000, mina.bounce );  
			
            setTimeout(function () {
                
				$('#sql_logo').delay(400).fadeIn('slow'); 
				$('#ci_logo').delay(800).fadeIn('slow'); 
				$('#git_logo').delay(1200).fadeIn('slow'); 
				
			sql_logo.animate({ transform: 't-20,-50' }, 1800, mina.easeinout );  
			ci_logo.animate({ transform: 't-270,0' },2200, mina.easeinout );  
			git_logo.animate({ transform: 't-200,-125' }, 2600, mina.easeinout );  

            }, 100);
        }, 1000);
    }
    }