//sql = "select  * from json._links ";
//sql += "where (homeTeamName == '"+home+"' && awayTeamName == '"+away+"')";
//alert(sql);
//var p = jsonsql.query(sql, data); 
//console.log(p);

$(document).ready(function(){
	 
	// hide .navbar first
//	$(".navbar").hide();
//
//	// fade in .navbar
//	$(function () {
//		$(window).scroll(function () {
//
//			// set distance user needs to scroll before we start fadeIn
//			if ($(this).scrollTop() > 100) {
//				$('.navbar').fadeIn();
//			} else {
//				$('.navbar').fadeOut();
//			}
//		});
//	});
	
	$( "#datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
		onSelect: function(selected_date) {

		}
	});
	
	$('.stay').click(function(e){
			e.preventDefault();
	});
	
	$('.league-switched').click(function(){
		
		$('.selected-league').html($(this).html()+' ');
		$('#selected-league').attr('data-id', $(this).attr('id'));
		var json_file_table = 'assets/json/tables/' + $(this).attr('id') + '_2014_TABLE.json';
		var json_file_fixtures = 'assets/json/fixtures/' + $(this).attr('id') + '_2014_FIXTURES.json';
		
		get_table_get_fixtures(json_file_table, json_file_fixtures);
	});			
	
	if($('#fb-table').html() == ""){
		
		get_table_get_fixtures('assets/json/tables/PL_2014_TABLE.json', 'assets/json/fixtures/PL_2014_FIXTURES.json');
	}
	
	function render_page(json_file_table, json_file_fixtures){
		
		render_league_table(window.league_table, 'simple');
		get_win_avg_table(window.league_table);
		get_upcoming_fixtures(window.league_fixtures);		
	}
	
	function get_table_get_fixtures(json_file_table, json_file_fixtures){
		
		$.ajax({
			url: json_file_table,  
			dataType: 'json',
			type: 'GET',
		}).success(function(data_table) {

			get_fixtures(json_file_fixtures, data_table);
		});
	}
	
	function get_fixtures(json_file_fixtures, data_table){
		
		var data_b;
		
		$.ajax({
			url: json_file_fixtures,  
			dataType: 'json',
			type: 'GET',
		}).success(function(data_fixtures) {

			window.league_table = data_table;
			window.league_fixtures = data_fixtures;
			render_page();
		});
	}
	
	function get_matchdays(data){
		
		var matchdays = 0;
		var curr_md = 0;
		var ret = '<div class="col-md-3 col-sm-4">';
		ret += '<select id="matchday-change" class="form-control">';
		
		gw_date = {};
		
		$.each( data['fixtures'], function( index, value ){

			if(value['status'] === 'FINISHED'){
				curr_md = value['matchday']+1;
			}
			matchdays = value['matchday'];
			
			if(gw_date[matchdays] === undefined){
				gw_date[matchdays] = value['date'];
			}
		});
		
		if(curr_md > matchdays){
			curr_md = matchdays;
		}
		
		var i=1;
		
		while(i <= matchdays){
			
			if(i === curr_md){
				ret += '<option value="'+i+'" selected="selected">GameWeek ' +i+ ' - '+ moment(gw_date[i]).format('MMM D') +'</option>';
			}
			else{
				ret += '<option value="'+i+'">GameWeek ' +i+ ' - ' + moment(gw_date[i]).format('MMM D') + '</option>';
			}
			i++;			
		}
		
		ret += '</select></div>';
		$('#fb-matchday-select').html(ret);
		
		return curr_md;
	}
	
	$(document).on('change', '#matchday-change', function() {
		var optionSelected = $("option:selected", this);
		get_upcoming_fixtures(false, parseInt(this.value));
	});
	
	$(document).on('click', '.view-fixture', function(){
		
		var home = $(this).attr('data-home');
		var away = $(this).attr('data-away');

		view_fixture(home, away);
	});
	
	function view_fixture(home, away){
		
		var data = window.league_fixtures;
		
		$.each( data['fixtures'], function( index, value ){

			if(value['homeTeamName'] == home && value['awayTeamName'] == away){

				get_team(value['_links']['homeTeam']['href'], '#home_team');
				get_team(value['_links']['awayTeam']['href'], '#away_team');

				var pred = (get_prediction(value['homeTeamName'], value['awayTeamName']));

				var l1 = '<h1>'+ value['homeTeamName'] +'</h1><span class="label w-lbl">'+ value['homeTeamName'] + ' Win ('+ pred['w'] +'%)</span>&nbsp;';
				var l2 = '<h2>-VS-</h2><span class="label d-lbl">Draw ('+ pred['d'] +'%)</span>&nbsp;';
				var l3 = '<h1>'+ value['awayTeamName'] +'</h1><span class="label l-lbl">'+value['awayTeamName'] + ' Win ('+ pred['l'] +'%)</span>&nbsp;';
				var cf = '';

				$('#pred_label_a').html(l1 + cf);
				$('#pred_label_b').html(l2 + cf);
				$('#pred_label_c').html(l3 + cf);

				var data = [{
					value: pred['l'],
					color: '#DE9100'
				}, {
					value: pred['d'],
					color: '#CC0E48'
				},{
					value: pred['w'],
					color: '#2182F2'
				}]

				var options = {
					responsive: true,
					animationEasing: "easeOutQuart",
				};


				if (typeof pred_chart !== 'undefined'){
					pred_chart.destroy();
				}

				var c = $('#pred-chart');
				var ct = c.get(0).getContext('2d');
				var ctx = document.getElementById("pred-chart").getContext("2d");

				pred_chart = new Chart(ct).Doughnut(data, options);
				$('#pred-data').hide().fadeIn('slow');
				
			}
		});
	}
	
	function view_fix_loop(fix){
		
		var i=1;
		setInterval(function(){
			
			if(i>=fix.length){
				i=0;
			}
			
			var home=fix[i]['homeTeamName'];
			var away=fix[i]['awayTeamName'];
			view_fixture(home,away);
			i++;
		}, 80000);
	}
	
	function get_team(team_url, elem_id){
		
		$.ajax({
			headers: { 'X-Auth-Token': 'e7b28357ca8c4dd49ed2ffad0e5b7671' },
			url: team_url,
			dataType: 'json',
			type: 'GET',
		}).done(function(response) {

//			console.log(response);
			
			res = '';
			res += '<div class="crest"><img src="'+ response['crestUrl'] +'"/></div>';

			$(elem_id).html(res);
		}); 
		
	}
	
	function get_upcoming_fixtures(data, curr_md){
				
		if(curr_md === undefined){
			curr_md = get_matchdays(data);
		}
		if(!data){
			data = window.league_fixtures;
		}
				
		var week_completed = false;
		var ret_table_th = '<table class="table table-custom"><tr>';
		ret_table_th += '<th>View</th><th>Date</th><th>Time</th>';
		ret_table_th += '<th>Home</th><th>VS</th><th>Away</th><th>Home Win Odds</th>';
		ret_table_th += '<th>Draw Odds</th><th>Away Win Odds</th><th>Prediction</th>';
		var p_right=0;
		var p_wrong=0;
			
		var ret_table = "";
		var view_fix = [];
		var i=0;
		
		$.each( data['fixtures'], function( index, value ){
			
			if(value['matchday'] === curr_md){
				
				if(i===0){
					view_fixture(value['homeTeamName'], value['awayTeamName']);
				}
				i++;
				
				if(value['status'] === 'FINISHED'){
					week_completed = true;
					if(value['result']['goalsHomeTeam']>value['result']['goalsAwayTeam']){
						var game_res = "hw";
					}
					else if(value['result']['goalsAwayTeam']>value['result']['goalsHomeTeam']){
						var game_res = "aw";
					}
					else{
						var game_res = "d";
					}
				}
				
				var pred = get_prediction(value['homeTeamName'], value['awayTeamName']);
				var pred_outcome = "";
				var game_pred = "";
				
				view_fix.push({
					homeTeamName: value['homeTeamName'],
					awayTeamName: value['awayTeamName'],
				});
				
				this_color_won = get_color(pred['w']);
				this_color_drawn = get_color(pred['d']);
				this_color_lost = get_color(pred['l']);								
				
				if(pred['w'] >= pred['d'] && pred['w'] >= pred['l']){
					pred_outcome = value['homeTeamName'] + ' Win'; 
					game_pred = "hw";
					
					if(pred['w']>50){
						pred_outcome += ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';				
					}
				}
				else if(pred['d'] >= pred['w'] && pred['d'] >= pred['l']){
					pred_outcome = "Draw";
					game_pred = "d";

					if(pred['d']>50){
						pred_outcome += ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';
					}
				}
				else{
					pred_outcome = value['awayTeamName'] + ' Win'; 
					game_pred = "aw";

					if(pred['l']>50){
						pred_outcome += ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';
					}
				}
				
				if( close_call(pred['w'],pred['d'], pred['l']) ){
					pred_outcome += ' <sup style="padding-left:3px; padding-right:3px; background-color: #E8B300;">Close</sup>';
				}
				
				var ta = "<small>"+pred['w']+"%</small><div style='background-color: "+this_color_won+"; width: "+pred['w']+"%;'>&nbsp;</div>";
				var tb = "<small>"+pred['d']+"%</small><div style='background-color: "+this_color_drawn+"; width: "+pred['d']+"%;'>&nbsp;</div>";
				var tc = "<small>"+pred['l']+"%</small><div style='background-color: "+this_color_lost+"; width: "+pred['l']+"%;'>&nbsp;</div>";

				var d = parseDate(value['date']);
				
				var fix_date = moment(d).format('MMM D');// $.datepicker.formatDate('M dd', d);//d.getDay();
				var fix_time = moment(d).format('H:mm');
				
				ret_table += "<tr>";
				ret_table += '<td class="view-fixture" data-home="'+value['homeTeamName']+'" data-away="'+value['awayTeamName']+'"><i class="stay fa fa-eye"></i></td>';
				ret_table += '<td>'+fix_date+'</td>';
				ret_table += '<td>'+fix_time+'</td>';
				ret_table += '<td>'+value['homeTeamName']+'</td>';
				ret_table += '<td>vs</td>';
				ret_table += '<td>'+value['awayTeamName']+'</td>';
				ret_table += '<td style="width:12%;">'+ta+'</td>';
				ret_table += '<td style="width:12%;">'+tb+'</td>';
				ret_table += '<td style="width:12%;">'+tc+'</td>';
				ret_table += '<td>'+pred_outcome+'</td>';
				
				if(week_completed){
					ret_table += '<td>'+ value['result']['goalsHomeTeam'] +':'+ value['result']['goalsAwayTeam'] +'</td>';
					
					if(game_res === game_pred){
						ret_table += '<td><i class="fa-res-check fa fa-check-square"></i></td>';
						p_right ++;
					}
					else{
						ret_table += '<td><i class="fa-res-square fa fa-minus-square"></i></td>';
						p_wrong ++;
					}
				}
				
				ret_table += "</tr>";
			}
		});
		
		view_fix_loop(view_fix);
		
		if(week_completed){
			var gt_score = (p_right/(p_right + p_wrong))*100;
			
			ret_table_th += '<th>Score</th><th style="color: '+get_color(gt_score)+';">'+gt_score+'%</th></tr>';
		}
		else{
			ret_table_th += '</tr>';
		}
			
		ret_table = ret_table_th +ret_table;
			
		ret_table += "</table>";
		$('#fb-fixtures-table').html(ret_table);

	}
	
	function close_call(w,d,l){

		var nums = [w, d, l];
		nums.sort();
		
		var num = nums[1] - nums[2];

		if(num > -8 && num < 8){
			return true;
		}
		else{
			return false;
		}
	}
	
	function parseDate(input) {
		
		var dt = input.split('T');
		var partsDate = dt[0].split('-');
		var partsTime = dt[1].split(':');
		// new Date(year, month [, day [, hours[, minutes[, seconds[, ms]]]]])
		return new Date(partsDate[0], partsDate[1], partsDate[2], partsTime[0], partsTime[1]); // Note: months are 0-based
	}
	
	function get_prediction(homeTeam, awayTeam){
		
		
		if(window.league_table !== undefined){
			
			home_team_rec = get_team_record(homeTeam, 'home');
			away_team_rec = get_team_record(awayTeam, 'away');
			
			var retArr = {w:0, d:0, l:0}; 
			
			retArr['w'] = (home_team_rec['w'] + away_team_rec['l'])/2;
			retArr['l'] = (home_team_rec['l'] + away_team_rec['w'])/2;
			retArr['d'] = (home_team_rec['d'] + away_team_rec['d'])/2;
			
			return retArr;
		}
	}
	
	
	function get_team_record(team_name, type){

		if(window.league_table !== undefined){
			
			if(type === 'home'){
				gp="ph";
				gw="hw";
				gd="hd";
				gl="hl";
			}
			else if(type === 'away'){
				gp="pa";
				gw="aw";
				gd="ad";
				gl="al";
			}
			
			var retArr = {w:0, d:0, l:0}; 
				$.each( window.league_table, function( index, value ){	
					
					if(value['team_name'] === team_name){
						
						var home_played = value[gp];
						x = 100/home_played;
						
						retArr['w'] = Math.round(value[gw]*x);
						retArr['d'] = Math.round(value[gd]*x);
						retArr['l'] = Math.round(value[gl]*x);
					}

				});
			return retArr;
		}
	}
	
	
	function render_league_table(data, type){

		var simple = false;
		var advanced = false;
		
		if(type === 'simple'){
			simple = true;
		}
		if(type === 'advanced'){
			advanced = true;
		}
		
		var pr = ' style="padding-right: 20px !important;" ';

		var ret = '<table class="table table-custom"><tr><th>Pos</th><th>Team</th><th>P</th>';
		ret += '<th>W</th><th>D</th><th>L</th><th>F</th><th '+ pr +'>A</th>';
		
		if(advanced){
			ret += '<th>W</th><th>D</th><th>L</th><th>F</th><th '+ pr +'>A</th>';
			ret += '<th>W</th><th>D</th><th>L</th><th>F</th><th '+ pr +'>A</th>';
		}
		
		ret += '<th>GD</th><th>PTS</th><tr/>';

		$.each( data, function( index, value ){


			ret += '<tr><td>'+ (index+1) +'</td>';
			ret += '<td>'+ value['team_name'] +'</td>';

			ret += '<td>'+ value['p'] +'</td>';
			ret += '<td>'+ value['w'] +'</td>';
			ret += '<td>'+ value['d'] +'</td>';
			ret += '<td>'+ value['l'] +'</td>';
			ret += '<td>'+ value['f'] +'</td>';
			ret += '<td>'+ value['a'] +'</td>';

			if(advanced){
				ret += '<td>'+ value['hw'] +'</td>';
				ret += '<td>'+ value['hd'] +'</td>';
				ret += '<td>'+ value['hl'] +'</td>';
				ret += '<td>'+ value['ghf'] +'</td>';
				ret += '<td>'+ value['gha'] +'</td>';

				ret += '<td>'+ value['aw'] +'</td>';
				ret += '<td>'+ value['ad'] +'</td>';
				ret += '<td>'+ value['al'] +'</td>';
				ret += '<td>'+ value['gaf'] +'</td>';
				ret += '<td>'+ value['gaa'] +'</td>';
			}
			
			ret += '<td>'+ value['gd'] +'</td>';
			ret += '<td>'+ value['pts'] +'</td></tr>';
		});

		ret += '</table>';
		$('#fb-table').html(ret);
	}


	$('.get_win_avg').click(function(){
		
		if(window.league_table !== undefined){
			get_win_avg_table(window.league_table, $(this).html());
		}
		
		$('.get_win_avg').removeClass('label-danger').addClass('label-primary');
		$(this).addClass('label-danger');
	});
	
	$('.get_table').click(function(){

		if(window.league_table !== undefined){
			
			if($(this).attr('data-id') === 'simple'){

				render_league_table(window.league_table, 'simple');
			}
			else{
				render_league_table(window.league_table, 'advanced');
			}
			
			$('.get_table').removeClass('label-danger').addClass('label-primary');
			$(this).addClass('label-danger');
		}

		
	});

	function get_win_avg_table(data, type){

		if(type !== undefined){
			if(type === 'Home'){
				var w="hw";
				var d="hd";
				var l="hl";
				var pl = 'ph';
			}
			else if(type === 'Away'){
				var w="aw";
				var d="ad";
				var l="al";
				var pl = 'pa';
			}
		}
		
		if(w === undefined){
			var w="w";
			var d="d";
			var l="l";
			var pl = 'p';
		}
		
		var main = "";
		var home_table = '<table class="table table-custom"><tr><th>Team</th><th>% Win</th><th>% Draw</th><th>% Loss</th></tr>';


		$.each( data, function( index, value ){
			
			var played = value[pl];
			var x = 100/played;

			var p_won = Math.round(x*value[w]);
			var p_drawn = Math.round(x*value[d]);
			var p_lost = Math.round(x*value[l]);

			this_color_won = get_color(p_won);
			this_color_drawn = get_color(p_drawn);
			this_color_lost = get_color(p_lost);

			home_table += "<tr>";

			home_table += "<td>"+value['team_name']+"</td>";
			home_table += "<td><small>"+p_won+"%</small><div style='background-color: "+this_color_won+"; width: "+p_won+"%;'>&nbsp;</div></td>";
			home_table += "<td><small>"+p_drawn+"%</small><div style='background-color: "+this_color_drawn+"; width: "+p_drawn+"%;'>&nbsp;</div></td>";
			home_table += "<td><small>"+p_lost+"%</small><div style='background-color: "+this_color_lost+"; width: "+p_lost+"%;'>&nbsp;</div></td>";
			home_table += "</tr>";
		});
		
		home_table += "</table>";

		$('#fb-win_avg_table').html(home_table);
	
		}
	
	function get_color(p){

		if(p > 80){
			return "#2fb51d";
		}
		else if(p > 60){
			return "#a3cb1f";
		}
		else if(p > 40){
			return "#e8b300";
		}
		else if(p > 20){
			return "#eb2681";
		}
		else{
			return "#f00000";
		}
	} 
		
});

