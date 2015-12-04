<?php 
	
	/* Author: Orhan KALAYCI */
	
	$name = $_GET["name"];
	$key = $_GET["key"];
	$width = $_GET["width"];
	$height = $_GET["height"];
	
	// https://www.livecoding.tv/rss/sehlor/followers/?key=goqGUXdnnhCEd1Uh
	
	$url = "https://www.livecoding.tv/rss/" . $name . "/followers/?key=" . $key;
	$fileName = $name . "_followers.txt";
	
	$content = file_get_contents($url);
	
	// Check if there is a new follower.
	
	$fileContents = file_get_contents($fileName);
	
	if($fileContents !== "") {
	
		$xml = simplexml_load_string($content);
		$json = json_encode($xml);
		$latestList = json_decode($json, TRUE);
		$strContent = "";
		
		for($i = 0; $i < count($latestList["channel"]["item"]); $i++) {
			$strContent .= $latestList["channel"]["item"][$i]["title"] . ",";
		}
		
		$latest = explode(",", $strContent);
		$already = explode(",", $fileContents);
		
		$diff = array_diff($latest, $already);
		
		//var_dump($diff);
		
		/*if(count($diff) > 0) {
			echo $diff[0];
		}*/
		
		foreach($diff as $val)
			echo $val;
		
		file_put_contents($fileName, $strContent);
		
	} else {
		
		$xml = simplexml_load_string($content);
		$json = json_encode($xml);
		$latestList = json_decode($json, TRUE);
		$strContent = "";
		for($i = 0; $i < count($latestList["channel"]["item"]); $i++) {
			$strContent .= $latestList["channel"]["item"][$i]["title"] . ",";
		}
		
		file_put_contents($fileName, $strContent);
	}
	
?>