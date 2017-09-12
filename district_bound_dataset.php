<?php 
ini_set('max_execution_time', 300); //maximum time 5 mint
//districts boundaries
	$dist_boundary_str = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:BEZIRKSGRENZEOGD&srsName=EPSG:4326&outputFormat=json');
?>