<?php
 
	class DailymotionVideo
	{

		function get_data($id){
			return file_get_contents("http://www.dailymotion.com/embed/video/". $id);
		}


		function Info($id){
			$data = $this->get_data($id);
			preg_match("/var config =(.*?)\}\;/", $data, $matches);
			$data = $matches[1]."}";
			$data = json_decode($data,true);
			$qualities = $data["metadata"]["qualities"];
			return $u[1]["url"];
		}



	}


	$video = new DailymotionVideo();
	$video->Info("x5nun9r");
