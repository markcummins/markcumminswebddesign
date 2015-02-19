<?php

Class M_predictions extends CI_Model {	
	
	
	function __construct() {

	}

	function get_upcoming_fixtures($date=false){

		if($date){
			$q = "SELECT * FROM `FIXTURES_2015` WHERE date = '" . $date ."'";
		}
		else{
			$q = "SELECT * FROM `FIXTURES_2015` WHERE date BETWEEN CURDATE() AND (CURDATE() + INTERVAL 9 DAY)";
		}
		error_log($q);

		$res = query_db($q);

		$ret_table = '<table class="table table-custom"><tr>
<th style="width:80px;">Date</th><th style="width:80px;">Time</th>
<th style="width:80px;">Home</th><th>%</th><th>Draw</th>
<th style="width:80px;">Away</th><th>%</th><th style="width:180px;">Prediction</th></tr>';

		if($res){

			foreach($res as $r){

				$pred = $this->get_prediction($r->home,$r->away);

				$this_color_won = $this->get_color($pred['win']);
				$this_color_drawn = $this->get_color($pred['draw']);
				$this_color_lost = $this->get_color($pred['lose']);

				if($pred['win'] >= $pred['draw'] && $pred['win'] >= $pred['lose']){
					$outcome = $r->home . ' Win'; 
					if($pred['win']>50){
						$outcome .= ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';
					}
				}
				else if($pred['draw'] >= $pred['win'] && $pred['draw'] >= $pred['lose']){
					$outcome = "Draw";
					if($pred['draw']>50){
						$outcome .= ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';
					}
				}
				else{
					$outcome = $r->away . ' Win'; 
					if($pred['lose']>50){
						$outcome .= ' <sup style="padding-left:3px; padding-right:3px; background-color: #A3CB1F;">Tip</sup>';
					}
				}


				$ta = "<small>". $pred['win'] ."%</small><div style='background-color: ".$this_color_won."; width: ".$pred['win']."%;'>&nbsp;</div>";
				$tb = "<small>". $pred['draw']."%</small><div style='background-color: ".$this_color_drawn."; width: ".$pred['draw']."%;'>&nbsp;</div>";
				$tc = "<small>". $pred['lose']."%</small><div style='background-color: ".$this_color_lost."; width: ".$pred['lose']."%;'>&nbsp;</div>";

				$ret_table .= "<tr>";
				$ret_table .= '<td>'.$r->date.'</td>';
				$ret_table .= '<td>'.$r->time.'</td>';
				$ret_table .= '<td>'.$r->home.'</td>';
				$ret_table .= '<td>'.$ta.'</td>';
				$ret_table .= '<td>'.$tb.'</td>';
				$ret_table .= '<td>'.$r->away.'</td>';
				$ret_table .= '<td>'.$tc.'</td>';
				$ret_table .= '<td>'.$outcome.'</td>';
				$ret_table .= "</tr>";
			}

			$ret_table .= "</table>";

			return $ret_table;
		}
		else{
			return '<div class="alert alert-warning">
No Fixtures Found
</div>';
		}
	}

	function get_prediction($home_team,$away_team){

		$home = $this->get_team_record($home_team, 'home');
		$away = $this->get_team_record($away_team, 'away');
		$retArr=[];

		$retArr['win'] = ($home['won'] + $away['lost'])/2;
		$retArr['lose'] = ($home['lost'] + $away['won'])/2;
		$retArr['draw'] = ($home['drawn'] + $away['drawn'])/2;

		return $retArr;	
	}

	function get_team_record($team_name, $type){

		if($type == 'home'){
			$w="HW";
			$d="HD";
			$l="HL";
		}
		else if($type == 'away'){
			$w="AW";
			$d="AD";
			$l="AL";
		}

		$q = "SELECT * FROM `EPL_2015` WHERE team_name = '".$team_name."'";
		$res = query_db($q);

		$retArr = [];
		if(isset($res)){

			foreach($res as $r){

				$home_played = $r->$w + $r->$d + $r->$l;
				$x = 100/$home_played;

				$retArr['won'] = round($x*$r->$w);
				$retArr['drawn'] = round($x*$r->$d);
				$retArr['lost'] = round($x*$r->$l);
			}
		}

		return $retArr;
	}

}
		
