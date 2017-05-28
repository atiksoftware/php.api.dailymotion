<?php
	/*
	* auth : Mansur ATIK
	* edit : 28.05.2017

	* used : ?id=atiksoftware&format=json
	*/


	class DailymotionFeed
	{
		public $id    = 0;
		public $liste = array();


		function scanChannel(){
			$i = 1;
			$has_more = true;
			while( $has_more ) {
				$data = file_get_contents("https://api.dailymotion.com/user/{$this->id}/videos?limit=100&page={$i}");
				$data = json_decode($data,true);
				$has_more = $data['has_more'];
				$list = $data['list'];
				foreach($list as $item){
					$this->liste[] = $item;
				}
				$i++;
			}
		}

	}

	$_id = @$_GET['id'];
	$format = @$_GET['format'];
	$feed  = new DailymotionFeed();
	$feed->id = $_id;
	$feed->scanChannel();

	if($format == "json"){
		header("content-type:application/json");
		echo json_encode($feed->liste);
	}
	else if($format == "xml"){


	}
