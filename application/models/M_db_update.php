<?php

Class m_db_update extends CI_Model {
	
	
	function __construct() {

	}
	
	function update_all_league_fixtures(){
			
			$uri = 'http://api.football-data.org/alpha/soccerseasons/';
			$reqPrefs['http']['method'] = 'GET';
			$reqPrefs['http']['header'] = 'X-Auth-Token: e7b28357ca8c4dd49ed2ffad0e5b7671';
			$stream_context = stream_context_create($reqPrefs);
			$response = file_get_contents($uri, false, $stream_context);
			$leagues = json_decode($response);

			foreach($leagues as $l){
				
				$fix_href = $l->_links->self->href.'/fixtures/';
				$league_fix_name = $l->league.'_'.$l->year.'_FIXTURES';			
				
//				error_log($league_fix_name);
				$uri = $fix_href; // /fixtures/?matchday=22';
				$reqPrefs['http']['method'] = 'GET';
				$reqPrefs['http']['header'] = 'X-Auth-Token: e7b28357ca8c4dd49ed2ffad0e5b7671';
				$stream_context = stream_context_create($reqPrefs);
				$response = file_get_contents($uri, false, $stream_context);
				$fixtures = json_decode($response);

				$table_file = realpath('').'/assets/json/fixtures/'.$league_fix_name.'.json';
				$fp = fopen($table_file, 'w');
				fwrite($fp, $response);
				fclose($fp);
				
				$i=0;
				$epl = array();

				foreach($fixtures->fixtures as $f){

					$epl[$i] = array(
						"matchday"=>$f->matchday,
						"homeTeamName"=> $f->homeTeamName, 
						"awayTeamName"=> $f->awayTeamName, 				
						"goalsHomeTeam"=>$f->result->goalsHomeTeam,
						"goalsAwayTeam"=> $f->result->goalsAwayTeam,
						"date"=>$f->date,
						"status"=>$f->status
					);
					$i++;
				}

				//return $fixtures;
				$this->db->where('id >', 0);
				$this->db->delete($league_fix_name);
				$this->db->insert_batch($league_fix_name, $epl);
			}
	}
	
	function update_all_league_tables(){
		
		$uri = 'http://api.football-data.org/alpha/soccerseasons/';
		$reqPrefs['http']['method'] = 'GET';
		$reqPrefs['http']['header'] = 'X-Auth-Token: e7b28357ca8c4dd49ed2ffad0e5b7671';
		$stream_context = stream_context_create($reqPrefs);
		$response = file_get_contents($uri, false, $stream_context);
		$leagues = json_decode($response);

		foreach($leagues as $l){

			$fix_href = $l->_links->self->href.'/fixtures/';
			$league_fix_name = $l->league.'_'.$l->year.'_FIXTURES';	
			$league_table_name = $l->league.'_'.$l->year.'_TABLE';


			/*-------------------------- COUNT GAMES PLAYED AT HOME --------------------------------*/
			$this->db->select('homeTeamName, COUNT(*) as ph');
			$this->db->from($league_fix_name);
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('homeTeamName');
			$this->db->order_by('homeTeamName');

			$query = $this->db->get();

			$ret = array();
			foreach($query->result() as $q){

				$ret[$q->homeTeamName] = array(
					'team_name' => $q->homeTeamName,	
					'p' => 0,
					'w' => 0,
					'd' => 0,
					'l' => 0,
					'f' => 0,
					'a' => 0,				
					'gf' => 0,
					'ga' => 0,		
					'ph' => 0+$q->ph,//total played at home
					'hw' => 0,//home won
					'hd' => 0,//home drawn
					'hl' => 0,//home lost
					'ghf' => 0,//home goals for
					'gha' => 0,//home goals against
					'hp' => 0,//home points
					'pa' => 0,//total played away
					'aw' => 0,//away won
					'ad' => 0,//away drawn
					'al' => 0,//away lost
					'ap' => 0,//away points
					'gaf' => 0,//away goals for
					'gaa' => 0,//away goals against
					'gd' => 0,//goal diff
					'yr' => 2014,
					'pts' => 0,//points
				);
			}

			/*-------------------------- COUNT GAMES PLAYED & GAMES PLAYED AWAY  --------------------------------*/
			$this->db->select('awayTeamName, COUNT(*) as pa');
			$this->db->from($league_fix_name);
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('awayTeamName');
			$this->db->order_by('awayTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->awayTeamName]['pa'] = 0+$q->pa;
				$ret[$q->awayTeamName]['p'] = $ret[$q->awayTeamName]['ph'] + $ret[$q->awayTeamName]['pa'];			
			}

			/*-------------------------- COUNT HOME WINS + HOME POINTS  --------------------------------*/
			$this->db->select('homeTeamName, SUM(goalsHomeTeam) as ghf, SUM(goalsAwayTeam) as gha, COUNT(homeTeamName) as hw');
			$this->db->from($league_fix_name);
			$this->db->where("goalsHomeTeam > goalsAwayTeam");
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('homeTeamName');
			$this->db->order_by('homeTeamName');

			$query = $this->db->get();
			//error_log($this->db->last_query());

			foreach($query->result() as $q){

				$ret[$q->homeTeamName]['hw'] = 0+$q->hw;
				$ret[$q->homeTeamName]['hp'] = 0+$q->hw*3;
				$ret[$q->homeTeamName]['ghf'] += $q->ghf;
				$ret[$q->homeTeamName]['gha'] += $q->gha;
			}

			/*-------------------------- COUNT HOME DRAWS + POINTS  --------------------------------*/
			$this->db->select('homeTeamName, SUM(goalsHomeTeam) as ghf, SUM(goalsAwayTeam) as gha, COUNT(homeTeamName) as hd');
			$this->db->from($league_fix_name);
			$this->db->where('goalsHomeTeam = goalsAwayTeam');
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('homeTeamName');
			$this->db->order_by('homeTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->homeTeamName]['hd'] = 0+$q->hd;
				$ret[$q->homeTeamName]['hp'] += $q->hd;
				$ret[$q->homeTeamName]['ghf'] += $q->ghf;
				$ret[$q->homeTeamName]['gha'] += $q->gha;
			}
			/*-------------------------- COUNT HOME LOSSES  --------------------------------*/
			$this->db->select('homeTeamName, SUM(goalsHomeTeam) as ghf, SUM(goalsAwayTeam) as gha, COUNT(homeTeamName) as hl');
			$this->db->from($league_fix_name);
			$this->db->where('goalsHomeTeam < goalsAwayTeam');
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('homeTeamName');
			$this->db->order_by('homeTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->homeTeamName]['hl'] = 0+$q->hl;
				$ret[$q->homeTeamName]['ghf'] += $q->ghf;
				$ret[$q->homeTeamName]['gha'] += $q->gha;
			}

			/*-------------------------- COUNT AWAY WINS + AWAY POINTS  --------------------------------*/
			$this->db->select('awayTeamName, SUM(goalsAwayTeam) as gaf, SUM(goalsHomeTeam) as gaa, COUNT(awayTeamName) as aw');
			$this->db->from($league_fix_name);
			$this->db->where('goalsAwayTeam > goalsHomeTeam');
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('awayTeamName');
			$this->db->order_by('awayTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->awayTeamName]['aw'] = 0+$q->aw;
				$ret[$q->awayTeamName]['ap'] = 0+$q->aw*3;
				$ret[$q->awayTeamName]['gaf'] += $q->gaf;
				$ret[$q->awayTeamName]['gaa'] += $q->gaa;
			}

			/*-------------------------- COUNT AWAY DRAWS + POINTS  --------------------------------*/
			$this->db->select('awayTeamName, SUM(goalsAwayTeam) as gaf, SUM(goalsHomeTeam) as gaa, COUNT(awayTeamName) as ad');
			$this->db->from($league_fix_name);
			$this->db->where('goalsAwayTeam = goalsHomeTeam');
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('awayTeamName');
			$this->db->order_by('awayTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->awayTeamName]['ad'] = 0+$q->ad;
				$ret[$q->awayTeamName]['ap'] += $q->ad;
				$ret[$q->awayTeamName]['gaf'] += $q->gaf;
				$ret[$q->awayTeamName]['gaa'] += $q->gaa;
			}
			/*-------------------------- COUNT AWAY LOSSES  --------------------------------*/
			$this->db->select('awayTeamName, SUM(goalsAwayTeam) as gaf, SUM(goalsHomeTeam) as gaa, COUNT(awayTeamName) as al');
			$this->db->from($league_fix_name);
			$this->db->where('goalsAwayTeam < goalsHomeTeam');
			$this->db->where('status', 'FINISHED');
			$this->db->group_by('awayTeamName');
			$this->db->order_by('awayTeamName');

			$query = $this->db->get();

			foreach($query->result() as $q){

				$ret[$q->awayTeamName]['al'] = 0+$q->al;
				$ret[$q->awayTeamName]['gaf'] += $q->gaf;
				$ret[$q->awayTeamName]['gaa'] += $q->gaa;
			}

			/*-------------------------- CALC PWLDFA GD PTS --------------------------------*/
			foreach($ret as $key=>$r){

				$ret[$key]['p'] = $ret[$key]['ph']+$ret[$key]['pa'];
				$ret[$key]['w'] = $ret[$key]['hw']+$ret[$key]['aw'];
				$ret[$key]['d'] = $ret[$key]['hd']+$ret[$key]['ad'];
				$ret[$key]['l'] = $ret[$key]['hl']+$ret[$key]['al'];
				$ret[$key]['f'] = $ret[$key]['ghf']+$ret[$key]['gaf'];
				$ret[$key]['a'] = $ret[$key]['gha']+$ret[$key]['gaa'];
				$ret[$key]['gd'] = ($ret[$key]['ghf']+$ret[$key]['gaf']) - ($ret[$key]['gha']+$ret[$key]['gaa']);
				$ret[$key]['pts'] = $ret[$key]['hp']+$ret[$key]['ap'];
			}
			
			$this->db->where('id >', 0);
			$this->db->delete($league_table_name);
			$this->db->insert_batch($league_table_name, array_values($ret));

			$table_file = realpath('').'/assets/json/tables/'.$league_table_name.'.json';

//			usort($ret, function($a, $b) {
//				return $b['pts'] - $a['pts'];
//			});
			
			usort(
				$ret,
				function($a, $b) {
					if ($a['pts'] == $b['pts']) {
						if ($a['gd'] == $b['gd']) {
							return ($a['team_name'] < $b['team_name']) ? -1 : 1;  // by team name (ascending)
						}
						return ($a['gd'] < $b['gd']) ? 1 : -1;  // by goals scored (descending)
					}
					return ($a['pts'] < $b['pts']) ? 1 : -1;  // by points (descending)
				}
			);
			
			$fp = fopen($table_file, 'w');
			fwrite($fp, json_encode(array_values($ret)));
			fclose($fp);
		}
		
			//return array_values($ret);
	}

}
		
