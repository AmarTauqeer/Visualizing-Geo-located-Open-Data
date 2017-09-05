<?php 
require('conn.php');

//get parameters
$distr_code='';
$cat='';
$categories='';

$GLOBALS['distr_code'] = $_GET["distr_code"];
$GLOBALS['cat'] = $_GET["cat"];
if ($cat=='true') {
	$GLOBALS['categories'] = $_GET["category"];	
}

//print array values
//print_r(array_values($distr_code));

//echo $categories;

require('datasets.php');


?>

<html>
	<head>

	<title>Vienna Districts</title>
	<link type="text/css" href="css/ol.css" />
	<script src="JScripts/ol.js" type="text/javascript"></script>
	<script src="JScripts/jquery.js" type="text/javascript"></script>
	<script src="popup/scripts/ol-popup.js"></script>
	</head>
	
<body>
	<div id="map"></div>

<?php
	//districts boundaries
	 require('district_boundaries.php');
?>
	<script>
		//hide legend attributs
		document.getElementById("driving_school").style.display="none";
		document.getElementById("driving_img").style.display="none";

    	document.getElementById("emb_cons").style.display="none";
		document.getElementById("emb_cons_img").style.display="none";

		document.getElementById("citybike").style.display="none";
		document.getElementById("citybike_img").style.display="none";

		document.getElementById("hospital").style.display="none";
		document.getElementById("hospital_img").style.display="none";

		document.getElementById("kind_garten").style.display="none";
		document.getElementById("kind_garten_img").style.display="none";

		document.getElementById("lib_loc").style.display="none";
		document.getElementById("lib_loc_img").style.display="none";


		document.getElementById("Museums").style.display="none";
		document.getElementById("Museums_img").style.display="none";

		document.getElementById("musik").style.display="none";
		document.getElementById("musik_img").style.display="none";

		document.getElementById("park_loc").style.display="none";
		document.getElementById("park_loc_img").style.display="none";

		document.getElementById("siwimming").style.display="none";
		document.getElementById("siwimming_img").style.display="none";

		document.getElementById("social_market").style.display="none";
		document.getElementById("social_market_img").style.display="none";

		document.getElementById("resi_nur_loc").style.display="none";
		document.getElementById("resi_nur_loc_img").style.display="none";

		document.getElementById("Vacc_loc").style.display="none";
		document.getElementById("Vacc_loc_img").style.display="none";

		document.getElementById("bicycle_loc").style.display="none";
		document.getElementById("bicycle_loc_img").style.display="none";

		//hide legend div
		var legend = document.getElementById("legend");
		legend.style.display = "none";


		//features collection
		var iconFeatures=[];
	</script>

<?php
	
	//datasets
	$total=count($datasets);
		
	for ($i=0; $i <$total ; $i++) {
		 
		$goeid=$datasets[$i]['goeid'];
		$name=$datasets[$i]['name'];
		$coordinates=$datasets[$i]['coordinates'];
		$address=$datasets[$i]['address'];
		$weblink=$datasets[$i]['weblink'];
		$email=$datasets[$i]['email'];
		$phone=$datasets[$i]['phone'];
		$category=$datasets[$i]['cat'];
		$dist_code=$datasets[$i]['dist_code'];
		
		//echo $category;
		//echo $dist_code;
		
		if ($cat=='true') {
			
		
		//if ($categories==$category) {
		if (in_array($category, $categories)) {
			
?>
	<script>
	    //var cord=;
	   
		var a=ol.proj.transform(<?php echo $coordinates;?>, 'EPSG:4326', 'EPSG:3857');
		//alert(a);

		var iconFeature = new ol.Feature({
			type: 'click',
			geometry : new ol.geom.Point(a),
			cat:'<?php echo $category;?>',
			description : 'Name=<?php echo $name;?><br>Category=<?php echo $category;?><br>GeoID=<?php echo $goeid;?><br>Address=<?php echo $address;?><br>Telephone=<?php echo $phone;?><br>Email=<?php echo $email;?><br>Weblink=<?php echo $weblink;?>' 
			});
		 //adding features
		iconFeatures.push(iconFeature);
	</script>
<?php
			}
		}
else {
	if (in_array($dist_code, $distr_code)) {
		//echo $dist_code."<break>";
		// print_r(array_values($distr_code));
?>
	<script>
			var a=ol.proj.transform(<?php echo $coordinates;?>, 'EPSG:4326', 'EPSG:3857');
			var iconFeature = new ol.Feature({
				type: 'click',
				geometry : new ol.geom.Point(a),
				cat:'<?php echo $category;?>',
				description : 'Name=<?php echo $name;?><br>GeoID=<?php echo $goeid;?><br>Address=<?php echo $address;?><br>Telephone=<?php echo $phone;?><br>Email=<?php echo $email;?><br>Weblink=<?php echo $weblink;?>' 
						});
		    //adding features
			iconFeatures.push(iconFeature);
	</script>
<?php
		}
	}
}

?>	
	<script>
		var iconStyle = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: '#4271AE',
				            src: 'images/marker_001.png'
				        })), zIndex: 5 })];
	
		var iconStyle1 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_002.png'
				        })), zIndex: 5 })];

		var iconStyle2 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_003.png'
				        })), zIndex: 5 })];

		var iconStyle3 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_004.png'
				        })), zIndex: 5 })];
				        
		var iconStyle4 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_005.png'
				        })), zIndex: 5 })];

		var iconStyle5 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_006.png'
				        })), zIndex: 5 })];

		var iconStyle6 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_007.png'
				        })), zIndex: 5 })];

		var iconStyle7 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_008.png'
				        })), zIndex: 5 })];
		var iconStyle8 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_009.png'
				        })), zIndex: 5 })];

		var iconStyle9 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_010.png'
				        })), zIndex: 5 })];
		var iconStyle10 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_011.png'
				        })), zIndex: 5 })];
		var iconStyle11 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_012.png'
				        })), zIndex: 5 })];
				        
		var iconStyle12 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_013.png'
				        })), zIndex: 5 })];
		var iconStyle13 = [new ol.style.Style({
				        image: new ol.style.Icon(({
				            scale: 0.7,
				            rotateWithView: false,
				            anchor: [0.5, 1],
				            anchorXUnits: 'fraction',
				            anchorYUnits: 'fraction',
				            opacity: 1,
				            color: [113, 140, 0],
				            src: 'images/marker_014.png'
				        })), zIndex: 5 })];


			//adding each feature style
			function flickrStyle(feature) {
			    	//show legend div
					var legend = document.getElementById("legend");
					legend.style.display = "block";

				if (feature.get('cat') === 'Driving School') {
					//legend cat
					document.getElementById("driving_school").style.display="block";
					document.getElementById("driving_img").style.display="block";
						//alert('d');							
				return iconStyle;
					
			    }else if (feature.get('cat') === 'Embassies and Consulates') {
					//legend embassy
					document.getElementById("emb_cons").style.display="block";
					document.getElementById("emb_cons_img").style.display="block";
			    	
			    	return iconStyle1;
			    	
			    }else if (feature.get('cat') === 'Citybike Locations') {
					document.getElementById("citybike").style.display="block";
					document.getElementById("citybike_img").style.display="block";
			    	return iconStyle2;
			    }else if (feature.get('cat') === 'Hospital Locations') {
					document.getElementById("hospital").style.display="block";
					document.getElementById("hospital_img").style.display="block";

			    	return iconStyle3;
			    }else if (feature.get('cat') === 'Kindergarten') {
					document.getElementById("kind_garten").style.display="block";
					document.getElementById("kind_garten_img").style.display="block";
			    	return iconStyle4;
			    }else if (feature.get('cat') === 'Library Locations') {
					document.getElementById("lib_loc").style.display="block";
					document.getElementById("lib_loc_img").style.display="block";
			    	return iconStyle5;
			    }else if (feature.get('cat') === 'Museums Locations') {
					document.getElementById("Museums").style.display="block";
					document.getElementById("Museums_img").style.display="block";
			    	return iconStyle6;
			    }else if (feature.get('cat') === 'Musik Locations') {
					document.getElementById("musik").style.display="block";
					document.getElementById("musik_img").style.display="block";
			    	return iconStyle7;
			    }else if (feature.get('cat') === 'Parking Locations') {
					document.getElementById("park_loc").style.display="block";
					document.getElementById("park_loc_img").style.display="block";
			    	return iconStyle8;
			    }else if (feature.get('cat') === 'Swimming Pool') {
					document.getElementById("siwimming").style.display="block";
					document.getElementById("siwimming_img").style.display="block";
			    	return iconStyle9;
			    }else if (feature.get('cat') === 'Social Market Locations') {
					document.getElementById("social_market").style.display="block";
					document.getElementById("social_market_img").style.display="block";
			    	return iconStyle10;
			    }else if (feature.get('cat') === 'Residential and Nursing') {
					document.getElementById("resi_nur_loc").style.display="block";
					document.getElementById("resi_nur_loc_img").style.display="block";
			    	return iconStyle11;
			    }else if (feature.get('cat') === 'Vaccination Locations') {
					document.getElementById("Vacc_loc").style.display="block";
					document.getElementById("Vacc_loc_img").style.display="block";
			    	return iconStyle12;
			    }else if (feature.get('cat') === 'Bicycle Parking Locations') {
					document.getElementById("bicycle_loc").style.display="block";
					document.getElementById("bicycle_loc_img").style.display="block";
			    	return iconStyle13;
			    }else{
			    	return iconStyle;
				    } 
			    }    




		var vectorSource = new ol.source.Vector({
			  features: iconFeatures//add an array of features
		});
	
		var vectorLayer = new ol.layer.Vector({
		  source: vectorSource,
		  style: flickrStyle
		  
		});
	 	var center = ol.proj.transform([16.363449, 48.210033], 'EPSG:4326', 'EPSG:3857');
	
		var map = new ol.Map({
            target: 'map',  // The DOM element that will contains the map
            layers: [],     // Initially empty map
            // Create a view centered on the specified location and zoom level
            view: new ol.View({
                center: center,
                zoom: 11
            })
        });

        // Create two layers but let user add them to the map
        var layerOSM = new ol.layer.Tile({
            source: new ol.source.OSM()
        });
        map.addLayer(layerOSM);
        //adding districts boundaries
        var count_dist='<?php  $count=count($distr_code); echo $count; ?>';
        
        if(count_dist==1){
        	map.addLayer(vectorLayer_b);
        }else if(count_dist==2){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        }else if(count_dist==3){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        }else if(count_dist==4){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        }else if(count_dist==5){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        }else if(count_dist==6){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        }else if(count_dist==7){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        }else if(count_dist==8){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        }else if(count_dist==9){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        }else if(count_dist==10){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        }else if(count_dist==11){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        }else if(count_dist==12){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        }else if(count_dist==13){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        }else if(count_dist==14){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        }else if(count_dist==15){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        }else if(count_dist==16){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        }else if(count_dist==17){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        }else if(count_dist==18){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        }else if(count_dist==19){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        	map.addLayer(vectorLayer_b18);
        }else if(count_dist==20){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        	map.addLayer(vectorLayer_b18);
        	map.addLayer(vectorLayer_b19);
        }else if(count_dist==21){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        	map.addLayer(vectorLayer_b18);
        	map.addLayer(vectorLayer_b19);
        	map.addLayer(vectorLayer_b20);
        }else if(count_dist==22){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        	map.addLayer(vectorLayer_b18);
        	map.addLayer(vectorLayer_b19);
        	map.addLayer(vectorLayer_b20);
        	map.addLayer(vectorLayer_b21);
        }else if(count_dist==23){	
        	map.addLayer(vectorLayer_b);
        	map.addLayer(vectorLayer_b1);
        	map.addLayer(vectorLayer_b2);
        	map.addLayer(vectorLayer_b3);
        	map.addLayer(vectorLayer_b4);
        	map.addLayer(vectorLayer_b5);
        	map.addLayer(vectorLayer_b6);
        	map.addLayer(vectorLayer_b7);
        	map.addLayer(vectorLayer_b8);
        	map.addLayer(vectorLayer_b9);
        	map.addLayer(vectorLayer_b10);
        	map.addLayer(vectorLayer_b11);
        	map.addLayer(vectorLayer_b12);
        	map.addLayer(vectorLayer_b13);
        	map.addLayer(vectorLayer_b14);
        	map.addLayer(vectorLayer_b15);
        	map.addLayer(vectorLayer_b16);
        	map.addLayer(vectorLayer_b17);
        	map.addLayer(vectorLayer_b18);
        	map.addLayer(vectorLayer_b19);
        	map.addLayer(vectorLayer_b20);
        	map.addLayer(vectorLayer_b21);
        	map.addLayer(vectorLayer_b22);
        }
            
        map.addLayer(vectorLayer);
	
		
		//popup		
		var popup = new ol.Overlay.Popup;
		popup.setOffset([0, -55]);
		map.addOverlay(popup);
		
		
		//click event		
		map.on('click', function(evt) {
	    var f = map.forEachFeatureAtPixel(
	        evt.pixel,
	        function(ft, layer){return ft;}
	    );
	    if (f && f.get('type') == 'click') {
	        var geometry = f.getGeometry();
	        var coord = geometry.getCoordinates();
	        
	        var content = '<p>'+f.get('description')+'</p>';
	        
	        popup.show(coord, content);
	        
	    } else { popup.hide(); }
	    
		});
		//pointer move
		map.on('pointermove', function(e) {
	    if (e.dragging) { popup.hide(); return; }
	    
	    var pixel = map.getEventPixel(e.originalEvent);
	    var hit = map.hasFeatureAtPixel(pixel);
	    
	    map.getTarget().style.cursor = hit ? 'pointer' : '';
		});
		
	</script>
</body>
</html>